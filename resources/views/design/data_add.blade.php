<!--添加内容-->
<form action="{{ url('design/data/doadd?_json=1') }}" method="post">
	<div class="ct J_scroll_fixed">
		<div class="pop_cont">
			<dl class="cc">
				<dt>顺序：</dt>
				<dd>
				<select class="select_1 mr20" name="vieworder">
					<option value="0">自动</option>
				<!--# for($i=1; $i <= $limit; $i++){ #-->
					<option value="{{ $i }}">{{ $i }}</option>
				<!--# } #-->
				</select>
				<span>设置指定位置后，则自动固定显示此内容</span>
				</dd>
			</dl>
			<dl class="cc">
				<dt>{{ $allSign[$sTitle] }}：</dt>
				<dd><span class="must_red">*</span>
					<div class="mb10"><input type="text" class="input length_5" name="data[{{ $sTitle }}]" value=""></div>
					<div class="color_pick_dom J_design_font_config">
					<div class="case J_case"><p>字体预览</p><p>ABCD</p></div>
						<ul>
							<li><label><input class="J_bold" data-class="b" name="bold" type="checkbox" value="1">粗体</label></li>
							<li><label><input class="J_underline" data-class="u" name="underline" type="checkbox" value="1">下划线</label></li>
							<li class="none"><label><input class="J_italic" data-class="i" name="italic" value="1" type="checkbox">斜体</label></li>
						</ul>
						<span class="color_pick J_design_color_pick"><em class="J_bg"></em></span>
						<input class="J_hidden_color" name="color" type="hidden">
					</div>
				</dd>
			</dl>


@if ($intro)

			<dl class="cc">
				<dt>{{ $intro['name'] }}：</dt>
				<dd>
					<textarea name="data[{{ $intro['key'] }}]" class="length_6">{{ $intro['data'] }}</textarea>
				</dd>
			</dl>
			<!--# } #-->


@foreach ($threeSign as $v)

			<dl class="cc">
				<dt>{{ $allSign[$v['sign']] }}：</dt>
				<dd>
					<div class="single_image_up"><a href="javascript:;">上传图片</a><input data-preview="#J_preview_{{ $v['sign'] }}" name="{{ $v['sign'] }}" type="file" class="J_upload_preview"></div>
					<div><img id="J_preview_{{ $v['sign'] }}"  src="" width="80" height="80" style="display:none;" /></div>
					<span>大小：宽:{$v['width']}px 高:{$v['height']}px<!--0为无限制--></span>
					<input type="hidden"  name="images[{{ $v['sign'] }}]" value="">
				</dd>
			</dl>
			<!--# } #-->


@foreach ($twoSign as $v)

			<dl class="cc">
				<dt>{{ $allSign[$v] }}：</dt>
				<dd><input type="text" class="input length_6" name="data[{{ $v }}]" value=""></dd>
			</dl>
			<!--# } #-->


@foreach ($oneSign as $v)

			<dl class="cc">
				<dt>{{ $allSign[$v] }}：</dt>
				<dd><input type="text" class="input length_6" name="data[{{ $v }}]" value=""></dd>
			</dl>
			<!--# } #-->
			<dl class="cc">
				<dt>开始时间：</dt>
				<dd><input type="text" class="input length_2 J_design_date" name="start_time" value="">
					<span>为空表示立即显示</span>
				</dd>
			</dl>
			<dl class="cc">
				<dt>结束时间：</dt>
				<dd><input type="text" class="input length_2 J_design_date" name="end_time" value="">
					<span>为空表示不更新</span>
				</dd>
			</dl>
		</div>
	</div>
	<div class="pop_bottom">
		<button type="submit" class="btn btn_submit J_module_sub" data-update="all">提交</button>
		<input type="hidden" name="moduleid" value="{{ $moduleid }}">
	</div>
</form>