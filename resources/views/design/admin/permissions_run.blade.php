<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">
	<div class="h_a">功能说明</div>
	<div class="prompt_text">
		<ul>
			<li>此处仅显示在在页面管理或模块管理中有设置过管理权限的用户列表；</li>
			<li>在"<a href="{{ url('design/page/run') }}" class="J_linkframe_trigger" title="页面管理">门户-页面管理</a>"中可为指定页面添加拥有单独管理权限的管理组用户；</li>
			<li>在"<a href="{{ url('design/module/run') }}" class="J_linkframe_trigger">门户-模块管理</a>"中可为指定模块添加拥有单独管理权限的管理组用户；</li>
			<li>只拥有"<a href="{{ url('u/groups/run?type=system') }}" class="J_linkframe_trigger">用户-用户组权限-管理组管理权限</a>"里设置的门户权限的用户，不显示在此列表中。</li>
		</ul>
	</div>
	<form action="{{ url('design/permissions/run') }}" method="post">
	<div class="h_a">搜索</div>
	<div class="prompt_text">
		<input type="text" placeholder="用户名" class="input length_3 mr5" name="username"><button class="btn" type="submit">搜索</button>
	</div>
	</form>

@if ($users)

	<div class="h_a">用户列表</div>
	<div class="table_full">
		<table width="100%">
			<colgroup>
				<col class="th">
				<col width="160">
			</colgroup>

@foreach ($users as $v)

			<tr>
				<th>{{ $v['username'] }}</th>
				<td>{{ $groups[$v['gid']]['name'] }}</td>
				<td><a href="{{ url('design/permissions/view?uid=' . $v['uid']) }}">[查看权限]</a></td>
			</tr>
		<!--# } #-->
		</table>
	</div>

@else

			<div class="not_content_mini"><i></i>啊哦，没有符合条件的用户！</div>
		<!--# } #-->

</div>
@include('admin.common.footer')
</body>
</html>