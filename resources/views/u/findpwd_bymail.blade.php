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
			<h2 class="reg_head">您选择通过邮箱找回密码</h2>
			<div class="reg_cont_wrap">

@if ($step == 2)

				<div class="reg_cont">
					<div class="reg_form">
						<form id="J_bymail_form" action="{{ url('u/findPwd/dobymail') }}" method="post">
							<input type="hidden" name="username" value="{{ $username }}" />
							<dl>
								<dt><label>用户名：</label></dt>
								<dd style="width:80%;"><div class="username">{{ $username }}</div><div class="gray">对应的注册邮箱为：{{ $mayEmail }}</div></dd>
							</dl>
							<dl>
								<dt><label>注册邮箱：</label></dt>
								<dd><input required id="J_findpw_email" data-id="email" type="text" name="email" value="" class="input length_4" /></dd>
								<dd id="J_findpw_tip_email" class="dd_r"></dd>
							</dl>

@if ($verify)

							<dl class="dl_cd">
								<dt><label>验证码：</label></dt>
								<dd><input data-id="code" id="J_findpw_code" name="code" type="text" class="input length_4 mb5"><div id="J_verify_code"></div></dd>
								<dd class="dd_r">
									<div id="J_findpw_tip_code"></div>
								</dd>
							</dl>
							<!--#}#-->
							<dl>
								<dt>&nbsp;</dt>
								<dd><button class="btn btn_big btn_submit mr20" type="submit">取回密码</button><a href="javascript:window.history.go(-1);">返回上一步</a></dd>
							</dl>
						</form>
					</div>
				</div>

@elseif ($step == 3)

				<div class="reg_activation">
					<a href="{{ $emailUrl }}" target="_blank" class="btn btn_submit btn_big fr" style="margin:15px 40px 0 0;">查收邮件</a>
					<h1>我们已经发送邮件至您的邮箱，请在24小时<br>内通过邮件内的链接继续设置新的密码。 </h1>
					<div class="reg_activation_tip">
						<h2>提示：</h2>
						<p>若您长时间未收到邮件，请检查您的垃圾箱或广告箱，邮件有可能被误认为垃圾或广告邮件。<br>
						如果您一直未收到邮件，请重新尝试<a href="{{ url('u/findPwd/run') }}" class="s4">找回密码。</a><br>
						如果您连续多次申请找回密码，请以最新收到的邮件为准！</p>
					</div>
				</div>
	<!--#}#-->
			</div>
		</div>
	</div>
{{--  @include('common.footer') --}}
</div>
<script type="text/javascript">
Wind.use('jquery', 'global', 'validate', 'emailAutoMatch', function(){
	var bymail_form = $("#J_bymail_form");
	bymail_form.find('input:text:first').focus();
	
	bymail_form.validate({
		errorPlacement: function(error, element) {
			//错误提示容器
			$('#J_findpw_tip_'+ element.data('id')).html(error);
		},
		errorElement: 'span',
		errorClass : 'tips_icon_error',
		validClass		: 'tips_icon_success',
		onkeyup : false, //remote ajax
		rules: {
			email : {
				required : true,
				email : true,
				remote : {
					type : 'post',
					url : "{{ url('u/findPwd/checkMailFormat') }}",
					dataType: "json",
					data : {
						email :  function(){
							return $("#J_findpw_email").val();
						}
					}
				}
			},
			code : {
				required : true,
				remote : {
					url : "{{ url('verify/index/check') }}",
					dataType: "json",
					data : {
						code :  function(){
							return $("#J_findpw_code").val();
						}
					}
				}
			}
		},
		highlight	: false,
		unhighlight	: function(element, errorClass, validClass) {
			$('#J_findpw_tip_'+ $(element).data('id')).html('<span class="'+ validClass +'" data-text="text"><span>');
		},
		onfocusin	: function(element){
			var id = $(element).data('id');
			$('#J_findpw_tip_'+ id).html('');
			$(element).parents('dl').addClass('current');
		},
		onfocusout	:  function(element){
			this.element(element);
			$(element).parents('dl').removeClass('current');
		},
		messages: {
			email : {
				required : '邮箱不能为空',
				email : '请输入正确的电子邮箱地址',
				remote : '邮箱和用户名不匹配' //ajax验证默认提示
			},
			code : {
				required	: '验证码不能为空',
				remote : '验证码不正确或已过期' //ajax验证默认提示
			}
		}
	});
});
</script>
</body>
</html>