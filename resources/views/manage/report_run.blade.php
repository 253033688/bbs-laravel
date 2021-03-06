<div class="content">
	<div class="profile_nav">
		<ul>
			<li class="current"><a href="{{ url('manage/report/run') }}">举报列表</a></li>
		</ul>
	</div>
	<div class="report_page">
		<div class="hd"><strong>筛选：</strong>
		<form action="{{ url('manage/report/run') }}" method="post">
			<select id="J_report_select" class="select_2" name="type">
				<option value="" href="">全部</option>

@foreach ($reportTypes as $k => $v)
$selected = ($args['type'] == $k) ? 'selected=selected' : '';
			#-->
				<option value="{{ $k }}" data-check="{{ $args['ifcheck'] }}"{{ $selected }}>{{ $v }}</option>
			<!--# } #-->
			</select>
		</form>
		</div>
		<div class="profile_table">

@if ($reports)

		<form class="J_form_ajax" action="{{ url('manage/report/dealCheck') }}" method="post" >
			<table width="100%" class="J_check_wrap">
				<colgroup>
					<col width="60">
					<col width="50">
					<col width="300">
					<col width="115">
					<col width="115">
					<col>
				</colgroup>
				<thead>
					<tr>
						<td><label><input type="checkbox" class="J_check_all">全选</label></td>
						<td>类型</td>
						<td>内容</td>
						<td>作者</td>
						<td>举报人/举报时间</td>
						<td>举报理由</td>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<td><label><input type="checkbox" class="J_check_all">全选</label></td>
						<td colspan="3"><button type="submit" class="btn btn_submit J_form_sub_check">标记已处理</button><button type="submit" class="btn J_form_sub_check" data-action="{{ url('manage/report/delete') }}">忽略</button></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</tfoot>

@foreach ($reports as $v)

				<tr>
					<td><input class="J_check" type="checkbox" name="id[]" value="{{ $v['id'] }}"></td>
					<td>{{ $reportTypes[$v['type']] }}</td>
					<td>

@if ($v['content_url'])

					<a href="{{ $v['content_url'] }}" target="_blank">{{ App\Core\Tool::substrs(App\Core\Tool::stripWindCode($v['content']), 20) }}</a>

@else{{ App\Core\Tool::substrs(App\Core\Tool::stripWindCode($v['content']), 20) }}
					<!--# } #-->
					</td>
					<td>
@if (!empty($v['author_username']))
<a href="{{ url('space/index/run?uid=' . $v['author_userid']) }}">{{ $v['author_username'] }}</a>
@else
游客<!--#} #--></td>
					<td>
@if (!empty($v['created_username']))
<a href="{{ url('space/index/run?uid=' . $v['created_userid']) }}" target="_blank">{{ $v['created_username'] }}</a>
@else
游客<!--#} #--><br>{{ App\Core\Tool::time2str($v['created_time']) }}</td>
					<td>{{ App\Core\Tool::substrs($v['reason'], 8) }}</td>
				</tr>
				<!--# } #-->
				</table>
				</form>
				<div class="p10">
				<page tpl='TPL:common.page' page='$page' count='$count' per='$perpage' url='manage/report/run' args='$args'/>
				</div>
			</div>

@else

		<div class="not_content">啊哦，没有符合条件的内容！</div>
	<!--# } #-->
	</div>
</div>
			