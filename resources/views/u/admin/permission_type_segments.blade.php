<hook-action name="input" args="pKey,pData">
	<input type="text" name="gpermission[{{ $pKey }}]" value="{{ $pData['default'] }}" class="input length_5 mr5">{{ $pData['config'][4] }}
</hook-action>

<hook-action name="radio" args="pKey,pData">
	<!--# 
		$style = ($pData['config'][5] && $pData['config'][5] == 'vertical') ? 'single_list' : 'switch_list';
		$items = $pData['config'][4];
		$items or $items = array(1 => '开启', 0 => '关闭');
	#-->
	<ul class="{{ $style }} cc">

@foreach ($items as $k => $v)

		<li class="{{ App\Core\Tool::isCurrent($pData['default'] == $k) }}"><label><input type="radio" name="gpermission[{{ $pKey }}]" value="{{ $k }}"{{ App\Core\Tool::ifcheck($pData['default'] == $k) }}><span>{{ $v }}</span></label></li>
	<!--# } #-->
	</ul>
</hook-action>

<hook-action name="checkbox" args="pKey,pData">
	<ul class="three_list cc">
	<!--# 
		$items = $pData['config'][4];
		foreach ($items as $k => $v) {
	#-->
		<li><label><input type="checkbox" name="gpermission[{{ $pKey }}][{{ $k }}]" value="1"{{ App\Core\Tool::ifcheck($pData['default'][$k]) }}><span>{{ $v }}</span></label></li>
	<!--# } #-->
	</ul>
</hook-action>