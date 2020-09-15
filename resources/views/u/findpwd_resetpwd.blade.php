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
			<h2 class="reg_head">找回密码</h2>
			<div class="reg_cont_wrap">
				<div class="reg_cont">
					<div class="reg_form">
						<div class="tips">验证通过，请设置新密码。如有设置安全问题和答案，请登录后重新设置。</div>
						<form id="J_reset_pwd_form" action="{{ url('u/findPwd/doresetpwd') }}" method="post">
							<input type="hidden" name="statu" value="{{ $statu }}">
							<input type="hidden" name="step" value="end" >
							<dl>
								<dt><label>用户名：</label></dt>
								<dd><span class="username" id="J_username">{{ $username }}</span></dd>
							</dl>
							<dl>
								<dt><label>新密码：</label></dt>
								<dd><input required data-id="password" id="J_reset_password" type="password" name="password" class="input length_4" value=""/></dd>
								<dd class="dd_r" id="J_reset_pwd_tip_password"></dd>
							</dl>
							<dl>
								<dt><label>确认密码：</label></dt>
								<dd><input required data-id="repassword" type="password" name="repassword" class="input length_4" value=""/></dd>
								<dd class="dd_r" id="J_reset_pwd_tip_repassword"></dd>
							</dl>
							<dl>
								<dt>&nbsp;</dt>
								<dd><button class="btn btn_big btn_submit mr20" type="submit">完成</button></dd>
							</dl>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
{{--  @include('common.footer') --}}
</div>
<script>
Wind.use('jquery', 'global', 'validate', 'ajaxForm', function(){
	//聚焦时默认提示
	var focus_tips = {
		password : '{{ $pwdReg }}',
		repassword : '请再输入一遍您上面填写的密码',
		code : ''
	};

	//密码强度
	var passwordRank = {
		1 : '<span class="pwd_strength_1"></span>弱',
		2 : '<span class="pwd_strength_2"></span>弱',
		3 : '<span class="pwd_strength_3"></span>中',
		4 : '<span class="pwd_strength_4"></span>强'
	};

	var reset_password = $('#J_reset_password'),
			reset_pwd_tip_password = $('#J_reset_pwd_tip_password');
	
	$("#J_reset_pwd_form").validate({
		errorPlacement: function(error, element) {
			//错误提示容器
			$('#J_reset_pwd_tip_'+ element.data('id')).html(error);
		},
		errorElement: 'span',
		errorClass : 'tips_icon_error',
		validClass		: 'tips_icon_success',
		onkeyup : false, //remote ajax
		focusInvalid : false,
		rules: {
			password : {
				required	: true,
				remote : {
					url : '{{ url('u/register/checkpwd') }}',		//验证密码
					dataType: "json",
					type : 'post',
					data : {
						username : function(){
							return $('#J_username').text();
						},
						pwd : function(){
							return reset_password.val();
						}
					}
				}
			},
			repassword : {
				required : true,
				equalTo : '#J_reset_password'
			},
			code : {
				required : true,
				remote : {
					url : "{{ url('u/login/checkverify') }}",
					dataType: "json",
					data : {
						code :  function(){
							return $("#J_reset_code").val();
						}
					}
				}
			}

		},
		highlight	: false,
		unhighlight	: function(element, errorClass, validClass) {
			$('#J_reset_pwd_tip_'+ $(element).data('id')).html('<span class="'+ validClass +'" data-text="text"><span>');
		},
		onfocusin	: function(element){
			var name = element.name;
			$(element).parents('dl').addClass('current');
			$('#J_reset_pwd_tip_'+ name).html('<span class="reg_tips" data-text="text">'+ focus_tips[name] +'</span>');

			if(name == 'password') {
				//密码则添加强度验证
				
				$(element).on('keyup', function(e){
					
					//过滤tab键
					if(e.keyCode !== 9) {
						$.post('{{ url('u/register/checkpwdStrong') }}', {
							pwd : reset_password.val()
						}, function(data){
							if(data.state === 'success') {
								reset_pwd_tip_password.html(passwordRank[data.message['rank']]);
							}else if(data.state === 'fail'){
								reset_pwd_tip_password.html('');
							}
						}, 'json');
					}
					
				});
			}
		},
		onfocusout	:  function(element){
			$(element).parents('dl').removeClass('current');
			//$('#J_u_login_tip_'+ $(element).data('id')).html('');
			this.element(element);
		},
		messages : {
			password : {
				required : '密码不能为空'
			},
			repassword : {
				required : '确认密码不能为空',
				equalTo : '两次输入的密码不一致。请重新输入'
			},
			code : {
				required	: '验证码不能为空',
				remote : '验证码不正确或已过期' //ajax验证默认提示
			}
		},
		submitHandler:function(form) {
			$(form).ajaxSubmit({
				dataType : 'json',
				success : function(data){
					if(data.state === 'success') {
						Wind.Util.resultTip({
							msg : '恭喜，新密码已设置成功！',
							callback : function(){
								window.location.href = decodeURIComponent(data.referer);
							}
						});
					}else if(data.state === 'fail'){
						Wind.Util.resultTip({
							error : true,
							msg : data.message
						});
					}
				}
			});
		}
	});
});
</script>
</body>
</html>