<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap J_check_wrap">
	<div class="nav">
		<ul class="cc">
		<!--# $ifcheck = $args['ifcheck'] ? 'class=current' : '';
			$noifcheck = !$args['ifcheck'] ? 'class=current' : '';
		#-->
			<li {$noifcheck}><a href="{{ url('report/manage/run') }}">未处理</a></li>
			<li {$ifcheck}><a href="{{ url('report/manage/run?ifcheck=1') }}">已处理</a></li>
			<li><a href="{{ url('report/manage/receiverlist') }}">举报提醒</a></li>
		</ul>
	</div>
	<div class="h_a">功能说明</div>
	<div class="prompt_text">
		<ol>
			<li>帖子内容管理请前往前台帖子页或者后台[内容-><a href="{{ url('bbs/article/run') }}" class="J_linkframe_trigger">帖子管理</a>]中处理；消息内容请前往[内容-><a href="{{ url('message/manage/run') }}" class="J_linkframe_trigger">消息管理</a>]中处理。</li>
			<li>标记已处理：标记后系统会发送消息反馈给举报的用户。</li>
			<li>忽略：忽略该条举报，不对举报者和被举报者产生影响。</li>
		</ol>
	</div>
	<form class="J_ajaxForm" action="{{ url('report/manage/dealCheck') }}" method="post" >

@if ($reports)

	<div class="table_list">
		<table width="100%">
			<colgroup>

@if (!$args['ifcheck'])

				<col width="65">
				<!--# } #-->
				<col width="55">
				<col width="250">
				<col width="100">
				<col width="120">
				<col width="100">
				<col>
				<col width="130">
			</colgroup>
			<thead>
				<tr>

@if (!$args['ifcheck'])

					<td><label><input class="J_check_all" data-direction="y" data-checklist="J_check_y" type="checkbox">全选</label></td>
				<!--# } #-->
					<td>
						<select id="J_report_filter" name="type">
							<option value="" href="" data-check="{{ $args['ifcheck'] }}">全部</option>

@foreach ($reportTypes as $k => $v)
$selected = ($args['type'] == $k) ? 'selected=selected' : '';
							#-->
							<option value="{{ $k }}" data-check="{{ $args['ifcheck'] }}"{{ $selected }}>{{ $v }}</option>
							<!--# } #-->
						</select>
					</td>
					<td>内容</td>
					<td>作者</td>
					<td>举报时间</td>
					<td>举报者</td>
					<td>举报理由</td>
					<td>操作</td>
				</tr>
			</thead>

@foreach ($reports as $v)
$v['content'] = App\Core\Tool::substrs(App\Core\Tool::stripWindCode($v['content']), 20);
			$created_username = $v['created_username'] ? '<a href="'.WindUrlHelper::createUrl('space/index/run?uid='.$v['created_userid'],array(),'','pw').'" target="_blank">'.$v['created_username'].'</a>' : '游客';
			$v['author_username'] = $v['author_username'] ? $v['author_username'] : '游客';
			#-->
			<tr>

@if (!$args['ifcheck'])

				<td><input class="J_check" data-yid="J_check_y" data-xid="J_check_x" type="checkbox" name="id[]" value="{{ $v['id'] }}"></td>
				<!--# } #-->
				<td>{{ $reportTypes[$v['type']] }}</td>
				<td>

@if ($v['content_url'])

				<a href="{{ $v['content_url'] }}" target="_blank">{{ $v['content'] }}</a>

@else

				{$v['content']}
				<!--# } #-->
				</td>
				<td><a href="{{ url('space/index/run?uid=' . $v['author_userid']|pw) }}" target="_blank">{{ $v['author_username'] }}</a></td>
				<td>{{ App\Core\Tool::time2str($v['created_time']) }}</td>
				<td>{!! $created_username !!}</td>
				<td>{{ $v['reason'] }}</td>

@if (!$args['ifcheck'])

				<td><a href="{{ url('report/manage/dealCheck') }}" class="mr5 J_ajax_refresh" data-pdata="{'id': {{ $v['id'] }}}">[标记已处理]</a><a href="{{ url('report/manage/delete') }}" class="J_ajax_refresh" data-pdata="{'id': {{ $v['id'] }}}">[忽略]</a></td>

@else

				<td><a href="{{ url('space/index/run?uid=' . $v['operate_userid']|pw) }}" target="_blank">{{ $v['operate_username'] }}</a> 已处理</td>
				<!--# } #-->
			</tr>
			<!--# } #-->
		</table>
		<div class="p10">
			<page tpl='TPL:common.page' page='$page' count='$count' per='$perpage' url='report/manage/run' args='$args'/>
		</div>
	</div>

@if (!$args['ifcheck'])

	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<label class="mr20"><input class="J_check_all" data-direction="x" data-checklist="J_check_x" type="checkbox">全选</label>
			<button class="btn btn_submit J_ajax_submit_btn" data-subcheck="true" type="submit">标记已处理</button>
			<button class="btn J_ajax_submit_btn" data-subcheck="true" type="submit" data-action="{{ url('report/manage/delete') }}">忽略</button>
		</div>
	</div>
	<!--# } #-->

@else

	<div class="not_content_mini"><i></i>啊哦，没有符合条件的内容！</div>
	<!--# } #-->
	</form>

</div>
@include('admin.common.footer')
<script>
$(function(){
	//筛选
	$('#J_report_filter').on('change', function(){
		var sel_option = $(this).find('option:selected');
		window.location.href = '{{ url('report/manage/run?ifcheck=') }}&type=' +sel_option.val() + '&ifcheck=' +sel_option.data('check');
	});
});
</script>
</body>
</html>