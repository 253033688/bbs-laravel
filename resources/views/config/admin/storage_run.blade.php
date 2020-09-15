<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">
<div class="nav">
	<ul class="cc">
		<li><a href="{{ url('/config/attachment/run') }}">附件设置</a></li>
		<li><a href="{{ url('/config/attachment/storage') }}">附件存储</a></li>
		<li><a href="{{ url('/config/attachment/thumb') }}">附件缩略</a></li>
		<li  class="current"><a href="{{ url('/config/storage/run') }}">头像存储</a></li>
	</ul>
</div>

<div class="h_a">功能说明</div>
<div class="prompt_text">
	<ul>
		<li>本设置为头像存储设置,存储方案独立于附件存储方案。</li>
		<!-- <li>头像存储支持app扩展，可以到<a href="{{ url('/appcenter/app/run') }}">应用中心</a>下载更多的可用存储方案。</li> -->
		<li>头像存储方式的更换可能会造成附件丢失，<span class="red">建议在深夜或者关闭站点后</span>再进行操作。并且更换附件存储方案需<span class="red">手动转移</span>附件文件(与存储方案本身提供的支持有关)，请谨慎选择！</li>
		<li>如果<a href="{{ url('/windid/windid/run') }}">WindID设置</a>为“作为客户端”，将采用WindID服务端设置。</li>
	</ul>
</div>

<form method="post" class="J_ajaxForm" action="{{ url('/config/storage/dostroage') }}" data-role="list">
	<div class="h_a">头像存储方式设置</div>
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>远程头像地址</th>
				<td><input type="text" class="input length_5" name="avatarurl" value="{{ $config['avatarurl'] }}"></td>
				<td><div class="fun_tips">如http://www.phpwind.net </div></td>
			</tr>
			<tr>
				<th>头像存储</th>
				<td>
					<ul class="single_list cc">

@if(empty($storages))

					暂无任何附件存储方案可选～
<!--# } #-->
<!--# 
	  $msg = '';
	  foreach($storages as $var => $value){
	  $storageType === $var && $msg = $value['description'];
#-->
						<li><span class="mr20"><label><input name="att_storage" data-msg="{{ $value['description'] }}" value="{{ $var }}" type="radio" {{ App\Core\Tool::ifcheck($storageType==$var) }}>{{ $value['name'] }}</label></span>

@if($value['managelink'])

							<a href="{{ url($value['managelink']) }}">[设置]</a>
<!--# } #-->
						</li>
<!--# } #-->
					</ul>
				</td>
				<td><div class="fun_tips">{{ $msg }}</div></td>
			</tr>
		</table>
		</div>
		<div class="btn_wrap">
			<div class="btn_wrap_pd">
				<button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
			</div>
		</div>
</form>

</div>
@include('admin.common.footer')
</body>
</html>