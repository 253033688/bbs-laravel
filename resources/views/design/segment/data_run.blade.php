
	<table class="pop_design_tablelist">
		<colgroup>
			<col width="40">
			<col>
			<col width="60">
			<col width="80">
			<col width="40">
			<col width="80">
		</colgroup>
		<thead>
			<tr>
				<th>排序</th>
				<td>标题</td>
				<td>来源</td>
				<td>显示时间</td>
				<td>固定</td>
				<td>操作</td>
			</tr>
		</thead>
	<!--# 
		$time = App\Core\Tool::getTime();
		$i=1; foreach ($list as $v){
		//$isfuture = $v['start_time'] > $time ? true : false;
	#-->
		<tr>
			
			<th>

@if ($v['is_reservation'])

			<input type="text" class="input length_0" style="background-color: #dddddd" name="vieworder_reserv[{{ $v['data_id'] }}]" value="{{ $i }}"  readonly>

@else

			<input type="text" class="input length_0" name="vieworder[{{ $v['data_id'] }}]" value="{{ $i }}" >
			<input type="hidden" name="vieworder_tmp[{{ $v['data_id'] }}]" value="{{ $i }}" >
			<!--# } #-->
			
			</th>
			<td><div class="subject">

@if ($v['is_reservation'])
<span style="color:#ff0000">[预订]</span><!--# } #-->

@if ($v['is_edited'])
<span style="color:#008800">[修改]</span><!--# } #-->
			<a href="{{ $v['url'] }}" target="_blank">{{ $v['title'] }}</a></div></td>
			<td>
@if($v['from_type'] == 1)
 推送
@elseif($v['from_type'] == 2)
手动添加
@else
自动获取<!--# } #--></td>
			<td>{{ App\Core\Tool::time2str($v['start_time'], 'm-d H:i') }}</td>
			<td><input type="checkbox" name="isfixed[{{ $v['data_id'] }}]" value="1" {{ App\Core\Tool::ifcheck($v['data_type'] == 2) }}></td>
			<td>
				<a href="{{ url('design/data/edit?dataid=' . $v['data_id'] . '&moduleid=' . $v['module_id']) }}" class="mr5 J_data_edit" data-id="{{ $v['data_id'] }}">[编辑]</a>

@if($v['from_type'] == 1)

                <a class="J_design_data_ajax" href="{{ url('design/data/doshield?dataid=' . $v['data_id'] . '&moduleid=' . $v['module_id']) }}" data-pdata="{'dataid': {{ $v['data_id'] }}, 'moduleid':{{ $v['module_id'] }}}">[删除]</a>

@else

                <a class="J_design_data_ajax" href="{{ url('design/data/doshield?dataid=' . $v['data_id'] . '&moduleid=' . $v['module_id']) }}" data-pdata="{'dataid': {{ $v['data_id'] }}, 'moduleid':{{ $v['module_id'] }}}">[屏蔽]</a>
				<!--# } #-->
				<input type="hidden" name="dataid[]" value="{{ $v['data_id'] }}">
			</td>
		</tr>
	<!--# 
	if (!$v['is_reservation'])	$i++; 
	} #-->
	</table>
							
