<!doctype html>
<html>
<head>
@include('common.head')
<link href="{{ asset('assets/themes/site/default/css/dev/message.css?v=' . @G:version) }}" rel="stylesheet" />
</head>
<body>
<div class="wrap">
{{-- @include('common.header') --}}
	<div class="main_wrap">
		<div class="bread_crumb">
			<a href="{{ url() }}" class="home" title="{{ Core::C('site', 'info.name') }}">首页</a><em>&gt;</em><a href="{{ url('message/message/run') }}">消息</a><em>&gt;</em><a href="{{ url('message/message/run') }}">私信</a>
		</div>
		<div class="main cc">
			<div class="main_body">
				<div class="main_content">
					<!--中间内容-->
					<div class="box_wrap message_page">
						@include('message.message_header')
						<div class="message_post">
						<form id="J_msg_add_form" action="{{ url('message/message/doAddMessage') }}" method="post" >
							<dl class="cc">
								<dt>收信人：</dt>
								<dd>
									<div class="user_select_input cc J_user_tag_wrap">
										<a href="{{ url('message/message/follows') }}" class="input_down" id="J_get_follows">下拉选择</a>
										<ul class="fl J_user_tag_ul">

@if ($username)


@foreach ($username as $value)

										<li><a href="javascript:;">
											<span class="J_tag_name">{{ $value }}</span>
											<del class="J_user_tag_del" title="{{ $value }}">×</del>
											<input type="hidden" name="usernames[]" value="{{ $value }}">
											</a>
										</li>
										<!--# } #-->
										<!--# } #-->
										</ul>
										<input data-name="usernames[]" class="J_user_tag_input" type="text" />
									</div>
									<div id="J_users_pop" class="core_pop_wrap" style="display:none;position:absolute;">
										<div class="core_pop">
											<div class="user_select_pop">
												<div class="pop_top">
													<a href="#" class="pop_close J_close_users">关闭</a>
													<select id="J_users_select">
														<option value="follows">我的关注</option>
														<option value="fans">我的粉丝</option>
													</select>
												</div>
												<div class="pop_cont" id="J_users_wrap">
													<div class="pop_loading"></div>
												</div>
												<div class="pop_bottom">
													<button type="submit" class="btn btn_submit J_close_users">确认</button>
												</div>
											</div>
										</div>
									</div>
								</dd>
							</dl>
							<dl class="cc">
								<dt>内容：</dt>
								<dd>
									<div class="cc"><textarea id="J_msg_textarea" class="J_msg_add_textarea mb5" style="width:390px;height:100px" name="content"></textarea></div>
									<a href="" class="icon_face J_insert_emotions" data-emotiontarget="#J_msg_textarea">表情</a>
								</dd>
							</dl>

@if ($verify)

							<dl class="cc dl_cd">
								<dt><label for="J_login_code">验证码：</label></dt>
								<dd>
								<input data-id="code" id="J_login_code" name="code" type="text" class="input length_4 mb5" tabindex="5"><div id="J_verify_code"></div></dd>
								<dd class="dd_r"><span id="J_u_login_tip_code"></span></dd>
							</dl>
		<!--#}#-->
							<dl class="cc">
								<dt>&nbsp;</dt>
								<dd><button type="submit" class="btn btn_big btn_submit J_msg_add_btn mr20">发送</button><span class="J_msg_add_tip gray">Ctrl + Enter 快速发布</span></dd>
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
<script type="text/javascript">
Wind.use('jquery', 'global', 'ajaxForm', 'validate', function() {
	
	var default_tip = 'Ctrl + Enter 快速发布';
	
	$('#J_msg_add_form').ajaxForm({
		dataType : 'json',
		success : function(data, statusText, xhr, $form) {
			var tip = $form.find('.J_msg_add_tip');

			if(data.state === 'success') {
				Wind.Util.resultTip({
					msg : '发送成功',
					callback : function(){
						window.location.href = decodeURIComponent(data.referer);
					}
				});
			}else if(data.state === 'fail'){
				//错误提示
				tip.html('<span class="tips_icon_error">'+ data.message +'</span>');
			}
		}
	});
	
	//ctrl+enter 提交
	Wind.Util.ctrlEnterSub($('textarea.J_msg_add_textarea'), $('button.J_msg_add_btn'));
	
	//下拉
	var follows_load = false,
		fans_load = false;
	
	//获取关注
	var get_follows = $('#J_get_follows'),					//下拉按钮
		users_url = get_follows.attr('href'),				//地址
		users_pop = $('#J_users_pop'),					//下拉用户容器
		users_wrap = $('#J_users_wrap');					//用户列表
		
	get_follows.on('click', function(e){
		e.preventDefault();
		var $this = $(this);
		users_pop.toggle();
		
		if(!follows_load) {
			$.getJSON(users_url+'&type=follows', function(data){
				users_wrap.html('<div class="follow_list" id="J_list_follows">我的关注为空</div><div class="follow_list" id="J_list_fans" style="display:none;"><div class="pop_loading"></div></div>');
				var list_follows = $('#J_list_follows');

				if(data.state == 'success') {
					var li_arr = [];
					$.each(data['data'], function(i, o){
						li_arr.push('<li><label><input type="checkbox" value="'+ o.username +'">'+ o.username +'</label></li>');
					});
					
					list_follows.html('<ul class="">'+ li_arr.join('') +'</ul>');

				}else if(data.state == 'fail'){
					list_follows.html('我的关注为空');
				}

				follows_load = true;		//关注已获取
			});
		}
	});
	
	//切换关注 粉丝
	$('#J_users_select').on('change', function(){
		var $this = $(this),
			v = $this.val();
		$('#J_list_'+ v).show().siblings().hide();
		if($this.val() == 'fans') {
			if(!fans_load){
				//粉丝未获取则发请求
				$.getJSON(users_url+'&type=fans', function(data){
					var list_fans = $('#J_list_fans');
					if(data.state == 'success') {
						var li_arr = [];
						$.each(data['data'], function(i, o){
							li_arr.push('<li><label><input type="checkbox" value="'+ o.username +'">'+ o.username +'</label></li>');
						});
						
						if(li_arr.length) {
							list_fans.html('<ul>'+ li_arr.join('') +'</ul>');
						}else{
							list_fans.html('我的关注为空');
						}
						fans_load = true;		//粉丝已获取
					}else if(data.state == 'fail'){
						list_fans.html('我的关注为空');
					}
				});
			}
			
		}
	});
	
	//选择粉丝关注
	var user_tag_ul = $('ul.J_user_tag_ul');
	users_wrap.on('change', 'input:checkbox', function(){
		var $this = $(this),
			input_has = user_tag_ul.find('input[value="'+ this.value +'"]')
		if($this.prop('checked')) {
			if(!input_has.length) {
				user_tag_ul.append('<li><a href="javascript:;"><span class="J_tag_name">'+ this.value +'</span><del class="J_user_tag_del" title="'+ this.value +'">×</del><input type="hidden" name="usernames[]" value="'+ this.value +'"></a></li>');
			}
		}else{
			input_has.parents('li').remove();
		}
	});
	
	//删除用户标签
	user_tag_ul.on('click', 'del.J_user_tag_del', function(e){
		e.preventDefault();
		users_wrap.find('input[value="'+ $(this).attr('title') +'"]').prop('checked', false);
	});
	
	//关闭粉丝关注列表
	users_pop.on('click', '.J_close_users', function(e){
		e.preventDefault();
		users_pop.hide();
	});
/*if(is_ie){
e.returnValue=false;
}else{
e.preventDefault();
} */
		
});
</script>
</body>
</html>