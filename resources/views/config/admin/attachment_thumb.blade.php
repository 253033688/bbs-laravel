<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">

<!-- start -->
<div class="nav">
	<ul class="cc">
		<li><a href="{{ url('/config/attachment/run') }}">附件设置</a></li>
		<li><a href="{{ url('/config/attachment/storage') }}">附件存储</a></li>
		<li class="current"><a href="{{ url('/config/attachment/thumb') }}">附件缩略</a></li>
		<!-- <li><a href="{{ url('/config/storage/run') }}">头像存储</a></li> -->
	</ul>
</div>

<form method="post" class="J_ajaxForm" action="{{ url('/config/attachment/dothumb') }}" data-role="list">
	<div class="h_a">缩略图设置</div>
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>帖子图片缩略设置</th>
				<td>
					<ul class="single_list cc">
						<li><label><input type="radio" checked="" value="0" name="thumb"{{ App\Core\Tool::ifcheck($config['thumb'] == 0) }}><span>不缩略</span></label></li>
						<li><label><input type="radio" value="1" name="thumb"{{ App\Core\Tool::ifcheck($config['thumb'] == 1) }}><span>等比缩略</span></label></li>
						<li><label><input type="radio" value="2" name="thumb"{{ App\Core\Tool::ifcheck($config['thumb'] == 2) }}><span>居中截取</span></label></li>
					</ul>
				</td>
				<td>
					<div class="fun_tips">
						等比缩略：最大的一边等比缩略，保留图片原本比例。<br>
						居中截取：最小的一边等比缩略后截取中间部分，可使界面丰满，一般用于设置好图片大小的界面。
					</div>
				</td>
			</tr>
			<tr>
				<th>缩略图大小设置[宽×高]</th>
				<td><input type="text" name="thumbsize_width" value="{{ $config['thumb.size.width'] }}" class="input length_2 mr5"><span class="mr10">像素</span><span class="mr10">-</span><input type="text" name="thumbsize_height" value="{{ $config['thumb.size.height'] }}" class="input mr5 length_2"><span>像素</span></td>
				<td><div class="fun_tips">超过此尺寸的图才缩略</div></td>
			</tr>
			<tr>
				<th>缩略图质量</th>
				<td><input name="quality" type="text" class="input length_4" value="{{ $config['thumb.quality'] }}"></td>
				<td><div class="fun_tips">控制缩略图的生成质量，数字越大越清晰，最高100，建议设置85</div></td>
			</tr>
			<tr>
				<th>缩略图预览</th>
				<td><input type="button" id="J_img_preview" value="图片缩略预览" class="btn" /></td>
				<td><div class="fun_tips"></div></td>
			</tr>
		</table>
	</div>
	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
		</div>
	</div>
</form>
<!-- end -->

</div>
@include('admin.common.footer')
<script>
$(function(){

	//引入组件
	Wind.use('dialog', 'ajaxForm', function(){
		//缩略图预览
		$('#J_img_preview').click(function(e){
			e.preventDefault();
			var $this = $(this);

			$('form.J_ajaxForm').ajaxSubmit({
				url         : '{{ url('/config/attachment/view') }}',
				dataType	: 'json',
				success		: function(data, statusText, xhr, $form) {
					if(data.state === "success") {
						Wind.dialog.html('<div style="padding:15px;"><img style="display:block;" src='+ data.data.img +' alt="缩略图预览"/></div><div class="pop_bottom tac"><button class="btn J_close" type="button">关闭</button></div>', {
							
							onClose : function(){
								$this.focus();
							}
						});
					}else{
						Wind.dialog.alert(data.message);
					}
				}
			});
		});
	});
});
</script>
</body>
</html>