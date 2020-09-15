<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap J_check_wrap">
	<div class="h_a">功能说明</div>
	<div class="prompt_text">
		删除符合条件的消息,用于清理站点冗余数据,此操作不可恢复,请谨慎使用！ 
	</div>
	<div class="h_a">搜索</div>
	<div class="search_type cc mb10">
		<form action="{{ url('message/manage/run') }}" method="post" >
			<label>关键字：</label><input type="text" class="input length_2 mr10" name="keyword" value="{{ $args['keyword'] }}">
			<label>发件人：</label><input type="text" class="input length_2 mr10" name="username" value="{{ $args['username'] }}">
			<label>发送时间：</label><input type="text" class="input mr5 length_2 J_datetime" name="starttime" value="{{ $args['starttime'] }}"><span class="mr5">至</span><input type="text" class="input length_2 J_datetime mr10" name="endtime" value="{{ $args['endtime'] }}">
			<button class="btn">搜索</button>
		</form>
	</div>
	<form class="J_ajaxForm" action="{{ url('message/manage/deletemessages') }}" method="post" >

@if ($messages)

	<div class="table_list">
		<table width="100%" id="J_subcheck">
			<colgroup>
				<col width="65">
				<col width="100">
				<col>
				<col width="120">
			</colgroup>
			<thead>
				<tr>
					<td><label><input type="checkbox" data-checklist="J_check_x" data-direction="x" class="J_check_all">全选</label></td>
					<td>发件人</td>
					<td>内容</td>
					<td>时间</td>
				</tr>
			</thead>

@foreach ($messages as $value)
$value['created_time'] = App\Core\Tool::time2str($value['created_time']);
			#-->
			<tr>
				<td><input data-xid="J_check_x" data-yid="J_check_y" class="J_check" type="checkbox" name="ids[]" value="{{ $value['message_id'] }}"></td>
				<td>{{ $value['username'] }}</td>
				<td>{{ $value['content'] }}</td>
				<td>{{ $value['created_time'] }}</td>
			</tr>
			<!--# } #-->
		</table>
		<div class="p10">
			<page tpl='TPL:common.page' page='$page' count='$count' per='$perpage' url='message/manage/run' args='$args'/>
		</div>
		<div class="btn_wrap">
			<div class="btn_wrap_pd">
				<label class="mr20"><input type="checkbox" data-checklist="J_check_y" data-direction="y" class="J_check_all">全选</label>
				<button class="btn J_ajax_submit_btn" type="submit" data-subcheck="true" data-msg="确定删除选定的消息？">删除</button>
			</div>
		</div>
	</div>

@else

		<div class="not_content_mini"><i></i>啊哦，没有符合条件的内容！</div>
		<!--# } #-->
	</form>
</div>
@include('admin.common.footer')
</body>
</html>