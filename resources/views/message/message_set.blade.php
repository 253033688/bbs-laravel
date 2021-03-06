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
			<a href="{{ url() }}" class="home" title="{{ Core::C('site', 'info.name') }}">首页</a><em>&gt;</em>
			<a href="{{ url('message/message/run') }}">消息</a><em>&gt;</em>
			<a href="{{ url('message/message/set') }}">设置</a>
		</div>
		<div class="main cc">
			<div class="main_body">
				<div class="main_content">
					<div class="box_wrap message_page">
						@include('message.message_header')
						<div class="message_set">
							<form id="J_msg_set_form" action="{{ url('message/message/doSet') }}" method="post" >
							<dl id="private">
								<dt><strong>私信</strong><span>设置谁可以给我发私信</span></dt>
								<dd>
									<ul>
										<li><label><input type="radio" name="privacy" value="0"{{ $privacy_N }}><em>所有人</em></label><span>不包括黑名单</span></li>
										<li><label><input type="radio" name="privacy" value="1"{{ $privacy_Y }}><em>我关注的人</em></label></li>
									</ul>
								</dd>
							</dl>
							<dl id="msg_sound">
								<dt><strong>消息提示音</strong><span>开启后，有未读消息时，刷新页面会出现提示音</span></dt>
								<dd>
									<ul>
										<li><label><input type="radio" name="message_tone" value="1"{{ $message_tone_Y }}><em>开启</em></label></li>
										<li><label><input type="radio" name="message_tone" value="0"{{ $message_tone_N }}><em>关闭</em></label></li>
									</ul>
								</dd>
							</dl>

							<dl class="ft">
								<dd>
									<button class="btn btn_submit btn_big" type="submit">保存</button>
								</dd>
							</dl>
							</form>
						</div>
						
					</div>
				</div>
			</div>
			<div class="main_sidebar">
				@include('common.sidebar_2')
			</div>
		</div>
	</div>
{{--  @include('common.footer') --}}
</div>
<script>
Wind.use('jquery', 'global', 'ajaxForm', function(){
	//保存
	$('#J_msg_set_form').ajaxForm({
		dataType : 'json',
		success : function(data){
			if(data.state == 'success') {
				//global
				Wind.Util.resultTip({
					msg : '设置成功'
				});
			}else if(data.state == 'fail') {
				Wind.Util.resultTip({
					error : true,
					msg : data.message
				});
			}
		}
	});
});
</script>
</body>
</html>