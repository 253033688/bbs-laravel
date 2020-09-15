<!doctype html>
<html>
<head>
@include('common.head')
</head>
<body>
<div class="wrap">
	<!--角色管理: 列表-->
	<div class="nav">
		<ul class="cc">
			<li><a href="{{ url('auth/run') }}">后台用户</a></li>
			<li class="current"><a href="{{ url('role/run') }}">管理角色</a></li>
		</ul>
	</div>
	<div class="h_a">提示信息</div>
	<div class="mb10 prompt_text">
		<ol>
			<li>可以将某一类的后台管理权限归为一个角色，然后将角色赋予用户。如果角色权限改变，用户的后台权限也随之改变</li>
		</ol>
	</div>
	<div class="cc mb10"><a href="{{ url('role/add') }}" class="btn"><span class="add"></span>添加角色</a></div>
	<div class="table_list">
		<table width="100%">
			<thead>
				<tr>
					<td width="140">角色名称</td>
					<td>操作</td>
				</tr>
			</thead>

@foreach($roles as $role)

			<tr>
				<td>{{ $role['name'] }}</td>
				<td>
					<a href="{{ url('role/edit?rid=' . $role['id']) }}" class="mr10">[编辑]</a>
					<a href="{{ url('role/del') }}" class="mr10 J_ajax_del" data-pdata="{'rid': {{ $role['id'] }}}">[删除]</a></td>
			</tr>
	<!--# } #-->
		</table>
	</div>
</div>
{{--  @include('common.footer') --}}
</body>
</html>