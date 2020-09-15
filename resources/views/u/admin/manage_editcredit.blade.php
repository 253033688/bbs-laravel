<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">
	<div class="nav">
		<div class="return"><a href="{{ url('u/manage/run') }}">返回上一级</a></div>
		<ul class="cc">
			<li><a href="{{ url('admin/u/manage/edit?uid=' . $uid) }}">用户信息</a></li>
			<li class="current"><a href="{{ url('admin/u/manage/editCredit?uid=' . $uid) }}">积分</a></li>
			<li><a href="{{ url('admin/u/manage/editGroup?uid=' . $uid) }}">用户组</a></li>
		</ul>
	</div>
<!--====================用户编辑开始====================-->
<!--积分-->
<div class="h_a">编辑用户积分</div>
<form class="J_ajaxForm" data-role="list" action="{{ url('/u/manage/doEditCredit') }}" method="post">
<div class="table_full">
	<table width="100%">
		<col class="th" />
		<col />
		<thead>
		<tr>
			<th>用户名</th>
			<td><span class="mr10">{{ $username }}</span> (UID：{$uid})
			<input type="hidden" name="uid" value="{{ $uid }}">
			</td>
		</tr>
		</thead>

@foreach($credits as $key => $credit)

		<tr>
			<th>{{ $credit['name'] }}</th>
			<td><input name="credit[{{ $key }}]" type="text" class="input length_5" value="{{ $credit['num'] }}"></td>
		</tr>
		<!--# } #-->
	</table>
</div>
	<div class="btn_wrap">
		 <div class="btn_wrap_pd">
				<button type="submit" class="btn btn_submit J_ajax_submit_btn">提交</button>
		 </div>
	</div>
</form>

</div>
@include('admin.common.footer')
</body>
</html>