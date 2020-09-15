<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap J_check_wrap">	
	<!-- <div class="nav">
		<ul class="cc">
			<li class="current"><a href="{{ url('windidclient/windid/run') }}">基本设置</a></li>
			
		</ul>
	</div> -->
	<div class="h_a">功能说明</div>
	<div class="prompt_text">
		<ol>
			<li>通过WindID,可以实现多个系统间的用户同步登录，登出，并实现各系统间用户资料，积分，私信等同步。</li>
			<li>独立系统：如查当前没有对接其它系统，请选择此项。</li>
			<li>连接到其他WindID系统：表示当前系统作为另一个WindID系统客户端，需要确认客户端通信密钥、服务端数据库配置与服务端保持一致，确保通信成功。设置成功后，客户端用户信息，积分，私信将和服务端保持一致。</li>
		</ol>
	</div>

	<form class="J_ajaxForm"  action="{{ url('windidclient/windid/dorun') }}" method="post">
	<div class="h_a">WindID设置</div>
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="400"/>
			<tr>
				<th>将本系统</th>
				<td>
					<ul class="single_list J_radio_change" data-rel=".J_windid_item">
						<li><label><input name="windid" data-arr="" value="local" type="radio" {{ App\Core\Tool::ifcheck($config['windid'] == 'local') }}><span>作为独立系统</span></label></li>
						<li><label><input name="windid" data-arr="windid_set_2" value="client" type="radio" {{ App\Core\Tool::ifcheck($config['windid'] == 'client') }}><span>连接到其他WindID系统</span></label></li>
					</ul>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>服务端Url</th>
				<td><input name="serverUrl" type="text" class="input length_5" value="{{ $config['serverUrl'] }}">
				</td>
				<td><div class="fun_tips">默认为网站地址加/windid目录，如http://www.phpwind.net/windid，可另外绑定域名</div></td>
			</tr>
			<tr>
				<th>客户端ID</th>
				<td><input name="clientId" type="text" class="input length_5" value="{{ $config['clientId'] }}"></td>
				<td><div class="fun_tips">在服务端“客户端列表”的ID</div></td>
			</tr>
			<tr>
				<th>通讯密钥</th>
				<td><input name="clientKey" type="text" class="input length_5" value="{{ $config['clientKey'] }}"></td>
				<td><div class="fun_tips">在服务端“客户端列表”的通讯密钥</div></td>
			</tr>
		</table>
		<table width="100%" id="windid_set_2" class="J_windid_item">
			<col class="th" />
			<col width="400"/>
			<tr>
				<th>连接方式</th>
				<td>
					<ul class="single_list J_radio_change" data-rel=".J_db_item">
						<li><label><input name="connect" data-arr="db_set" value="db" type="radio" {{ App\Core\Tool::ifcheck($config['connect'] != 'http') }}><span>数据库连接(推荐)</span></label></li>
						<li><label><input name="connect" data-arr="" value="http" type="radio" {{ App\Core\Tool::ifcheck($config['connect'] == 'http') }}><span>HTTP连接</span></label></li>
					</ul>
				</td>
				<td><div class="fun_tips">如果能够直接访问服务端windid数据库，请选择本地连接，请配置windid数据库连接,否则选择http方式，不需要配置数据库</div></td>
			</tr>
			<tbody id="db_set" class="J_db_item">
			<tr>
				<th>数据库服务器</th>
				<td><input name="dbhost" type="text" class="input length_5" value="{{ $config['db.host'] }}"></td>
				<td></td>
			</tr>
			<tr>
				<th>数据库服务器端口</th>
				<td><input name="dbport" type="text" class="input length_5" value="{{ $config['db.port'] }}"></td>
				<td><div class="fun_tips">默认端口为3306</div></td>
			</tr>
			<tr>
				<th>数据库用户名</th>
				<td><input name="dbuser" type="text" class="input length_5" value="{{ $config['db.user'] }}"></td>
				<td></td>
			</tr>
			<tr>
				<th>数据库密码</th>
				<td><input name="dbpwd" type="password" class="input length_5" value="{{ $config['db.pwd'] }}"></td>
				<td></td>
			</tr>
			<tr>
				<th>数据库名</th>
				<td><input name="dbname" type="text" class="input length_5" value="{{ $config['db.name'] }}"></td>
				<td></td>
			</tr>
			<tr>
				<th>数据库表前缀</th>
				<td><input name="dbprefix" type="text" class="input length_5" value="{{ $config['db.prefix'] }}">
				</td>
				<td><div class="fun_tips">windid的表前缀是默认系统表前缀加上<span class="b">windid_</span>（如pw_，windid的表前缀为pw_windid_）</div></td>
			</tr>
			<tr>
				<th>数据库编码</th>
				<td><input name="dbcharset" type="text" class="input length_5" value="{{ $config['db.charset'] }}">
				</td>
				<td><div class="fun_tips">gbk、utf8、big5等</div></td>
			</tr>
			</tbody>
		</table>
	</div>
	<!--  # if($config['windid'] == 1){ #  -->
	<!-- <div id="J_client_set" class="J_windid_item">
		<div class="h_a">客户端配置</div>
		<div class="table_full">
			<table width="100%">
				<col class="th" />
				<col width="400"/>
				<tr>
					<th>服务端Url</th>
					<td><input name="serverUrl" type="text" class="input length_5" value="{{ $client->serverUrl }}">
						<input name="clientCharser" type="hidden"  value="{{ $client->clientCharser }}">
					</td>
					<td></td>
				</tr>
				<tr>
					<th>客户端ID</th>
					<td><input name="clientId" type="text" class="input length_5" value="{{ $client->clientId }}"></td>
					<td><div class="fun_tips">在服务端“客户端列表”的ID</div></td>
				</tr>
				<tr>
					<th>通讯密钥</th>
					<td><input name="clientKey" type="text" class="input length_5" value="{{ $client->clientKey }}"></td>
					<td><div class="fun_tips">在服务端“客户端列表”的通讯密钥</div></td>
				</tr>
				<tr>
					<th>windid连接方式</th>
					<td>
						<ul class="single_list">
							<li><label><input name="clientDb"  value="mysql" type="radio" {{ App\Core\Tool::ifcheck($client->clientDb == 'mysql') }}><span>本地连接</span></label></li>
							<li><label><input name="clientDb"  value="http" type="radio" {{ App\Core\Tool::ifcheck($client->clientDb == 'http') }}><span>HTTP连接</span></label></li>
						</ul>
					</td>
					<td><div class="fun_tips">如果能够直接访问服务端windid数据库，请选择本地连接，请配置windid数据库连接,否则选择http方式，不需要配置数据库</div></td>
				</tr> -->
				<!-- <tr>
					<th>客户端编码</th>
					<td>
						<input name="clientCharser"  value="utf-8" type="radio" {{ App\Core\Tool::ifcheck($client->clientCharser == 'utf-8') }}><span>UTF-8</span>
						<input name="clientCharser"  value="gbk" type="radio" {{ App\Core\Tool::ifcheck($client->clientCharser == 'gbk') }}><span>GBK</span>
					</td>
					<td><div class="fun_tips">客户端的网页编码</div></td>
				</tr> -->
			<!-- </table>
		</div>
	</div> -->
	<!--  # } #  -->
	<!-- <div class="h_a">windid数据库配置</div>
		<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col/>
			<tr>
				<th>数据库服务器</th>
				<td><input name="dbhost" type="text" class="input length_5" value="{{ $mysql['host'] }}"></td>
				<td></td>
			</tr>
			<tr>
				<th>数据库用户名</th>
				<td><input name="dbuser" type="text" class="input length_5" value="{{ $mysql['user'] }}"></td>
				<td></td>
			</tr>
			<tr>
				<th>数据库密码</th>
				<td><input name="dbpwd" type="password" class="input length_5" value="{{ $mysql['pwd'] }}"></td>
				<td></td>
			</tr>
			<tr>
				<th>数据库名</th>
				<td><input name="dbname" type="text" class="input length_5" value="{{ $mysql['dbname'] }}"></td>
				<td></td>
			</tr>
			<tr>
				<th>数据库表前缀</th>
				<td><input name="dbprefix" type="text" class="input length_5" value="{{ $mysql['tableprefix'] }}">
					<input name="engine" type="hidden"  value="{{ $mysql['engine'] }}">
					<input name="port" type="hidden"  value="{{ $mysql['port'] }}">
				</td>
				<td></td>
			</tr>
		</table>
	</div> -->
	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<button class="btn btn_submit J_ajax_submit_btn" type="submit" >提交</button>
		</div>
	</div>
	</form>
</div>
@include('admin.common.footer')

</body>
</html>