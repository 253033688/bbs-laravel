<?php
Wind::import('ADMIN:library.AdminBaseController');

/**
 * 会员相关-完成条件扩展
 *
 * @author xiaoxia.xu <x_824@sina.com>
 * @copyright ©2003-2103 phpwind.com
 * @license http://www.windframework.com
 * @version $Id: TaskConditionMemberController.php 15745 2012-08-13 02:45:07Z xiaoxia.xuxx $
 * @package src.modules.task.admin
 */
class TaskConditionMemberController extends AdminBaseController{
	
	/* (non-PHPdoc)
	 * @see AdminBaseController::beforeAction()
	 */
	public function beforeAction($handlerAdapter) {
		parent::beforeAction($handlerAdapter);
		$var = unserialize($request->get('var'));
		if (is_array($var)) {
			->with($var, 'condition');
		}
	}
	
	/**
	 * 完成资料
	 */
	public function profileAction(Request $request) {
		return view('condition.member_profile');
	}
	
	/**
	 * 上传头像
	 */
	public function avatarAction(Request $request) {
		return view('condition.member_avatar');
	}
	
	/**
	 * 发送消息
	 */
	public function sendMsgAction(Request $request) {
		return view('condition.member_msg');
	}
	
	/**
	 * 打卡
	 */
	public function punchAction(Request $request) {
		return view('condition.member_punch');
	}
	
	/**
	 * 求粉丝
	 */
	public function fansAction(Request $request) {
		return view('condition.member_fans');
	}
}