<!--样式-->
		<form class="J_design_layout_form"  action="{{ url('design/structure/doeditstyle') }}" method="post">
			<div class="ct J_scroll_fixed">
				<div class="pop_cont">
					<span class="tips_icon">修改样式需要保存后才能看到实际效果。</span>
					<dl class="cc">
						<dt>展示效果：</dt>
						<dd>
						<select class="select_2 mr10" name="styleclass">

@foreach ($sysstyle as $k=>$v)

							<option value="{{ $v }}" {{ App\Core\Tool::isSelected($style['styleclass'] == $v) }}>{{ $k }}</option>
						<!--# } #-->
						</select>
							<!-- <span class="tips_icon">提交后才能看到实际效果。</span> -->
						</dd>
					</dl>
					<dl class="cc">
						<dt>普通文本：</dt>
						<dd>
						<select class="mr10" name="font[size]">
							<option value="">大小</option>

@foreach ($sysfontsize as $v)

							<option value="{{ $v }}" {{ App\Core\Tool::isSelected($style['font']['size'] == $v) }}>{{ $v }}px</option>
						<!--# } #-->
						</select>
						<span class="color_pick J_color_pick mr10"><em class="J_bg" style="
@if ($style['font']['color'])
background:{$style['font']['color']};<!--# } #-->"></em></span>
						<input class="J_hidden_color" name="font[color]" type="hidden" value="{{ $style['font']['color'] }}">
						<!-- <span class="tips_icon">所有样式恢复默认，保存后才能看到实际效果。</span> -->
						</dd>
					</dl>
					<dl class="cc">
						<dt>链接文本：</dt>
						<dd>
						<select class="mr10" name="link[size]">
							<option value="">大小</option>

@foreach ($sysfontsize as $v)

							<option value="{{ $v }}"{{ App\Core\Tool::isSelected($style['link']['size'] == $v) }}>{{ $v }}px</option>
						<!--# } #-->
						</select>
						<span class="color_pick J_color_pick mr10"><em class="J_bg" style="
@if ($style['link']['color'])
background:{$style['link']['color']};<!--# } #-->"></em></span>
						<input class="J_hidden_color" name="link[color]" type="hidden" value="{{ $style['link']['color'] }}">
						</dd>
					</dl>
					<dl class="cc">
					<!--#
						$differ = 'display:none';
						$both = '';
						if ($style['border']['top']['linewidth'] || $style['border']['right']['linewidth'] || $style['border']['bottom']['linewidth'] || $style['border']['left']['linewidth'] ) {
							$differ = '';
							$both = 'display:none';
						}
					#-->
						<dt>边框：</dt>
						<dd>
							<label style="float:right;margin:0 100px 0 0;"><input class="J_set_part" type="checkbox" name="border[isdiffer]" value="1" {{ App\Core\Tool::ifcheck(!$differ) }}>分别设置</label>
							<div style="{{ $both }}">
								<select class="mr10" name="border[linewidth]">
									<option value="" {{ App\Core\Tool::isSelected($style['border']['linewidth'] == '') }}>大小</option>

@foreach ($syslinewidth as $v)

									<option value="{{ $v }}" {{ App\Core\Tool::isSelected($style['border']['linewidth'] === $v) }}>{{ $v }}px</option>
								<!--# } #-->
								</select>
								<select class="mr10" name="border[style]">
									<option value="">样式</option>

@foreach ($sysborder as $k=>$v)

									<option value="{{ $k }}" {{ App\Core\Tool::isSelected($style['border']['style'] == $k) }}>{{ $v }}</option>
								<!--# } #-->
								</select>
								<span class="color_pick J_color_pick"><em class="J_bg" style="
@if ($style['border']['color'])
background:{$style['border']['color']};<!--# } #-->"></em></span>
								<input class="J_hidden_color" name="border[color]" type="hidden" value="{{ $style['border']['color'] }}">
							</div>
							<div style="{{ $differ }}">
								<div class="mb10">上：
									<select class="mr10" name="border[top][linewidth]">
										<option value="" {{ App\Core\Tool::isSelected($style['border']['top']['linewidth'] == '') }}>大小</option>

@foreach ($syslinewidth as $v)

										<option value="{{ $v }}" {{ App\Core\Tool::isSelected($style['border']['top']['linewidth'] === $v) }}>{{ $v }}px</option>
									<!--# } #-->
									</select>
									<select class="mr10" name="border[top][style]">
										<option value="">样式</option>

@foreach ($sysborder as $k=>$v)

										<option value="{{ $k }}" {{ App\Core\Tool::isSelected($style['border']['top']['style'] == $k) }}>{{ $v }}</option>
									<!--# } #-->
									</select>
									<span class="color_pick J_color_pick"><em class="J_bg" style="
@if ($style['border']['top']['color'])
background:{$style['border']['top']['color']};<!--# } #-->"></em></span>
									<input class="J_hidden_color" name="border[top][color]" type="hidden" value="{{ $style['border']['top']['color'] }}">
								</div>
								<div class="mb10">右：
									<select class="mr10" name="border[right][linewidth]">
										<option value="" {{ App\Core\Tool::isSelected($style['border']['right']['linewidth'] == '') }}>大小</option>

@foreach ($syslinewidth as $v)

										<option value="{{ $v }}" {{ App\Core\Tool::isSelected($style['border']['right']['linewidth'] === $v) }}>{{ $v }}px</option>
									<!--# } #-->
									</select>
									<select class="mr10" name="border[right][style]">
										<option value="">样式</option>

@foreach ($sysborder as $k=>$v)

										<option value="{{ $k }}" {{ App\Core\Tool::isSelected($style['border']['right']['style'] == $k) }}>{{ $v }}</option>
									<!--# } #-->
									</select>
									<span class="color_pick J_color_pick"><em class="J_bg" style="
@if ($style['border']['right']['color'])
background:{$style['border']['right']['color']};<!--# } #-->"></em></span>
									<input class="J_hidden_color" name="border[right][color]" type="hidden" value="{{ $style['border']['right']['color'] }}">
								</div>
								<div class="mb10">下：
									<select class="mr10" name="border[bottom][linewidth]">
										<option value="" {{ App\Core\Tool::isSelected($style['border']['bottom']['linewidth'] == '') }}>大小</option>

@foreach ($syslinewidth as $v)

										<option value="{{ $v }}" {{ App\Core\Tool::isSelected($style['border']['bottom']['linewidth'] === $v) }}>{{ $v }}px</option>
									<!--# } #-->
									</select>
									<select class="mr10" name="border[bottom][style]">
										<option value="">样式</option>

@foreach ($sysborder as $k=>$v)

										<option value="{{ $k }}" {{ App\Core\Tool::isSelected($style['border']['bottom']['style'] == $k) }}>{{ $v }}</option>
									<!--# } #-->
									</select>
									<span class="color_pick J_color_pick"><em class="J_bg"  style="
@if ($style['border']['bottom']['color'])
background:{$style['border']['bottom']['color']};<!--# } #-->"></em></span>
									<input class="J_hidden_color" name="border[bottom][color]" type="hidden" value="{{ $style['border']['bottom']['color'] }}">
								</div>
								<div class="mb10">左：
									<select class="mr10" name="border[left][linewidth]">
										<option value="" {{ App\Core\Tool::isSelected($style['border']['left']['linewidth'] == '') }}>大小</option>

@foreach ($syslinewidth as $v)

										<option value="{{ $v }}" {{ App\Core\Tool::isSelected($style['border']['left']['linewidth'] === $v) }}>{{ $v }}px</option>
									<!--# } #-->
									</select>
									<select class="mr10" name="border[left][style]">
										<option value="">样式</option>

@foreach ($sysborder as $k=>$v)

										<option value="{{ $k }}" {{ App\Core\Tool::isSelected($style['border']['left']['style'] == $k) }}>{{ $v }}</option>
									<!--# } #-->
									</select>
									<span class="color_pick J_color_pick"><em class="J_bg"  style="
@if ($style['border']['left']['color'])
background:{$style['border']['left']['color']};<!--# } #-->"></em></span>
									<input class="J_hidden_color" name="border[left][color]" type="hidden" value="{{ $style['border']['left']['color'] }}">
								</div>
							</div>
						</dd>
					</dl>
					<dl class="cc">
					<!--#
						$differ = 'display:none';
						$both = '';
						if ($style['margin']['top'] || $style['margin']['right'] || $style['margin']['bottom'] || $style['margin']['left'] ) {
							$differ = '';
							$both = 'display:none';
						}
					#-->
						<dt>外边距：</dt>
						<dd>
							<label style="float:right;margin:0 100px 0 0;"><input class="J_set_part" type="checkbox"  name="margin[isdiffer]" value="1" {{ App\Core\Tool::ifcheck(!$differ) }}>分别设置</label>
							<div style="{{ $both }}"><input type="text" class="input length_1 mr5" name="margin[both]" value="{{ $style['margin']['both'] }}">像素</div>
							<div style="{{ $differ }}">
								<div class="mb10">
								<span class="mr20">上：<input type="text" class="input length_1 mr5" name="margin[top]" value="{{ $style['margin']['top'] }}">像素</span>
								<span class="mr20">右：<input type="text" class="input length_1 mr5" name="margin[right]" value="{{ $style['margin']['right'] }}">像素</span></div>
								<div class="mb10">
								<span class="mr20">下：<input type="text" class="input length_1 mr5" name="margin[bottom]" value="{{ $style['margin']['bottom'] }}">像素</span>
								<span class="mr20">左：<input type="text" class="input length_1 mr5" name="margin[left]" value="{{ $style['margin']['left'] }}">像素</span></div>
							</div>
						</dd>
					</dl>
					<dl class="cc">
					<!--#
						$differ = 'display:none';
						$both = '';
						if ($style['padding']['top'] || $style['padding']['right'] || $style['padding']['bottom'] || $style['padding']['left'] ) {
							$differ = '';
							$both = 'display:none';
						}
					#-->
						<dt>内边距：</dt>
						<dd>
							<label style="float:right;margin:0 100px 0 0;"><input class="J_set_part" type="checkbox"  name="padding[isdiffer]" value="1" {{ App\Core\Tool::ifcheck(!$differ) }}>分别设置</label>
							<div style="{{ $both }}"><input type="text" class="input length_1 mr5" name="padding[both]" value="{{ $style['padding']['both'] }}">像素</div>
							<div style="{{ $differ }}">
								<div class="mb10">
								<span class="mr20">上：<input type="text" class="input length_1 mr5" name="padding[top]" value="{{ $style['padding']['top'] }}">像素</span>
								<span class="mr20">右：<input type="text" class="input length_1 mr5" name="padding[right]" value="{{ $style['padding']['right'] }}">像素</span></div>
								<div class="mb10">
								<span class="mr20">下：<input type="text" class="input length_1 mr5" name="padding[bottom]" value="{{ $style['padding']['bottom'] }}">像素</span>
								<span class="mr20">左：<input type="text" class="input length_1 mr5" name="padding[left]" value="{{ $style['padding']['left'] }}">像素</span></div>
							</div>
						</dd>
					</dl>
					<dl class="cc">
						<dt>背景图片：</dt>
						<dd>
							<input type="text" class="input length_5 mr5" value="{{ $style['background']['image'] }}" placeholder="http://"  name="background[image]">
							<select class="mr20" name="background[position]">
								<option value="">自动</option>
								<option value="repeat" {{ App\Core\Tool::isSelected($style['background']['position'] == 'repeat') }}>平铺</option>
								<option value="left" {{ App\Core\Tool::isSelected($style['background']['position'] == 'left') }}>居左</option>
								<option value="center" {{ App\Core\Tool::isSelected($style['background']['position'] == 'center') }}>居中</option>
								<option value="right" {{ App\Core\Tool::isSelected($style['background']['position'] == 'right') }}>居右</option>
							</select>
							<p class="gray">以http://开头</p>
						</dd>
					</dl>
					<dl class="cc">
						<dt>背景颜色：</dt>
						<dd>
							<span class="color_pick J_color_pick"><em class="J_bg"  style="
@if ($style['background']['color'])
background:{$style['background']['color']};<!--# } #-->"></em></span>
							<input class="J_hidden_color mr10" name="background[color]" type="hidden" value="{{ $style['background']['color'] }}">
						</dd>
					</dl>
				</div>
			</div>
			<div class="pop_bottom">
				<button type="submit" class="btn btn_submit">提交</button>
				<input type="hidden" name="name" value="{{ $name }}">
				<input type="hidden" name="pageid" value="{{ $pageid }}">
			</div>
			</form>