<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body style="width:450px" class="body_none">
	<form class="J_ajaxForm" action="{{ url('tag/manage/doadd?_json=1') }}" method="post">
	<div style="padding:0 0 15px 15px;">
		<div class="pop_table" style="overflow-x:hidden;">
			<table width="100%">
				<tr>
					<th>话题名称</th>
					<td><span class="must_red">*</span><input type="text" name="tag[name]" class="input length_5 input_hd"></td>
				</tr>
				<tr>
					<th>话题图片</th>
					<td>
						<div class="single_image_up"><a href="">上传图片</a><input name="icon" type="file" class="J_upload_preview"></div>
					</td>
				</tr>

@if ($categories)

				<tr>
					<th>话题分类</th>
					<td>
						<ul class="three_list cc">

@foreach($categories as $v)

							<li><label><input type="checkbox" value="{{ $v['category_id'] }}" name="tag[category][]">{{ $v['category_name'] }}</label></li>
						<!--# } #-->
						</ul>
					</td>
				</tr>
				<!--# } #-->
				<tr>
					<th>关联话题</th>
					<td><input type="text" name="tag[relate_tags]" class="input length_5"></td>
				</tr>
				<tr>
					<th>话题描述</th>
					<td><textarea name="tag[excerpt]" class="length_5"></textarea></td>
				</tr>
				<tr>
					<th>title设置</th>
					<td><input type="text" name="tag[seo_title]" class="input length_5"></td>
				</tr>
				<tr>
					<th>description设置</th>
					<td><input type="text" name="tag[seo_description]" class="input length_5"></td>
				</tr>
				<tr>
					<th>keywords设置</th>
					<td><input type="text" name="tag[seo_keywords]" class="input length_5"></td>
				</tr>
			</table>
		</div>
	</div>
	<div class="pop_bottom">
		<button class="btn fr" id="J_dialog_close" type="button">取消</button>
		<button type="submit" class="btn btn_submit J_ajax_submit_btn fr mr10">提交</button>
	</div>
	</form>
@include('admin.common.footer')
</body>
</html>