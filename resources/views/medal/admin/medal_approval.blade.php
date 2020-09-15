<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap J_check_wrap">
	<div class="nav">
		<ul class="cc">
			<li><a href="{{ url('medal/medal/run') }}">勋章管理</a></li>
			<li><a href="{{ url('medal/medal/award') }}">勋章颁发</a></li>
			<li class="current"><a href="{{ url('medal/medal/approval') }}">勋章审核</a></li>
			<li><a href="{{ url('medal/medal/set') }}">勋章设置</a></li>
		</ul>
	</div>
	
	<div class="h_a">勋章会员筛选</div>
	<div class="search_type cc mb10">
		<form  action="{{ url('medal/medal/approval') }}" method="post">
			<label>勋章名称：</label>
			<select size="1" name="medalid" class="mr10">
				<option value="0">全部</option>

@foreach ($medalList as $medal)

				<option value="{{ $medal['medal_id'] }}"  {{ App\Core\Tool::isSelected($medal['medal_id'] == $medalId) }}>{{ $medal['name'] }}</option>
			<!--# } #-->
			</select>
			<label>用户名：</label><input type="text" class="input length_3 mr10" name="username" value="{{ $username }}"/>
			<button class="btn">筛选</button>
		</form>
	</div>

	<!-- list -->
	<form class="J_ajaxForm" data-role="list" action="{{ url('medal/medal/batchPass') }}" method="post">

@if ($list)

	<div class="table_list">
	<table width="100%" id="J_subcheck">
			<colgroup>
				<col width="65">
			</colgroup>
			<thead>
				<tr>
					<td><label><input class="J_check_all" data-checklist="J_check_y" data-direction="y" type="checkbox">全选</label></td>
					<td>用户名</td>
					<td>勋章名称</td>
					<td>勋章图标</td>
					<td>勋章说明</td>
					<td>操作</td>
				</tr>
			</thead>

@foreach ($list as $log)

			<tr>
				<td><input class="J_check" data-yid="J_check_y" data-xid="J_check_x" type="checkbox" name="logids[]" value="{{ $log['log_id'] }}"/></td>
				<td><a href="{{ url('medal/medal/approval?uid=' . $log['uid']) }}">{{ $users[$log['uid']]['username'] }}</a></td>
				<td>{{ $medals[$log['medal_id']]['name'] }}</td>
				<td><img src="{{ $medals[$log['medal_id']]['medalImage'] }}" width="30" height="30" /></td>
				<td>{{ $medals[$log['medal_id']]['descrip'] }}</td>
				<td><a href="{{ url('medal/medal/doEditApply') }}" class="mr5 J_ajax_refresh" data-pdata="{'id': {{ $log['log_id'] }}, 'check':'yes'}">[通过]</a><a href="{{ url('medal/medal/doEditApply') }}" class="J_ajax_del" data-msg="确定要拒绝此申请？" data-pdata="{'id': {{ $log['log_id'] }}, 'check': 'no'}">[拒绝]</a></td>
			</tr>
			<!--# } #-->
		</table>
		<div class="p10"><page tpl='TPL:common.page'  total="$totalpage" page="$page" per="$perpage" count="$count" url="medal/medal/approval" args="$args"/></div>
	</div>

@else

		<div class="not_content_mini"><i></i>啊哦，没有符合条件的内容！</div>
		<!--# } #-->

@if ($list)

	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<label class="mr20"><input class="J_check_all" data-checklist="J_check_x" data-direction="x" type="checkbox" />全选</label>
			<button class="btn btn_submit J_ajax_submit_btn" data-subcheck="true" type="submit">通过</button>
			<button class="btn btn_submit J_ajax_submit_btn" data-subcheck="true" data-msg="确定拒绝它们？" data-action="{{ url('medal/medal/batchDisclaim') }}" type="submit">拒绝</button>
		</div>
	</div>
	<!--# } #-->
	</form>
</div>
@include('admin.common.footer')
</body>
</html>