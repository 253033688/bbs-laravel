<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">
	<!-- <div class="nav">
		<ul class="cc">
			<li class="current"><a href="{{ url('admin/windid/user/run') }}">用户管理</a></li>
		</ul>
	</div> -->
	<div class="h_a">提示信息</div>
	<div class="mb10 prompt_text">
		<ol>
			<li>用户名和电子邮箱支持模糊搜索。用户名或电子邮箱输入“a” 则检索出所有以a开头的用户名或电子邮箱。</li>
		</ol>
	</div>
	<div class="mb10"><a class="btn J_dialog" href="{{ url('admin/windid/user/add') }}" title="添加用户" role="button"><span class="add"></span>添加用户</a></div>
	<div class="h_a">搜索</div>
	<div class="search_type cc mb10">
		<form action="{{ url('admin/windid/user/run') }}" method="post">
		<input type="hidden" name="page" value="{{ $page }}">
		<label>用户名包含：</label><input name="username" type="text" class="input length_2 mr10" value="{{ $args['username'] }}">
		<label>UID：</label><input name="uid" type="number" class="input length_1 mr10" value="{{ $args['uid'] }}">
		<label>电子邮箱：</label><input name="email" type="text" class="input mr10" value="{{ $args['email'] }}">
		<button type="submit" class="btn">搜索</button>
		</form>
	</div>
	<div class="table_list">
		<table width="100%">
			<thead>
				<tr>
					<td width="30">UID</td>
					<td>用户名</td>
					<td>电子邮箱</td>
					<td>注册时间</td>
					<td>最后登录时间</td>
					<td>操作</td>
				</tr>
			</thead>

@if ($list)


@foreach ($list as $key => $item)

			<tr>
				<td>{{ $item['uid'] }}</td>
				<td>{{ $item['username'] }}</td>
				<td>{{ $item['email'] }}</td>
				<td>{{ App\Core\Tool::time2str($item['regdate'], 'Y-m-d H:i:s') }}</td>
				<td>{{ App\Core\Tool::time2str($item['lastvisit'], 'Y-m-d H:i:s') }}</td>
				<td><a href="{{ url('windid/user/edit?uid=' . $item['uid']) }}" class="mr10" title="编辑">[编辑]</a>
					<a href="{{ url('windid/user/delete?uid=' . $item['uid']) }}" class="mr10" title="删除">[删除]</a>
			</tr>
		<!--#}#-->

@else

			<tbody>
				<tr><td colspan="7" class="tac">啊哦，没有符合条件的用户！</td></tr>
			</tbody>
		<!--# } #-->
		</table>
	</div>
	<page tpl='TPL:common.page' page='$page' count='$count' per='$perPage' url='windid/user/run' args='$args'/>
	
</div>
@include('admin.common.footer')
</body>
</html>