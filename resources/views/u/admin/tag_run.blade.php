<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap J_check_wrap">
	<div class="h_a">搜索</div>
	<div class="search_type cc mb10">
		<form action="{{ url('u/tag/run') }}" method="post">
		<input type="hidden" name="page" value="{{ $page }}">
		<label>标签名称：</label><input name="name" type="text" class="input length_2 mr10" value="{{ $args['name'] }}">
		<label>热门标签状态：</label><select name="ifhot" class="mr10">
			<option value="all"{{ App\Core\Tool::isSelected(!App\Core\Tool::inArray($args['ifhot'], array('0', '1'))) }}>所有</option>
			<option value="1" {{ App\Core\Tool::isSelected($args['ifhot'] == '1') }}>允许</option>
			<option value="0" {{ App\Core\Tool::isSelected($args['ifhot'] == '0') }}>不允许</option>
		</select>
		<label>使用人数：</label><input name="min_count" type="text" class="input length_1 mr10" value="{{ $args['min_count'] }}"><span class="mr10">-</span><input name="max_count" type="text" class="input length_1 mr10" value="{{ $args['max_count'] }}">
		<button type="submit" class="btn">搜索</button>
		</form>
	</div>
	<form action="{{ url('u/tag/delete') }}" method="post" class="J_ajaxForm">

@if ($list)

	<div class="table_list">
		<table width="100%">
			<thead>
				<tr>
					<td width="60"><input type="checkbox" name="checkAll" class="J_check_all" data-direction="y" data-checklist="J_check_user_y" value="">全选</td>
					<td width="180">标签名称</td>
					<td width="50">使用人数</td>
					<td>热门标签状态</td>
				</tr>
			</thead>

@foreach ($list as $key => $item)
$ifhot = $item['ifhot'] ? '允许' : '不允许';
#-->
			<tr>
				<td><input class="J_check J_uid" data-yid="J_check_user_y" data-xid="J_check_user_x" type="checkbox" name="ids[]" value="{{ $item['tag_id'] }}"></td>
				<td>{{ $item['name'] }}</td>
				<td>{{ $item['used_count'] }}</td>
				<td>{{ $ifhot }}</td>
			</tr>
<!--#}#-->
		</table>
	<div class="p10">
		<page tpl='TPL:common.page' page='$page' count='$count' per='$perpage' url='u/tag/run' args='$args'/>
	</div>
	</div>

@else

<div class="not_content_mini"><i></i>啊哦，没有符合条件的内容！</div>
<!--# } #-->

@if ($list)

	<div class="btn_wrap">
	 <div class="btn_wrap_pd">
		<label class="mr20"><input type="checkbox" name="checkAll" value="" class="J_check_all" data-direction="x" data-checklist="J_check_user_x">全选</label>
		<button class="btn btn_submit J_ajax_submit_btn" type="submit">删除标签</button>
		<button data-action="{{ url('u/tag/setHot') }}" type="submit" class="btn mr10 J_ajax_submit_btn">允许为热门标签</button>
		<button data-action="{{ url('u/tag/cancleHot') }}" type="submit" class="btn mr10 J_ajax_submit_btn">不允许为热门标签</button>
		<span id="J_user_tip" style="display:none;" class="tips_error"></span>
	 </div>
	</div>
	<!--# } #-->
	</form>
</div>
@include('admin.common.footer')
</body>
</html>