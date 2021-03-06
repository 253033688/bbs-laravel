<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body style="width:450px" class="body_none">
	<form class="J_ajaxForm" action="{{ url('tag/manage/doedit?_json=1') }}" method="post">
	<input type="hidden" value="{{ $tag['tag_id'] }}" name="tag[tag_id]" />
	<div style="padding:0 0 15px 15px;">
		<div class="pop_table" style="overflow-x:hidden;">
		<table width="100%">
			<tr>
				<th>话题名称</th>
				<td><span class="must_red">*</span><input type="text" name="tag[name]" value="{{ $tag['tag_name'] }}" class="input length_5 input_hd"></td>
			</tr>
			<tr>
				<th>话题图片</th>
				<td>
					<div class="single_image_up"><a href="">重新选择</a><input name="icon" type="file" class="J_upload_preview"></div>

@if ($tag['tag_logo'])

					<img class="J_previewImg" style="max-width: 300px; " src="{{ App\Core\Tool::getPath($tag['tag_logo']) }}">
					<!--# } #-->
				</td>
			</tr>

@if ($categories)

			<tr>
				<th>话题分类</th>
				<td>
					<ul class="three_list cc">

@foreach($categories as $v)
$checkedHtml = ($tagCategories && isset($tagCategories[$v['category_id']])) ? ' checked' : '';
					#-->
						<li><label><input type="checkbox"{{ $checkedHtml }} value="{{ $v['category_id'] }}" name="tag[category][]">{{ $v['category_name'] }}</label></li>
					<!--# } #-->
					</ul>
				</td>
			</tr>
			<!--# } #-->
			<tr>
				<th>关联话题</th>
				<td><input type="text" name="tag[relate_tags]" value="{{ $relatedTags }}" class="input length_5"></td>
			</tr>
			<tr>
				<th>话题描述</th>
				<td><textarea name="tag[excerpt]" class="length_5">{{ $tag['excerpt'] }}</textarea></td>
			</tr>
			<tr>
				<th>title设置</th>
				<td><input type="text" name="tag[seo_title]" value="{{ $tag['seo_title'] }}" class="input length_5"></td>
			</tr>
			<tr>
				<th>description设置</th>
				<td><input type="text" name="tag[seo_description]" value="{{ $tag['seo_description'] }}" class="input length_5"></td>
			</tr>
			<tr>
				<th>keywords设置</th>
				<td><input type="text" name="tag[seo_keywords]" value="{{ $tag['seo_keywords'] }}" class="input length_5"></td>
			</tr>
		</table>
		</div>
	</div>
	<div class="pop_bottom">
		<button class="btn fr" id="J_dialog_close" type="button">取消</button>
		<button type="submit" class="btn btn_submit J_ajax_submit_btn mr10 fr">提交</button>
	</div>
	</form>

@include('admin.common.footer')
</body>
</html>