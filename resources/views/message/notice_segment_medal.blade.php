<!--勋章消息-->
<hook-action name="minilist" args="v">
<!--弹窗列表-->
	<!--# 
	$medal = app('medal.PwMedalInfo')->getMedalInfo($v['extend_params']['medelId']);
	//$medal['icon'] = app('medal.srv.PwMedalService')->getMedalImage($medal['path'], $medal['icon']);
	#-->
	<dl class="notice_segment_list cc">
		<dt class="notice_tip_icon">

@if (!$v['is_read'])

			<span class="icon_medal_new J_unread_icon" title="未读">[未读]</span>

@else

			<span class="icon_medal" title="已读">[已读]</span>
			<!--# } #-->
		</dt>
		<dd class="notice_segment_cont">
			<div class="summary">

@if ($v['extend_params']['type'] == 1)

			恭喜！您已达到领取《{$v['extend_params']['name']}》勋章的要求，请到<a href="{{ url('medal/index/run') }}">我的勋章</a>页面领取。

@elseif($v['extend_params']['type'] == 2)

			恭喜！管理员颁发给您《{$v['extend_params']['name']}》勋章，请到<a href="{{ url('medal/index/run') }}">我的勋章</a>页面领取。

@elseif($v['extend_params']['type'] == 3)

			恭喜！您申请的《{$v['extend_params']['name']}》勋章已通过审核，请到<a href="{{ url('medal/index/run') }}">我的勋章</a>页面领取。

@elseif($v['extend_params']['type'] == 4)

			抱歉，您申请的《{$v['extend_params']['name']}》勋章因不符合要求，未通过管理员审核，请谅解。如有问题请联系管理员。

@elseif($v['extend_params']['type'] == 5)

			抱歉，您的《{$v['extend_params']['name']}》勋章被收回。

@elseif($v['extend_params']['type'] == 7)

			抱歉，您的《{$v['extend_params']['name']}》勋章被收回。
		<!--# } #-->
			</div>
			<div class="time">{{ App\Core\Tool::time2str($v['modified_time'],'auto') }}</div>
		</dd>
	</dl>
</hook-action>

<hook-action name="detail" args="detailList,notice,prevNotice,nextNotice">
<!--弹窗详情-->
	@include('notice_minitop')
	<div class="notice_segment_wrap">
		<dl class="notice_segment_list cc">
			<dt class="notice_tip_icon">
				<span class="icon_medal" title="已读">[已读]</span>
			</dt>
			<dd class="notice_segment_cont">
				<div class="summary">

@if ($detailList['medalInfo'] )


@if ($detailList['extend_params']['type'] == 1)

				恭喜！您已达到领取《{$detailList['extend_params']['name']}》勋章的要求，请到<a href="{{ url('medal/index/run') }}">我的勋章</a>页面领取。

@elseif($detailList['extend_params']['type'] == 2)

				恭喜！管理员颁发给您《{$detailList['extend_params']['name']}》勋章，请到<a href="{{ url('medal/index/run') }}">我的勋章</a>页面领取。

@elseif($detailList['extend_params']['type'] == 3)

				恭喜！您申请的《{$detailList['extend_params']['name']}》勋章已通过审核，请到<a href="{{ url('medal/index/run') }}">我的勋章</a>页面领取。

@elseif($detailList['extend_params']['type'] == 4)

				抱歉，您申请的《{$detailList['extend_params']['name']}》勋章因不符合要求，未通过管理员审核，请谅解。如有问题请联系管理员。

@elseif($detailList['extend_params']['type'] == 5)

				抱歉，您的《{$detailList['extend_params']['name']}》勋章被收回。

@elseif($detailList['extend_params']['type'] == 7)

				抱歉，您的《{$detailList['extend_params']['name']}》勋章被收回。收回原因：管理员手动收回
			<!--# } #-->
	<!--# } #-->
				</div>
				<div class="time"><!--# echo App\Core\Tool::time2str($notice['modified_time'],'auto');#--></div>
			</dd>
		</dl>
	</div>
	<div class="my_message_bottom">
		<a href="{{ url('message/notice/run?type=' . $notice['typeid']) }}">查看全部勋章通知&nbsp;&gt;&gt;</a>
	</div>
</hook-action>

<hook-action name="list" args="v">
<!--页列表-->
<!--# 
	$medal = app('medal.PwMedalInfo')->getMedalInfo($v['extend_params']['medelId']);
	//$medal['icon'] = app('medal.srv.PwMedalService')->getMedalImage($medal['path'], $medal['icon']);
	//$ignoreString = $v['is_ignore'] ? '取消忽略' : '忽略';
	//$doIgnore = $v['is_ignore'] ? 0 : 1;
	//$type = $v['is_ignore'] ? false : true;
	#-->
	<div class="ct cc J_notice_item">
		<div class="check"><input name="ids[]" class="J_check" type="checkbox" value="{{ $v['id'] }}" style="display:none;"></div>
		<div class="content">
			<div class="title">
				<span class="notice_tip_icon">

@if (!$v['is_read'])

				<span class="icon_medal_new" title="未读"></span>

@else

				<span class="icon_medal" title="已读"></span>
				<!--# } #-->
				</span>

@if ($v['extend_params']['type'] == 1)

					恭喜！您已达到领取《<a href="{{ url('medal/index/run') }}">{{ $v['extend_params']['name'] }}</a>》勋章的要求，请到<a href="{{ url('medal/index/run') }}">我的勋章</a>页面领取。

@elseif($v['extend_params']['type'] == 2)

					恭喜！管理员颁发给您《<a href="{{ url('medal/index/run') }}">{{ $v['extend_params']['name'] }}</a>》勋章，请到<a href="{{ url('medal/index/run') }}">我的勋章</a>页面领取。

@elseif($v['extend_params']['type'] == 3)

					恭喜！您申请的《<a href="{{ url('medal/index/run') }}">{{ $v['extend_params']['name'] }}</a>》勋章已通过审核，请到<a href="{{ url('medal/index/run') }}">我的勋章</a>页面领取。

@elseif($v['extend_params']['type'] == 4)

					抱歉，您申请的《<a href="{{ url('medal/index/run') }}">{{ $v['extend_params']['name'] }}</a>》勋章因不符合要求，未通过管理员审核，请谅解。如有问题请联系管理员。

@elseif($v['extend_params']['type'] == 5)

					抱歉，您的《<a href="{{ url('medal/index/run') }}">{{ $v['extend_params']['name'] }}</a>》勋章被收回。

@elseif($v['extend_params']['type'] == 7)

					抱歉，您的《<a href="{{ url('medal/index/run') }}">{{ $v['extend_params']['name'] }}</a>》勋章被收回。
				<!--# } #-->
			</div>
			<div class="info">
				<span class="time">{{ App\Core\Tool::time2str($v['modified_time'],'auto') }}</span>
				<span class="operating"><span class="line">|</span><a class="J_msg_del" href="#" data-uri="{{ url('message/notice/delete') }}" data-pdata="{'id':{{ $v['id'] }}}">删除</a></span>
			</div>
		</div>
	</div>
</hook-action>