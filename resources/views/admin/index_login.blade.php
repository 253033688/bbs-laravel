<!doctype html>
<html>
	<head>
		<meta charset="{{ Core::V('charset') }}" />
		<title>系统后台 - {{ Core::C('site', 'info.name') }}</title>
		<meta name="robots" content="noindex,nofollow">
		<link href="{{ asset('assets/themes/site/default/css/dev') }}/admin_login.css" rel="stylesheet" />
		<script>
			if (window.parent !== window.self) {
					document.write = '';
					window.parent.location.href = window.self.location.href;
					setTimeout(function () {
							document.body.innerHTML = '';
					}, 0);
			}
		</script>
	</head>
<body>
	<div class="wrap">
		<h1><a href="{{ url() }}">phpwind 后台管理中心</a></h1>
		<form method="post" name="login" action="{{ url('index/login') }}" autoComplete="off">
			<div class="login">
				<ul>
					<li>
						<input class="input" id="J_admin_name" required name="username" type="text" placeholder="帐号名" title="帐号名" />
					</li>
					<li>
						<input class="input" id="admin_pwd" type="password" required name="password" placeholder="密码" title="密码" />
					</li>

@if ($showVerify)

					<li>
						<div id="J_verify_code"></div>
					</li>
					<li>
						<input class="input" type="text" name="code" placeholder="请输入验证码" />
					</li>
					<!--#}#-->
				</ul>
				<button type="submit" name="submit" class="btn">登录</button>
			</div>
		</form>
	</div>

<script>
var GV = {
	JS_ROOT : "{{ asset('assets') }}/js/dev/",																									//js目录
	JS_VERSION : "",																										//js版本号
	TOKEN : {{ @Wind::getComponent('windToken')->saveToken('csrf_token') }}	//token ajax全局
};
</script>
<script src="{{ asset('assets/js') }}/wind.js"></script>
<script src="{{ asset('assets/js') }}/jquery.js"></script>
{{--  @include('common.footer') --}}
<script>
;(function(){
	document.getElementById('J_admin_name').focus();

	getVerifyTemp({wrap : $('#J_verify_code')});

	function getVerifyTemp(options){
		//验证码模板
		var _this = this,
			wrap = options.wrap,				//验证码容器
			afterClick = options.afterClick,	//点击换一个后回调
			clone = options.clone;				//获取失败后恢复内容
		if(!wrap.length) {
			return;
		}

		wrap.html('<span class="tips_loading">验证码loading</span>');
		var url = '{{ url('index/showVerify') }}';
		$.post(url, {
			csrf_token : GV.TOKEN
		}, function(data){
			if(data.state == 'success') {
				wrap.html(data.html);
			}else if(data.state == 'fail') {
				if(clone) {
					//恢复原代码
					wrap.html(clone.html());
				}else{
					//重试
					wrap.html('<a href="#" role="button" id="J_verify_update_a">重新获取</a>');
				}

				alert(data.message);
				/*_this.resultTip({
					error : true,
					elem : $('#J_verify_update_a'),
					follow : true,
					msg : data.message
				});*/
			}

		}, 'json');

		wrap.off('click').on('click', '#J_verify_update_a', function(e){
			//换一个
			e.preventDefault();

			if(wrap.find('.tips_loading').length) {
				//防多次点击
				return false;
			}

			var clone = wrap.clone();
			wrap.html('<span class="tips_loading">验证码loading</span>');
			getVerifyTemp({
				wrap : wrap,
				clone : clone
			});

			if(afterClick) {
				afterClick();
			}
		}).on('click', '#J_verify_update_img', function(e){
			//点击图片
			$('#J_verify_update_a').click();
		});
	}
})();
</script>
</body>
</html>
