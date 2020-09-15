<!doctype html>
<html>
<head>
@include('common.head')
<link href="{{ asset('assets/themes/site/default/css/dev/message.css') }} "rel="stylesheet" />
</head>
<body>
<div class="wrap">
{{-- @include('common.header') --}}
	<div class="main_wrap">
		<div class="bread_crumb">
			<a href="{{ url() }}" class="home" title="{{ Core::C('site', 'info.name') }}">首页</a><em>&gt;</em><a href="{{ url('message/message/run') }}">消息</a>
		</div>
		<div class="cc">
			<div class="box_wrap message_page">
				@include('message.message_header')
				<div class="notification_center">
					<dl class="hd cc">
						<dd>
							<span class="fr"><a href="{{ url('message/message/run') }}">&lt;&lt;&nbsp;回到私信</a>|<a href="{{ url('message/message/addBlack?username=' . $from_username) }}">加入黑名单</a>|<a href="{{ url('message/message/deleteDialog?ids=' . $from_uid) }}">全部删除</a></span>共有 {$count} 条与 <a href="#">{{ $from_username }}</a> 的对话记录
						</dd>
					</dl>
					<dl class="cc message_reply_wrap">
						<dd>
							<a href="" class="face"><img src="{{ asset('assets/images') }}/face/face_small.jpg" width="50" height="50" alt="" /></a>
							<div class="message_reply">
								<form class="J_ajaxForm" action="{{ url('message/message/doAddDialog') }}" method="post">
								<input type="hidden" name="uid" value="{{ $from_uid }}">
								<div><textarea name='content'></textarea></div>
								<button class="btn btn_submit">发送</button>
								</form>
							</div>
						</dd>
					</dl>
					<!--# 
						Wind::import('LIB:ubb.PwUbbCode');
						foreach ($dialogs as $value) { 
						$value['created_time'] = App\Core\Tool::time2str($value['created_time'], 'auto');
						$value['content'] = PwUbbCode::parseEmotion($value['content']);
					#-->
					<dl class="cc">
						<dd>
							<a href="{{ url('space/index/run?uid=' . $value['from_uid']) }}" class="face"><img src="{{ asset('assets/images') }}/face/face_small.jpg" width="50" height="50" alt="{{ $value['username'] }}" /></a>
							<div class="title">
								<a href="{{ url('space/index/run?uid=' . $value['from_uid']) }}" class="b">{{ $value['username'] }}</a>：{$value['content']}
							</div>
							<div class="c"></div>
						</dd>
					</dl>
					<!--# } #-->
					<page tpl='TPL:common.page' page='$page' count='$count' per='$perpage' url='message/dialog' args='$args'/>
				</div>
			</div>
		</div>
	</div>
{{--  @include('common.footer') --}}
<script>
Wind.use('jquery', 'global');
</script>
</div>
</body>
</html>