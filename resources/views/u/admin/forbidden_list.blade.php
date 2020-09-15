<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap J_check_wrap">

<!-- start -->
<div class="nav">
	<div class="return"><a href="{{ url('u/manage/run') }}">返回上一级</a></div>
	<ul class="cc">
		<li><a href="{{ url('u/forbidden/run') }}">手动禁止</a></li>
		<li><a href="{{ url('u/forbidden/auto') }}">自动禁止</a></li>
		<li class="current"><a href="{{ url('u/forbidden/list') }}">解除禁止</a></li>
	</ul>
</div>
<form method="post" action="{{ url('u/forbidden/list') }}">
<div class="h_a">搜索</div>
<div class="search_type cc mb10">
	<div class="ul_wrap">
		<ul class="cc">
			<li>
			<label><select name="key">
				<option value="username"{{ App\Core\Tool::isSelected('username' == $searchSo->getCondition('key')) }}>用户名</option>
				<option value="uid"{{ App\Core\Tool::isSelected('uid' == $searchSo->getCondition('key')) }}>UID</option>
			</select></label><input type="text" class="input length_3" name="value" value="{{ $searchSo->getCondition('value') }}">
			</li>
			<li><label>操作者：</label><input type="text" class="input length_3" name="operator" value="{{ $searchSo->getCondition('operator') }}">
			</li>
			<li><label>操作时间：</label><input type="text" class="input length_2 mr5 J_datetime date" name="start_time" value="{{ $searchSo->getCondition('start_time') }}"><span class="mr5">至</span><input type="text" class="input length_2 J_datetime date" name="end_time" value="{{ $searchSo->getCondition('end_time') }}">
			</li>
			<li><button class="btn" type="submit">搜索</button></li>
		</ul>
	</div>
</div>
</form>
<form class="J_ajaxForm" data-role="list" method="post" action="{{ url('u/forbidden/del') }}" >
<div class="table_list">
	<table width="100%">
		<colgroup>
			<col width="65">
		</colgroup>
		<thead>
			<tr class="hd">
				<td><label><input type="checkbox" data-direction="y" data-checklist="J_check_y" class="J_check_all">全选</label></td>
				<td>用户名</td>
				<td>UID</td>
				<td>禁止类型</td>
				<td>禁止范围</td>
				<td>操作时间</td>
				<td>到期时间</td>
				<td>操作者</td>
				<td>禁止原因</td>
			</tr>
		</thead>

@foreach ($list as $id => $_item)
$_endTmp = $_item['end_time'] > 0 ? App\Core\Tool::time2str($_item['end_time']) : '永久禁止';
#-->
		<tr class="ct">
			<td><input class="J_check" data-xid="J_check_x" data-yid="J_check_y" type="checkbox" name="ids[]" value="{{ $id }}"></td>
			<td>{{ $_item['username'] }}</td>
			<td>{{ $_item['uid'] }}</td>
			<td>{{ $_item['type'] }}</td>
			<td>{{ $_item['child'] }}</td>
			<td>{{ App\Core\Tool::time2str($_item['created_time'], 'Y-m-d H:i:s') }}</td>
			<td>{{ $_endTmp }}</td>
			<td><a href="{{ url('u/forbidden/list?operator=' . $_item['created_username']) }}">{{ $_item['created_username'] }}</a></td>
			<td>{{ $_item['reason'] }}</td>
		</tr>
<!--#}#-->
	</table>
</div>
<page tpl='TPL:common.page' page='$page' count='$count' per='$perpage' url='u/forbidden/list' args="$urlArgs"/>

<div class="btn_wrap">
	<div class="btn_wrap_pd">
		<label class="mr10"><input type="checkbox" data-direction="x" data-checklist="J_check_x" class="J_check_all">全选</label>
		<button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">解禁</button>
	</div>
</div>
</form>

</div>
@include('admin.common.footer')
</body>
</html>