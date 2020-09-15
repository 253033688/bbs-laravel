<hook-action name="image" args='property,alias'>
	<dl class="cc">
	<dt>图片：</dt>
	<dd>
		<div class="mb10">
			<label class="mr20">
				<input class="J_coverfrom" data-role="web" type="radio" name="property[cover]" value="1" checked>网络图片
			</label>
			<label class="mr20">
				<input class="J_coverfrom" data-role="local" type="radio" name="property[cover]" value="2">本地上传
			</label>
		</div>
		<div id="J_coverfrom_web" class="J_coverfrom_items">
			<input type="text" class="input length_5" value="{{ $property['image'] }}" name="property[image]" >
				<p class="gray">以http://开头</p>
		</div>
		<div id="J_coverfrom_local" class="J_coverfrom_items" style="display:none;">
			<div class="single_image_up"><a href="">上传图片</a>
				<input data-preview="#J_protal_cover" name="upload" type="file">
			</div>
			<img src="" id="J_protal_cover" style="display:none;" width="80" height="80" >
		</div>
	</dd>
	</dl>
<script>
$(function(){
	/*
	 * 图片来源
	*/
		$('input.J_coverfrom').on('change', function(){
			var role = $(this).data('role');

			if(this.checked) {
				coverfrom(role);
			}
		});

		//载入判断项
		coverfrom($('input.J_coverfrom:checked').data('role'));

		function coverfrom(role){
			if(role) {
				$('#J_coverfrom_'+ role).show().siblings('.J_coverfrom_items').hide();
			}
		}
});
</script>
</hook-action>