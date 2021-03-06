<!--这个是关注消息的页面-->
<hook-action name="minilist" args="v">
<!--弹窗列表-->
<!--#
$array = array_slice($v['extend_params'],0,3); 
$countNum = count($v['extend_params']);
$countNum = $countNum > 1 ? '等'.$countNum.'人' : '';
$tmpSeparator='';
#-->
	<dl class="notice_segment_list cc">
		<dt class="notice_tip_icon">

@if (!$v['is_read'])

			<span class="icon_follow_new J_unread_icon" title="未读">[未读]</span>

@else

			<span class="icon_follow" title="已读">[已读]</span>
			<!--# } #-->
		</dt>
		<dd class="notice_segment_cont">
			<div class="summary">

@foreach ($array as $u)
{$tmpSeparator}<a target="_blank" href="{{ url('space/index/run?uid=' . $u['uid']) }}">{{ $u['username'] }}</a><!--#$tmpSeparator='、';}#-->&nbsp;{$countNum}关注了您
			</div>
			<div class="time">{{ App\Core\Tool::time2str($v['modified_time'], 'auto') }}</div>
		</dd>
	</dl>
</hook-action>

<hook-action name="detail" args="detailList,notice,prevNotice,nextNotice">
<!--弹窗详情-->
	@include('notice_minitop')
<!--#
$array = array_slice($notice['extend_params'],0,3); 
$countNum = count($notice['extend_params']);
$countNum = $countNum > 1 ? '等'.$countNum.'人' : '';
$tmpSeparator='';
#-->
	<div class="tips" style="border-left:0;border-right:0;border-top:0;">
@foreach ($array as $u)
{$tmpSeparator}<a target="_blank" href="{{ url('space/index/run?uid=' . $u['uid']) }}">{{ $u['username'] }}</a><!--#$tmpSeparator='、';}#-->&nbsp;{$countNum}关注了您，<a href="{{ url('my/fans/run') }}" target="_blank">查看全部粉丝&nbsp;&gt;&gt;</a></div>
	<div class="J_hm_list my_message_follow">

@foreach($detailList['fans'] as $value)

		<dl class="cc">
			<dt><a href="{{ url('space/index/run?uid=' . $value['uid']) }}"><img src="{{ App\Core\Tool::getAvatar($value['uid'], 'small') }}" data-type="small" width="50" height="50" onerror="this.onerror=null;this.src={{ asset('assets/images') }}/face/face_small.jpg'" alt="{{ $value['username'] }}" /></a></dt>
			<dd>
				<div class="name"><a href="{{ url('space/index/run?uid=' . $value['uid']) }}">{{ $value['username'] }}</a></div>

@if (isset($detailList['follows'][$value['uid']]))

				<a href="{{ url('message/message/pop?uid=' . $value['uid']) }}" class="fr message J_send_msg_pop" data-name="{{ $value['username'] }}"><em></em>写私信</a>
				<span class="core_unfollow">已关注</span>

@else

				<a href="{{ url('my/follow/add') }}" class="core_follow J_msg_follow" data-uid="{{ $value['uid'] }}">加关注</a>
				<!--# } #-->
			</dd>
		</dl>
	<!--# } #-->
	</div>
	<div class="my_message_bottom">
		<a href="{{ url('message/notice/run?type=' . $notice['typeid']) }}">查看全部关注通知&nbsp;&gt;&gt;</a>
	</div>
</hook-action>

<hook-action name="list" args="v">
<!--页列表-->
<!--#
$array = array_slice($v['extend_params'],0,3); 
$countNum = count($v['extend_params']);
$countNum = $countNum > 1 ? '等'.$countNum.'人' : '';
$tmpSeparator='';
#-->
	<div class="ct cc J_notice_item">
		<div class="check"><input name="ids[]" class="J_check" type="checkbox" value="{{ $v['id'] }}"  style="display:none;"></div>
		<div class="content J_notice_content cp">
			<a href="{{ url('message/notice/detaillist?id=' . $v['id']) }}" class="open_up J_notice_show" data-role="down">展开&darr;</a>
			<div class="title">
				<span class="notice_tip_icon">

@if (!$v['is_read'])

				<span class="icon_follow_new" title="未读"></span>

@else

				<span class="icon_follow" title="已读"></span>
				<!--# } #-->
				</span>
@foreach ($array as $u)
{$tmpSeparator}<a target="_blank" href="{{ url('space/index/run?uid=' . $u['uid']) }}">{{ $u['username'] }}</a><!--#$tmpSeparator='、';}#-->&nbsp;{$countNum}关注了您
			</div>
			<div class="title J_notice_all" style="display:none;"></div>
			<div class="info">
				<span class="time">{{ App\Core\Tool::time2str($v['modified_time'], 'auto') }}</span>
				<span class="operating"><span class="line">|</span><a class="J_msg_del" href="#" data-uri="{{ url('message/notice/delete') }}" data-pdata="{'id':{{ $v['id'] }}}">删除</a></span>
			</div>
		</div>
	</div>
</hook-action>

<hook-action name="detaillist" args="detailList,notice">
<!--页详情-->
	<div class="J_hm_list notice_follow_list ">

@foreach($detailList['fans'] as $value)

		<dl class="cc">
			<dt><a href="{{ url('space/index/run?uid=' . $value['uid']) }}"><img src="{{ App\Core\Tool::getAvatar($value['uid'], 'small') }}" data-type="small" width="50" height="50" onerror="this.onerror=null;this.src={{ asset('assets/images') }}/face/face_small.jpg'" alt="{{ $value['username'] }}" /></a></dt>
			<dd>
				<div class="name"><a href="{{ url('space/index/run?uid=' . $value['uid']) }}">{{ $value['username'] }}</a></div>

@if (isset($detailList['follows'][$value['uid']]))

				<a href="{{ url('message/message/pop?uid=' . $value['uid']) }}" class="fr message J_send_msg_pop" data-name="{{ $value['username'] }}"><em></em>写私信</a>
				<span class="core_unfollow">已关注</span>

@else

				<a href="{{ url('my/follow/add') }}" class="core_follow J_msg_follow" data-uid="{{ $value['uid'] }}">加关注</a>
				<!--# } #-->
			</dd>
		</dl>
	<!--# } #-->
	</div>
</hook-action>