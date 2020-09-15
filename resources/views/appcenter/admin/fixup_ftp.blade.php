<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">
	<div class="nav">
		<ul class="cc">
			<li><a href="{{ url('appcenter/upgrade/run') }}">版本升级</a></li>
			<li class="current"><a href="{{ url('appcenter/fixup/run') }}">安全中心</a></li>
		</ul>
	</div>
	<form class="J_ajaxForm" method="post" action="{{ url('appcenter/fixup/doFtp') }}">
	<div class="h_a">设置FTP/SFTP信息</div>
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>服务器地址</th>
				<td>
				<input type="hidden" name="ftp" value="1">
				<input name="server" type="text" class="input length_5"></td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>服务器端口</th>
				<td><input name="port" type="text" class="input length_5"></td>
				<td><div class="fun_tips">默认为21</div></td>
			</tr>
			<tr>
				<th>站点根目录</th>
				<td><input name="dir" type="text" class="input length_5"></td>
				<td><div class="fun_tips">站点根目录的绝对路径或相对于 FTP 主目录的相对路径，结尾不要加斜杠“/”，“.”表示 FTP 主目录</div></td>
			</tr>
			<tr>
				<th>帐号</th>
				<td><input name="user" type="text" class="input length_5"></td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>密码</th>
				<td><input name="pwd" type="password" class="input length_5"></td>
				<td><div class="fun_tips">密码中请不要包含“*”</div></td>
			</tr>
			<tr>
				<th>协议</th>
				<td><select size="1" name="sftp"><option value="0" selected="selected">ftp</option><option value="1">sftp</option></select></td>
				<td></td>
			</tr>
		</table>
		</div>
		<div class="btn_wrap">
			<div class="btn_wrap_pd">
				<button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">连接并检测</button>
			</div>
		</div>
	</form>
</div>

@include('admin.common.footer')

</body>
</html>
