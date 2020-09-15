<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body class="body_none" style="width:440px">

	<form class="J_ajaxForm" action="{{ url('tag/manage/doEditCategory') }}" method="post">
	<div class="pop_cont">
		<div class="pop_table" style="height:auto;">
			<table width="100%">
				<tr>
					<th>分类名称</th>
					<td><span class="must_red">*</span><input type="text" class="input length_5 input_hd" name="data[category_name]" value="{{ $category['category_name'] }}"></td>
				</tr>
				<tr>
					<th>分类别名</th>
					<td>
						<input type="text" class="input length_5 mb5" name="data[alias]" value="{{ $category['alias'] }}">
						<p class="gray">别名使用英文字符，设置后分类页面的URL可以显示英文名称</p>
					</td>
				</tr>
				<tr>
					<th>顺序</th>
					<td>
						<input type="number" class="input length_5" name="data[vieworder]" value="{{ $category['vieworder'] }}">
					</td>
				</tr>
					<th>title设置</th>
					<td><input type="text" class="input length_5" name="data[seo_title]" value="{{ $category['seo_title'] }}"></td>
				</tr>
				<tr>
					<th>description设置</th>
					<td><input type="text" class="input length_5" name="data[seo_description]" value="{{ $category['seo_description'] }}"></td>
				</tr>
				<tr>
					<th>keywords设置</th>
					<td><input type="text" class="input length_5" name="data[seo_keywords]" value="{{ $category['seo_keywords'] }}"></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="pop_bottom">
		<input type="hidden" name="id" value="{{ $category['category_id'] }}">
		<button class="btn fr" id="J_dialog_close" type="button">取消</button>
		<button type="submit" class="btn btn_submit J_ajax_submit_btn fr mr10">提交</button>
	</div>
	</form>
@include('admin.common.footer')
</body>
</html>