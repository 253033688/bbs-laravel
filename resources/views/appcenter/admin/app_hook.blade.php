<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body class="body_none" style="width:460px;">
<div class="h_a">injector列表</div>
<div class="table_list">
	<table width="100%">

@foreach($injectors as $v)

		<tr>
			<td>{{ $v['alias'] }}</td>
			<td>
			<p>描述：{{ $v['description'] }}</p>
			<p>类名: {{ $v['class'] }}</p>
			<p>方法名：{{ $v['method'] }}</p>
			<p>加载方式：{{ $v['loadway'] }}</p>
			<p>挂载条件: {{ $v['expression'] }}</p>
			</td>
		</tr>
		<!--# } #-->
	</table>
</div>
<div class="h_a">hook列表</div>
<div class="table_list">

@if($hooks)

		<table width="100%" id="J_table_list" style="table-layout:fixed;">
			<thead>
				<tr>
					<td>hook名称</td>
					<td>应用名称</td>
					<td>其他信息</td>
					<td>操作</td>
				</tr>
			</thead>
			<tbody>

@foreach($hooks as $v)

			<tr>
				<td>{{ $v['name'] }}</td>
				<td>{{ $v['app_name'] }}</td>
				<td>{{ $v['document'] }}</td>
				<td><a href="{{ url('hook/manage/detail?name=' . $v['name']) }}" class="mr5">查看详细</a></td>
			</tr>
			<!--# } #-->
			</tbody>
		</table>
		<!--# } #-->
	</div>	

@include('admin.common.footer')
</body>
</html>