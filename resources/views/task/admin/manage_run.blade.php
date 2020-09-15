<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">
<!--===================任务列表====================-->
<form class="J_ajaxForm" data-role="list" action="{{ url('/task/manage/open') }}" method="post">
	<div class="h_a">基本设置</div>
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>任务中心</th>
				<td>
					<ul class="switch_list cc">
						<li><label><input type="radio" name="isOpen" value="1" {{ App\Core\Tool::ifcheck($isOpen == 1) }}><span>开启</span></label></li>
						<li><label><input type="radio" name="isOpen" value="0" {{ App\Core\Tool::ifcheck($isOpen == 0) }}><span>关闭</span></label></li>
					</ul>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
		</table>
	</div>
	<div class="mb10"><a href="{{ url('/task/manage/add') }}" class="btn"><span class="add"></span>添加新任务</a></div>
	<div class="table_list">
		<table width="100%" class="J_check_wrap">
			<colgroup>
				<col width="65">
			</colgroup>
			<thead>
				<tr>
					<td>顺序</td>
					<td>名称</td>
					<td><label><input class="J_check_all" data-checklist="J_check_y" data-direction="y" type="checkbox">启用</label></td>
					<td>奖励</td>
					<td>时限</td>
					<td>操作</td>
				</tr>
			</thead>

@if ($list)


@foreach($list as $id => $task)
if(!$task['start_time'] && $task['end_time'] == PwTaskDm::MAXENDTIME) {
					$time = '不限';
				} else {
					$start_time = $task['start_time'] ? App\Core\Tool::time2str($task['start_time'], 'Y-m-d') . '开始' : '不限';
					$end_time = $task['end_time'] == PwTaskDm::MAXENDTIME ? '不限' : App\Core\Tool::time2str($task['end_time'], 'Y-m-d') . '结束';
					$time = $start_time . ' 至 ' . $end_time;
				}
				$reward = $task['reward']['descript'] ? $task['reward']['descript'] : '无';
				$msg = isset($task['msg']) ? ' data-msg=' . $task['msg'] . '' : '';
			#-->
			<tr>
				<td><input type="number" name="task[{{ $id }}][sequence]" class="input length_1" value="{{ $task['view_order'] }}"></td>
				<td><input type="text" name="task[{{ $id }}][title]" class="input length_3" value="{{ $task['title'] }}"></td>
				<td><input type="checkbox" name="task[{{ $id }}][status]" data-yid="J_check_y" class="J_check"{{ App\Core\Tool::ifCheck($task['is_open']) }} value="1">
				</td>
				<td>{{ $reward }}</td>
				<td>{{ $time }}</td>
				<td><a href="{{ url('/task/manage/edit?id=' . $id) }}" class="mr5">[编辑]</a><a class="J_ajax_del" href="{{ url('/task/manage/del') }}" data-pdata="{'id':'{{ $id }}'}"{{ $msg }}>[删除]</a></td>
			</tr>
			<!--#}#-->

@else

				<tr><td colspan="7" class="tac">啊哦，暂无内容！</td></tr>
			<!--# } #-->
		</table>
		<div class="p10"><page tpl='TPL:common.page' page='$page' count='$count' per='$perpage' url='task/manage/run' /></div>
	</div>

@if ($list)

	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<button class="btn btn_submit J_ajax_submit_btn" type="submit">提交</button>
		</div>
	</div>
	<!--# } #-->
</form>
</div>
@include('admin.common.footer')
</body>
</html>