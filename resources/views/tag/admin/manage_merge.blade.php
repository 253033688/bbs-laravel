<!doctype html>
<html>
<head>
@include('admin.common.head')
<style>
.pop_tag_hebing .tips_error{
	display:inline-block;
	width:230px;
	white-space: normal;
	overflow:hidden;
}
</style>
</head>
<body style="width:350px;background:#fff;">
<div id="J_merger_pop" class="body_none">
	<form class="J_ajaxForm" data-role="edit" action="{{ url('/tag/manage/domerge') }}" method="post" >
		<div class="" style="width:350px;background:#fff;">
			<div class="pop_tag_hebing">
				<div class="pop_cont">
					<p class="mb10">将 <span class="J_merger_name"></span></p>
					<p class="mb10">合并到：<input type="text" class="input length_4" name="tag_name"></p>
					<p class="gray">合并后，访问以上话题时会显示关联话题的内容</p>
				</div>
				<div class="pop_bottom cc">
					<input class="J_tag_id" type="hidden" name="tag_id" />
					<button type="submit" class="btn btn_submit J_ajax_submit_btn fr">提交</button>
				</div>
			</div>
		</div>
	</form>
</div>
@include('admin.common.footer')
<script>
$(function(){
	var merger_pop = $('#J_merger_pop'),
		checked = $(parent.document.body).find('input.J_check:checked'),
		name_arr = [],
		tid_arr = [];
		
		//console.log(checked);
		
		$.each(checked, function(i, o){
			var $this = $(this);
			name_arr.push('<span class="b green">'+ $(this).data('name') +'</span>');
			tid_arr.push($this.data('tid'));
		});
			
		merger_pop.find('.J_merger_name').html(name_arr.join('、'));
		merger_pop.find('input.J_tag_id').val(tid_arr.join(','));
	
});
</script>
</body>
</html>