<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap J_check_wrap">
	<div class="nav">
		<ul class="cc">
			<li class="current"><a href="{{ url('admin/u/check/run') }}">注册审核</a></li>
			<li><a href="{{ url('admin/u/check/email') }}">邮件审核</a></li>
		</ul>
	</div>
	<div class="h_a">提示信息</div>
	<div class="mb10 prompt_text">
		<ul>
			<li>如果<a href="{{ url('admin/config/regist/run') }}" class="J_linkframe_trigger">【注册设置】</a>中开启了“新用户注册审核”，则需要在这里审核通过后，用户才能正常操作</li>
		</ul>
	</div>
	<form action="{{ url('admin/u/check/docheck') }}" method="post" class="J_ajaxForm">
		<div class="table_list">
			<table width="100%">
				<thead>
					<tr>
						<td width="50"><input type="checkbox" name="checkAll" class="J_check_all" data-direction="y" data-checklist="J_check_user_y" value="">全选</td>
						<td width="30">UID</td>
						<td>用户名</td>
						<td>注册时间</td>
						<td>电子邮箱</td>
						<td width="300">注册原因</td>
					</tr>
				</thead>

@foreach ($list as $key => $item)

				<tr>
					<td><input class="J_check J_uid" data-yid="J_check_user_y" data-xid="J_check_user_x" type="checkbox" name="uid[]" value="{{ $item['uid'] }}"></td>
					<td>{{ $item['uid'] }}</td>
					<td>{{ $item['username'] }}</td>
					<td>{{ App\Core\Tool::time2str($item['regdate'], 'Y-m-d H:i:s') }}</td>
					<td>{{ $item['email'] }}</td>
					<td>{{ $item['regreason'] }}</td>
				</tr>
	<!--#}#-->
			</table>
		</div>
		<div class="btn_wrap">
		 <div class="btn_wrap_pd">
			<div class="select_pages">
				<a href="{{ url('admin/u/check/run?perpage=20') }}">20</a><span>|</span>
				<a href="{{ url('admin/u/check/run?perpage=50') }}">50</a><span>|</span>
				<a href="{{ url('admin/u/check/run?perpage=100') }}">100</a>
			</div>
			<label class="mr20"><input type="checkbox" name="checkAll" value="" class="J_check_all" data-direction="x" data-checklist="J_check_user_x">全选</label><button class="btn btn_submit J_ajax_submit_btn" type="submit">通过</button><button data-action="{{ url('admin/u/check/delete') }}" type="submit" class="btn mr10 J_ajax_submit_btn">忽略</button><span id="J_user_tip" style="display:none;" class="tips_error"></span>
		 </div>
		</div>
	</form>
	<page tpl='TPL:common.page' page='$page' count='$count' per='$perpage' url='admin/u/check/run?perpage=$perpage'/>
</div>
@include('admin.common.footer')
</body>
</html>