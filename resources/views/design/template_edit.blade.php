<!--模块模板-->
		<form action="{{ url('design/template/doedit') }}" method="post">
			@include('design.segment.component')
			<div class="pop_bottom">
				<button type="submit" class="btn btn_submit J_module_sub" data-update="mod">提交</button>
				<button class="btn J_module_apply" type="submit">应用</button>
				<input type="hidden" name="moduleid" value="{{ $moduleid }}">
			</div>
			</form>
	<!--结束-->