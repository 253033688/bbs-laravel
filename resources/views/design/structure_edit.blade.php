
<!--标题-->

<form id="J_design_tit_form"  action="{{ url('design/structure/doedit') }}" method="post">
	<div class="ct J_scroll_fixed">
		<div class="pop_cont">
			<div class="J_mod_title_cont">
				<dl class="cc">
					<dt>标题：</dt>
					<dd><textarea name="title" class="length_6" style="height:280px">{{ $title }}</textarea></dd>
				</dl>
				<div class="hr"></div>
			</div>
		</div>
	</div>
	<div class="pop_bottom">
		<button type="submit" class="btn btn_submit">提交</button>
		<input type="hidden" name="name" value="{{ $name }}">
		<input type="hidden" name="pageid" value="{{ $pageid }}">
	</div>
</form>