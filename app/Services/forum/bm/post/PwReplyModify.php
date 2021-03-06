<?php

namespace App\Services\forum\bm\post;

/**
 * 帖子编辑相关服务
 */

class PwReplyModify extends PwPostAction
{
	public $tid;
	protected $pid;
	protected $info;

	public function __construct($pid, PwUserBo $user = null) {
		$this->info = $this->_getThreadService()->getPost($pid);
		$this->pid = $pid;
		$this->tid = $this->info['tid'];
		parent::__construct($this->info['fid'], $user);
	}
	
	/**
	 * @see PwPostAction.isInit
	 */
	public function isInit() {
		return !empty($this->info);
	}
	
	/**
	 * @see PwPostAction.check
	 */
	public function check() {
		if (!$this->user->isExists()) {
			return new ErrorBag('login.not');
		}
		if ($this->info['created_userid'] != $this->user->uid) {
			if (!$this->user->getPermission('operate_thread.edit', $this->isBM)) {
				return new ErrorBag('BBS:post.modify.error.self');
			}
			if (!$this->user->comparePermission($this->info['created_userid'])) {
				return new ErrorBag('permission.level.edit', array('{grouptitle}' => $this->user->getGroupInfo('name')));
			}
		}
		if ($this->forum->forumset['edittime'] && (Tool::getTime() - $this->info['created_time'] > $this->forum->forumset['edittime'] * 60) && !$this->user->getPermission('operate_thread.edit', $this->isBM)) {
			return new ErrorBag('BBS:post.modify.timelimit', array('{minute}' => $this->forum->forumset['edittime']));
		}
		$thread_edit_time = $this->user->getPermission('thread_edit_time');
		if ($thread_edit_time > 0 && (Tool::getTime() - $this->info['created_time']) > $thread_edit_time * 60) {
			return new ErrorBag('permission.thread.modify.timelimit');
		}
		return true;
	}
	
	/**
	 * @see PwPostAction.getInfo
	 */
	public function getInfo() {
		return $this->info;
	}
	
	/**
	 * @see PwPostAction.getDm
	 */
	public function getDm() {
		return new PwReplyDm($this->pid, $this->forum, $this->user);
	}

	/**
	 * @see PwPostAction.getAttachs
	 */
	public function getAttachs() {
		$attach = array();
		if ($this->info['aids']) {
			$attach = $this->_getAttachService()->getAttachByTid($this->tid, array($this->pid));
		}
		return $attach;
	}
	
	/**
	 * @see PwPostAction.dataProcessing
	 */
	public function dataProcessing(PwPostDm $postDm) {
		$_gtime = $this->user->getPermission('post_modify_time');
		$modifyTime = ($_gtime && (Tool::getTime() - $this->info['created_time'] > $_gtime * 60)) ? Tool::getTime() : 0;
		$postDm->setDisabled($this->isDisabled())
			->setModifyInfo($this->user->uid, $this->user->username, $this->user->ip, $modifyTime);
		if (($postDm = $this->runWithFilters('dataProcessing', $postDm)) instanceof ErrorBag) {
			return $postDm;
		}
		$this->postDm = $postDm;
		return true;
	}
	
	/**
	 * @see PwPostAction.execute
	 */
	public function execute() {
		$result = $this->_getThreadService()->updatePost($this->postDm);
		if ($result instanceof ErrorBag) {
			return $result;
		}
		$this->afterPost();
		return true;
	}
	
	/**
	 * 编辑回复后续操作<更新版块、缓存等信息>
	 */
	public function afterPost() {
		if ($this->postDm->getIscheck() != $this->info['ischeck']) {
			$reply = $this->info['ischeck'] ? -1 : 1;
			app('forum.srv.PwForumService')->updateStatistics($this->forum, 0, $reply, $reply);

			Wind::import('SRV:forum.dm.PwTopicDm');
			$dm = new PwTopicDm($this->tid);
			$dm->addReplies($reply);
			$this->_getThreadService()->updateThread($dm, PwThread::FETCH_MAIN);

			if ($this->info['rpid']) {
				$dm = new PwReplyDm($this->info['rpid']);
				$dm->addReplies($reply);
				$this->_getThreadService()->updatePost($dm);
			}
		}
		//编辑非自己的帖子回复添加管理日志

		if ($this->info['created_userid'] != $this->user->uid) {
			$thread = $this->info;
			$thread['subject'] = $this->postDm->getField('subject') ? $this->postDm->getField('subject') : $this->info['subject'];
			app('log.srv.PwLogService')->addEditThreadLog($this->user, $thread, true);
		}
	}

	/**
	 * @see PwPostAction.afterRun
	 */
	public function afterRun() {
		$this->runDo('updatePost', $this->pid, $this->tid);
	}

	public function isForumContentCheck() {
		return (intval($this->forum->forumset['contentcheck']) & 2);
	}

	public function getNewId() {
		return $this->pid;
	}

	public function _getThreadService() {
		return app('forum.PwThread');
	}

	public function _getAttachService() {
		return app('attach.PwThreadAttach');
	}
}
?>