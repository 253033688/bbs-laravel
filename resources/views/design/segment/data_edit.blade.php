
<dl class="cc">
	<dt>{{ $allSign[$sTitle] }}：</dt>
	<dd><span class="must_red">*</span>
		<div class="mb10"><input type="text" class="input length_5" name="data[{{ $sTitle }}]" value="{{ $data['title'] }}"></div>
		<div class="color_pick_dom J_design_font_config">
		<div class="case J_case"><p>字体预览</p><p>ABCD</p></div>
			<ul>
				<li><label><input class="J_bold" data-class="b" name="bold" type="checkbox" value="1"{{ App\Core\Tool:: ifcheck($data['bold']) }}>粗体</label></li>
				<li><label><input class="J_underline" data-class="u" name="underline" type="checkbox" value="1"{{ App\Core\Tool:: ifcheck($data['underline']) }}>下划线</label></li>
				<li class="none"><label><input class="J_italic" data-class="i" name="italic" value="1" type="checkbox"{{ App\Core\Tool:: ifcheck($data['italic']) }}>斜体</label></li>
			</ul>
			<span class="color_pick J_design_color_pick"><em class="J_bg" style="
@if ($data['color'])
background:{$data['color']};<!--# } #-->"></em></span>
			<input class="J_hidden_color" name="color" type="hidden" value="{{ $data['color'] }}">
		</div>
		<!--component tpl='TPL:common.widgets.font' args='$data'/>-->
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
$display = 'display:none;';
	if ($data['extend_info'][$v['sign']]){
		$display = '';
	}
#-->
<dl class="cc">
	<dt>{{ $allSign[$v['sign']] }}：</dt>
	<dd>
		<div class="single_image_up"><a href="javascript:;">上传图片</a><input data-preview="#J_preview_{{ $v['sign'] }}" name="{{ $v['sign'] }}" type="file"></div>
		<div><img id="J_preview_{{ $v['sign'] }}"  src="{{ $data['extend_info'][$v['sign']] }}" width="80" height="80" style="{{ $display }}" /></div>
		<span>大小：宽:{$v['width']}px 高:{$v['height']}px<!--0为无限制--></span>
		<input type="hidden"  name="images[{{ $v['sign'] }}]" value="{{ $data['extend_info'][$v['sign']] }}">
	</dd>
</dl>
<!--# } #-->


@foreach ($twoSign as $v)

<dl class="cc">
	<dt>{{ $allSign[$v] }}：</dt>
	<dd><input type="text" class="input length_6" name="data[{{ $v }}]" value="{{ $data['extend_info'][$v] }}"></dd>
</dl>
<!--# } #-->


@foreach ($oneSign as $v)

<dl class="cc">
	<dt>{{ $allSign[$v] }}：</dt>
	<dd><input type="text" class="input length_6" name="data[{{ $v }}]" value="{{ $data['extend_info'][$v] }}"></dd>
</dl>
<!--# } #-->

<dl class="cc">
	<dt>开始时间：</dt>
	<dd><input type="text" class="input length_2 J_design_date" name="start_time" value="{{ App\Core\Tool::time2str($data['start_time'], 'Y-m-d H:i') }}">
		<span>为空表示立即显示</span>
	</dd>
</dl>

<dl class="cc">
	<dt>结束时间：</dt>
	<dd><input type="text" class="input length_2 J_design_date" name="end_time" value="{{ App\Core\Tool::time2str($data['end_time'], 'Y-m-d H:i') }}">
		<span>为空表示不更新</span>
	</dd>
</dl>