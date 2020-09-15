<!doctype html>
<html>
<head>
@include('common.head')
</head>
<body>
<div class="wrap">

<!--用户后台权限: 列表  -->
<div class="nav">
	<ul class="cc">
		<li class="current"><a href="{{ url('auth/run') }}">后台用户</a></li>
		<li><a href="{{ url('role/run') }}">管理角色</a></li>
	</ul>
</div>
<div class="h_a">提示信息</div>
<div class="mb10 prompt_text">
	<ol>
		<li>允许添加进入后台的用户，进入后台的操作权限，由所赋予的角色决定，一个用户可以被赋予多个角色</li>
	</ol>
</div>
<div class="cc mb10"><a href="{{ url('auth/add') }}" title="添加用户" class="btn J_dialog"><span class="add"></span>添加后台用户</a></div>
<div class="table_list">
	<table width="100%">
		<thead>
			<tr>
				<td width="140">用户名</td>
				<td width="200">拥有角色</td>
				<td>操作</td>
			</tr>
		</thead>

@foreach($list as $var)

		<tr>
			<td>{{ $var['username'] }}</td>
			<td>{{ $var['roles'] }}</td>
			<td>
				<a href="{{ url('auth/edit?id=' . $var['id']) }}" title="编辑用户" class="mr10 J_dialog">[编辑]</a>
				<a href="{{ url('auth/del') }}" data-pdata="{'id': {{ $var['id'] }}}" class="mr10 J_ajax_del">[删除]</a>
			</td>
		</tr>
<!--# } #-->
	</table>
</div>
<page tpl='TPL:common.page' page='$page' count='$count' per='$per' url='auth/run' />
	
</div>
{{--  @include('common.footer') --}}
</body>
</html>