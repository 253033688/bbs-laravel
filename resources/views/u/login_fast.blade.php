<style>
.pop_cont dt{
	width:50px;
}
</style>
<div style="width:350px;">
	<div class="pop_top J_drag_handle">
		<a href="#" class="pop_close" id="J_qlogin_close">关闭</a>
		<strong>请登录后再继续</strong>
	</div>
	<form id="J_qlogin_form" action="{{ url('u/login/dorun') }}" method="post">
	<div class="pop_cont">
		<div id="J_qlogin_tip" style="display:none;"><span class="tips"></span></div>
		<dl class="cc">
			<dt>帐号：</dt>
			<dd><input id="J_qlogin_username" data-id="username" required="true" placeholder="{{ $loginWay }}" name="username" type="text" class="input length_4" value="" data-check="{{ url('u/login/checkname') }}"></dd>
		</dl>
		<dl class="cc">
			<dt>密码：</dt>
			<dd><input data-id="password" name="password" required="true" placeholder="密码" type="password" class="input length_4" value=""></dd>
		</dl>
		<div style="display:none;" id="J_qlogin_qa"></div>

@if ($verify)

		<dl class="cc dl_cd">
			<dt>验证码：</dt>
			<dd>
				<input id="J_head_login_code" type="text" class="input length_4 mb5" name="code">
				<div id="J_verify_code"></div>
			</dd>
		</dl>
<!--#}#-->
		<dl class="cc">
			<dt>&nbsp;</dt>
			<dd style="width:240px;"><a href="{{ url('u/findPwd/run') }}" class="fr">找回密码</a><input name="rememberme" style="margin:0 4px 0 0;" type="checkbox" class="checkbox" id="cktime"><label for="cktime">自动登录</label></dd>
		</dl>
	</div>
	<div class="pop_bottom">
		<button type="submit" class="btn btn_submit" id="J_qlogin_login">登录</button><a href="{{ url('u/register/run') }}" class="btn">注册</a>
	</div>
	</form>
</div>