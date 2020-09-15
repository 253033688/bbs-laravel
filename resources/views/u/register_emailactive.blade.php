<!doctype html>
<html>
<head>
@include('common.head')
<link href="{{ asset('assets/themes/site/default/css/dev/register.css') }} "rel="stylesheet" />
</head>
<body>
<div class="wrap">
{{-- @include('common.header') --}}
	<div class="main_wrap">
		<div class="box_wrap register cc">
			<div class="reg_activation">

@if($from == 'login')

				<h1>{{ $username }}，欢迎您回来，请激活您的帐号！</h1>

@else

				<h1>{{ $username }}，恭喜您注册成为{@G:sitename}会员</h1>
	<!--#}#-->
				<p class="text">{{ Core::C('site', 'info.name') }} 已向 <span id="J_orgin_email">{{ $email }}</span> 发送激活邮件。<br>
				请您立即登录该邮箱，并点击邮件中的激活链接，即可开通帐户完成注册。<a href="{{ $gotoEmail }}" class="btn btn_submit f12" target="_blank">查看激活邮件</a></p>
				<div class="reg_activation_tip">
					<h2>提示：</h2>
					<p>若您长时间未收到激活邮件，请检查您的垃圾箱或广告箱，邮件有可能被误认为垃圾或广告邮件。<br>
					如确认无法找到您的激活邮件，可<a id="J_re_send" href="{{ url('u/register/sendActiveEmailAgain?_statu=' . $_statu) }}" class="s4">重新发送激活邮件</a>，也可<a id="J_email_change_btn" href="#" class="s4">更改邮箱地址</a>，用其他的邮箱再收一封新的激活邮件。</p>
				</div>
			</div>
		</div>
		<div id="J_email_change_wrap" class="core_pop_wrap" style="display:none;">
			<div class="core_pop">
				<div style="width:380px;">
					<form id="J_email_form" action="{{ url('u/register/editEmail') }}" method="post">
					<input type="hidden" value="{{ $_statu }}" name="_statu" />
					<div class="pop_top"><a href="#" class="pop_close" id="J_email_close">关闭</a><strong>修改邮箱地址</strong></div>
					<div class="p20">
						<div class="tips" id="J_email_tip" style="display:none;"></div>
						<div style="display:none;margin:27px 0 10px 82px;" class="fl mail_down" id="J_email_list"></div>
						<div class="cc">
							<span class="mr10" style="line-height:26px;">新邮箱地址：</span><span class="must_red mr10" style=" position:inherit;">*</span><input autocomplete="off" name="email" id="J_email_input" type="text" class="input length_4">
						</div>
					</div>
					<div class="pop_bottom">
						<button class="btn btn_submit mr10" type="submit">确定</button><button id="J_email_cancl" class="btn" type="button">取消</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
{{--  @include('common.footer') --}}
</div>
<script>
Wind.use('jquery', 'global', 'ajaxForm', 'emailAutoMatch', 'draggable', 'validate', function(){
/*
 * 重新发送激活邮件
*/
	var send_able = true;
	$('#J_re_send').on('click', function(e){
		e.preventDefault();

		var $this = $(this);
		
		//防重复点击
		if(!send_able) {
			return false;
		}
		send_able = false;
		
		Wind.Util.ajaxMaskShow();
		$.ajax({
			type : 'post',
			url : $(this).attr('href'),
			dataType : 'json',
			success : function(data){
				Wind.Util.ajaxMaskRemove();
				Wind.Util.resultTip({
					error : ( data.state=='fail' ? true : false ),
					msg : data.message,
					follow : $this
				});
				send_able = true;
			}
		});
		
	});
	
	var email_change_wrap = $('#J_email_change_wrap'),
		email_tip = $('#J_email_tip'),
		email_input = $('#J_email_input'),
		email_form = $("#J_email_form");
	
	//更改邮箱地址
	$('#J_email_change_btn').on('click', function(e){
		e.preventDefault();

		Wind.Util.popPos(email_change_wrap);

        email_change_wrap.draggable( { handle : '.pop_top'} );
		
		email_input.emailAutoMatch();
			
		//邮箱验证
		email_form.validate({
			errorPlacement: function(error, element) {
				//错误提示容器
				email_tip.show().html(error);
			},
			errorElement: 'span',
			errorClass : 'tips_icon_error',
			validClass		: 'tips_icon_success',
			onkeyup : false, //remote ajax
			rules: {
				email : {
					required	: true,
					email : true,
					remote		: {
						url : "{{ url('u/register/checkemail') }}",
						type : 'post',
						dataType: "json",
						data : {
							username: '{{ $username }}',
							email : function(){
								return $("#J_email_input").val();
							}
						}
					}
				}
			},
			highlight	: false,
			unhighlight	: function(element, errorClass, validClass) {
				email_tip.hide();
			},
			onfocusout	:  function(element){
				/*var _this = this;
				if(email_input.val() === $('#J_orgin_email').text()) {
					email_tip.show().html('<span class="'+ this.settings.errorClass +'" data-text="text">与目前邮箱相同，请重新输入<span>');
					return;
				}*/
				//邮箱匹配点击后，延时处理
				/*setTimeout(function(){
					_this.element(element);
				}, 150);*/
			},
			messages : {
				email : {
					required : '邮箱不能为空',
					email : '请输入正确的电子邮箱地址',
					remote : '该电子邮箱已被注册，请更换别邮箱' //ajax验证默认提示
				}
			},
			submitHandler:function(form) {
				//提交
				var btn = $(form).find('button:submit');
				$(form).ajaxSubmit({
					dataType	: 'json',
					beforeSubmit: function(arr, $form, options) {
						//global.js
						Wind.Util.ajaxBtnDisable(btn);
					},
					success		: function(data, statusText, xhr, $form) {
						//global.js
						Wind.Util.ajaxBtnEnable(btn);
						
						if(data.state === 'success') {
							Wind.Util.resultTip({
								msg : data.message,
								follow : btn
							});

							emailPopHide();
						}else if(data.state === 'fail'){
							email_tip.text(data.message).show();
						}
					}
				});
			}
		});

	});
	
	
					
	//点击关闭
	$('#J_email_close, #J_email_cancl').on('click', function(e){
		e.preventDefault();
		emailPopHide();
	});
	
	
	//关闭邮箱修改弹窗
	function emailPopHide(){
		email_change_wrap.hide();
		email_input.val('');
		email_tip.html('').hide();
	}
	
});
</script>
</body>
</html>
