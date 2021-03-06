<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">
	<div class="nav">
		<div class="return"><a href="{{ url('design/permissions/run') }}">返回上一级</a></div>
		<ul class="cc">
			<li class="current"><a href="{{ url('design/permissions/view?uid=' . $user['uid']) }}">用户权限</a></li>
		</ul>
	</div>
	
	<div class="h_a">用户权限设置</div>
	<div class="table_full">
		<table width="100%">
			<colgroup>
				<col class="th">
			</colgroup>
			<tr>
				<th>用户名</th>
				<td>{{ $user['username'] }}</td>
			</tr>
			<tr>
				<th>用户头衔</th>
				<td>{{ $user['groupname'] }}</td>
			</tr>
		</table>
	</div>
	<div class="table_list">
		<table width="100%">
			<colgroup>
				<col width="80">
				<col width="200">
				<col width="90">
				<col width="90">
			</colgroup>
			<thead>
				<tr>
					<td>类型</td>
					<td>名称</td>
					<td>编辑模块</td>
					<td>编辑内容</td>
					<td>推送内容需审核</td>
				</tr>
			</thead>

@foreach ($list as $v)

			<tr>
				<tr>
					<td>{{ $v['type'] }}</td>
					<td><a href="{{ $v['url'] }}">{{ $v['name'] }}</a></td>

@if($v['permissions'] == 3)
<td><span class="green">&radic;</span></td>
@else
<td><span class="red">x</span></td><!--# } #-->

@if($v['permissions'] == 2)
<td><span class="green">&radic;</span></td>
@else
<td><span class="red">x</span></td><!--# } #-->

@if($v['permissions'] == 1)
<td><span class="green">&radic;</span></td>
@else
<td><span class="red">x</span></td><!--# } #-->
					
				</tr>
			</tr>
			<!--# } #-->
		</table>
	</div>
</div>
@include('admin.common.footer')
<script>
$(function(){
	$('#J_time_select').on('change', function(){
		$('#J_time_'+ $(this).val()).show().siblings('.J_time_item').hide();
	});
});
</script>
</body>
</html>