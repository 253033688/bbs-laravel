<form  action="{{ url('design/data/batchCheckPush') }}" method="post">
<div class="ct J_scroll_fixed">
	@include('design.segment.data_push')
</div>
<div class="pop_bottom">
	<button type="submit" class="btn btn_submit J_module_sub" data-update="all">通过</button>
	<button type="button" class="btn J_module_sub" data-update="pop" data-action="{{ url('design/data/batchDelPush') }}">拒绝</button>
	<input type="hidden" name="moduleid" value="{{ $moduleid }}">
</div>
</form>