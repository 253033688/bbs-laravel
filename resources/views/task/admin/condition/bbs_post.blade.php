<!--=======发帖条件=========-->
<tbody class="J_task_forum">
	<tr>
		<th>指定版块</th>
		<td>
			<span class="must_red">*</span>
			<select class="select_6" name="condition[fid]">

@foreach($catedb as $cate)

			<optgroup label=">>{{ $cate['name'] }}">

@if ($forumList[$cate['fid']])
foreach ($forumList[$cate['fid']] as $forum) { #-->
			<option value="{{ $forum['fid'] }}" {{ App\Core\Tool::isSelected($forum['fid'] == $condition['fid']) }}>{!! $forum['level'] !!}|--{{ $forum['name'] }}</option>
<!--#}}#-->
			</optgroup>
<!--#}#-->
			</select>
		</td>
		<td><div class="fun_tips"></div></td>
	</tr>
	<tr>
		<th>发帖数</th>
		<td>
			<span class="must_red">*</span>
			<input type="text" class="input length_5 input_hd" name="condition[num]" value="{{ $condition['num'] }}">
			<input type="hidden" name="condition[url]" value="bbs/post/run?fid={{ fid }}">
		</td>
		<td><div class="fun_tips"></div></td>
	</tr>
</tbody>