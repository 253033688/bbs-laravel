<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">
<div class="nav">
	<ul class="cc">
		<li><a href="{{ url('config/mobile/run') }}">短信平台</a></li>
		<li class="current"><a href="{{ url('config/mobile/set') }}">功能设置</a></li>
	</ul>
</div>
	<div class="h_a">功能说明</div>
	<div class="prompt_text mb10">
		<ol>
			<li>手机验证方案支持app扩展，可以到<a href="{{ url('/appcenter/app/run') }}">应用中心</a>下载更多的方案。</li>
			<li>为确保手机验证服务生效，需要先开通云平台帐号<a href="{{ url('/appcenter/server/run') }}">[云平台-平台首页]</a>，并保证足够短信剩余条数，否则会导致认证短信下发失败。进入短信平台。</li>
		</ol>
	</div>
	<form class="J_ajaxForm" action="{{ url('admin/config/mobile/doset') }}" method="post">
	<div class="h_a">功能设置</div>
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>短信剩余条数</th>
				<td>
					<font class="bold">{{ $restMessage }}</font>条 <a href="{{ $appMobileUrl }}" target="_blank">查看详细</a>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>注册验证手机</th>
				<td>
					<ul class="switch_list cc">
						<li><label><input type="radio" name="activePhone" value="1" {{ App\Core\Tool::ifcheck($registerConfig['active.phone'] == 1) }}><span>开启</span></label></li>
						<li><label><input type="radio" name="activePhone" value="0" {{ App\Core\Tool::ifcheck($registerConfig['active.phone'] == 0) }}><span>关闭</span></label></li>
					</ul>
				</td>
				<td><div class="fun_tips">开启后用户注册时需要经过手机号码验证。</div></td>
			</tr>
			<tr>
				<th>手机号码登录</th>
				<td>
					<ul class="switch_list cc">
						<li><label><input type="radio" name="ways" value="4" {{ App\Core\Tool::ifcheck(App\Core\Tool::inArray(4, $loginConfig['ways']) == true) }}><span>开启</span></label></li>
						<li><label><input type="radio" name="ways" value="0" {{ App\Core\Tool::ifcheck(App\Core\Tool::inArray(4, $loginConfig['ways']) == false) }}><span>关闭</span></label></li>
					</ul>
				</td>
				<td><div class="fun_tips">开启后可以用手机号码登录。</div></td>
			</tr>
			<tr>
				<th>手机找回密码</th>
				<td>
					<ul class="switch_list cc">
						<li><label><input type="radio" name="mobieFindPasswd" value="1" {{ App\Core\Tool::ifcheck($loginConfig['mobieFindPasswd'] == 1) }}><span>开启</span></label></li>
						<li><label><input type="radio" name="mobieFindPasswd" value="0" {{ App\Core\Tool::ifcheck($loginConfig['mobieFindPasswd'] == 0) }}><span>关闭</span></label></li>
					</ul>
				</td>
				<td><div class="fun_tips">开启后可以给用户发送电子邮件。</div></td>
			</tr>
			<tr>
				<th>短信模板</th>
				<td>
					<textarea class="length_5" name="mobileMessageContent">{{ $registerConfig['mobile.message.content'] }}</textarea>
				</td>
				<td><div class="fun_tips">支持参数：<br>{{ mobilecode }}为手机验证码<br>{{ sitename }}为站点名称</div></td>
			</tr>
		</table>
	</div>
	<div class="btn_wrap">
		<div class="btn_wrap_pd">
		<button class="btn btn_submit J_ajax_submit_btn" type="submit">提交</button>
		</div>
	</div>
	</form>
</div>
@include('admin.common.footer')
</body>
</html>
