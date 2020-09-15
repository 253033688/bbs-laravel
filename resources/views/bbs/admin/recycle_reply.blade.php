<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap J_check_wrap">
	<div class="nav">
		<ul class="cc">
			<li><a href="{{ url('bbs/recycle/run') }}">主题回收站</a></li>
			<li class="current"><a href="{{ url('bbs/recycle/reply') }}">回复回收站</a></li>
		</ul>
	</div>
	<div class="h_a">搜索</div>
	<form method="post" action="{{ url('bbs/recycle/reply') }}">
	<div class="search_type cc mb10">
		<div class="ul_wrap">
			<ul class="cc">
				<li><label>关键字：</label><input class="input length_3" name="keyword" autoComplete="off" type="text" value="{{ $url['keyword'] }}"></li>
				<li><label>所属版块：</label><select name="fid" class="select_3"><option value="0">所有版块</option>{!! $option_html !!}</select></li>
				<li><label>作者：</label><input class="input length_3" name="author" autoComplete="off" type="text" value="{{ $url['author'] }}"></li>
				<li><label>发帖时间：</label><input class="input length_2 J_date" name="postdate_start" autoComplete="off" type="text" value="{{ $url['created_time_start'] }}"> 至 <input class="input length_2 J_date" name="postdate_end" autoComplete="off" type="text" value="{{ $url['created_time_end'] }}"></li>
				<li><label>删除人：</label><input class="input length_3" name="operator" autoComplete="off" type="text" value="{{ $url['operator'] }}"></li>
				<li><label>删除时间：</label><input class="input length_2 J_date" name="deltime_start" autoComplete="off" type="text" value="{{ $url['operate_time_start'] }}"> 至 <input class="input length_2 J_date" name="deltime_end" autoComplete="off" type="text" value="{{ $url['operate_time_end'] }}"></li>
			</ul>
		</div>
		<div class="btn_side">
			<button class="btn" type="submit">搜索</button>
		</div>
	</div> 
	</form>
	<form class="J_ajaxForm" data-role="list" action="#" method="post">
	<div class="table_list">
		<table width="100%">
			<colgroup>
				<col width="65">
				<col>
				<col width="100">
				<col width="120">
				<col width="100">
				<col width="120">
				<col>
			</colgroup>
			<thead>
				<tr>
					<td><label><input class="J_check_all" data-checklist="J_check_x" data-direction="x" type="checkbox" />全选</label></td>
					<td>标题</td>
					<td>作者</td>
					<td>发帖时间</td>
					<td>删除人</td>
					<td>删除时间</td>
					<td>删除理由</td>
				</tr>
			</thead>
			<tbody>

@if ($threaddb)


@foreach ($threaddb as $key => $value)

				<tr>
					<td><input type="checkbox" class="J_check" name="pids[]" value="{{ $value[pid] }}" data-xid="J_check_x" data-yid="J_check_y" /></td>
					<td>{{ @$value['subject'] ? $value['subject'] : App\Core\Tool::substrs($value['content'], 20) }}</td>
					<td>{{ $value['created_username'] }}</td>
					<td>{{ App\Core\Tool::time2str($value['created_time']) }}</td>
					<td>{{ $value['operate_username'] }}</td>
					<td>{{ App\Core\Tool::time2str($value['operate_time']) }}</td>
					<td>{{ $value['reason'] }}</td>
				</tr>
				<!--# } #-->

@else

				<tr><td colspan="7" class="tac">暂无搜索结果!</td></tr>
			<!--# } #-->
			</tbody>
		</table>
		<div class="p10">
			<page tpl='TPL:common.page' page='$page' count='$count' per='$perpage' url='bbs/recycle/reply' args='$url'/>
		</div>
	</div>

@if ($threaddb)

	<div class="btn_wrap">
		<div class="btn_wrap_pd" id="J_sub_wrap">
			<label class="mr10"><input class="J_check_all" data-checklist="J_check_y" data-direction="y" type="checkbox">全选</label>
			<button type="submit" class="btn btn_submit J_ajax_submit_btn" data-subcheck="true" data-action="{{ url('bbs/recycle/doRevertReply') }}">还原</button>
			<button type="submit" class="btn J_ajax_submit_btn" data-subcheck="true" data-msg="确定要删除吗？" data-action="{{ url('bbs/recycle/doDeleteReply') }}">删除</button>
		</div>
	</div>
	<!--# } #-->
	</form>
	
</div>
@include('admin.common.footer')
</body>
</html>