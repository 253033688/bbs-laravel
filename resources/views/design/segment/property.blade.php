
		<dl class="cc">
			<dt>模块名称：</dt>
			<dd><span class="must_red">*</span><input type="text"  class="input length_5" name="module_name" value="{{ $module['module_name'] }}"></dd>
		</dl>

@foreach($property AS $k=>$v)
$v3t = 'array';
		if (!empty($v[3]) && !is_array($v[3])){
			list($v3, $v3t) = explode('|',$v[3]);
			$v[3] = $decorator[$v3];
		 }
	#-->

@if($v[0] == 'text')

		<dl class="cc">
			<dt>{{ $v[1] }}：</dt>
			<!--# 
			$cls='length_1';
			if($v[4] == 'long'){ 
				$cls='length_5';
			}
			#-->

@if($v3t == 'html' && !$vProperty[$k])

			<dd><input type="text" class="input {$cls} mr10"  name="property[{{ $k }}]" value="{{ $vProperty[$k] }}">

@if ($cls=='length_5')

					<p class="gray">{{ $v[2] }}</p>

@else

					<span class="gray">{{ $v[2] }}</span>
				<!--# } #-->
			</dd>

@else

			<dd><input type="text" class="input {$cls} mr10"  name="property[{{ $k }}]" value="{{ $vProperty[$k] }}">

@if ($cls=='length_5')

					<p class="gray">{{ $v[2] }}</p>

@else

					<span class="gray">{{ $v[2] }}</span>
				<!--# } #-->
			</dd>
			<!--# } #-->	
		</dl>
	<!--# } #-->
	

@if($v[0] == 'select')

		<dl class="cc">
			<dt>{{ $v[1] }}：</dt>
			<dd>

@if($v[4] == 'multiple')

				<select class="select_5 mr10" name="property[{{ $k }}][]" size="8"{{ $v[4] }}>

@else

				<select class="select_5 mr10" name="property[{{ $k }}]">
				<!--# } #-->	

@if($v3t == 'html')

					{!! $v[3] !!}

@else


@foreach((array)$v[3] AS $_k=>$_v)

					<option value="{{ $_k }}" {{ App\Core\Tool::isSelected($vProperty[$k] == $_k) }}>{{ $_v }}</option>
					<!--# } #-->
				<!--# } #-->	
				</select>
				<span class="gray">{{ $v[2] }}</span>
			</dd>
		</dl>
	<!--# } #-->
	

@if($v[0] == 'radio')

		<dl class="cc">
			<dt>{{ $v[1] }}：</dt>
			<dd>
				<ul class="three_list">

@if($v3t == 'array')


@foreach((array)$v[3] AS $_k=>$_v)

					<li><label class="mr20"><input type="radio" value="{{ $_k }}" name="property[{{ $k }}]"  {{ App\Core\Tool::ifcheck($vProperty[$k] == $_k) }}><span>{{ $_v }}</span></label></li>
					<!--# } #-->

@else

					{!! $v[3] !!}
				<!--# } #-->	
				</ul>
				<span class="gray">{{ $v[2] }}</span>
			</dd>
		</dl>
	<!--# } #-->


@if($v[0] == 'checkbox')

		<dl class="cc">
			<dt>{{ $v[1] }}：</dt>
			<dd>
				<ul class="three_list">

@if($v3t == 'array')


@foreach((array)$v[3] AS $_k=>$_v)

					<li><label class="mr20"><input type="checkbox" value="{{ $_k }}" name="property[{{ $k }}][]" {{ App\Core\Tool::ifcheck(App\Core\Tool::inArray($_k,(array)$vProperty[$k])) }}><span>{{ $_v }}</span></label></li>
					<!--# } #-->

@else

					{!! $v[3] !!}
				<!--# } #-->	
				</ul>
				<span class="gray">{{ $v[2] }}</span>
			</dd>
		</dl>
	<!--# } #-->


@if($v[0] == 'textarea')

		<dl class="cc">
			<dt>{{ $v[1] }}：</dt>
			<dd>

@if($v3t == 'html' && !$vProperty[$k])

				<textarea class="length_6 mb5" style="width:450px;height:230px;"  name="property[{{ $k }}]">{{ $v[3] }}</textarea><p class="gray">{{ $v[2] }}</p>

@else

				<textarea class="length_6 mb5" style="width:450px;height:230px;" name="property[{{ $k }}]">{{ $vProperty[$k] }}</textarea><p class="gray">{{ $v[2] }}</p>
			<!--# } #-->
			</dd>
		</dl>
	<!--# } #-->


@if($v[0] == 'html')
list($tpl,$name) = explode('|', $v[4]);
	#-->
		{{-- <segment alias='$tpl' tpl="TPL:design.property.$tpl" args='$vProperty, $v[3]' name="$name" /> --}}
	<!--# } #-->

	<!--# } #-->
	



@if($modelInfo['refresh'])

		<dl class="cc">
			<dt>数据更新周期：</dt>
			<dd><input type="text" class="input length_1 mr5" name="cache[expired]" value="{{ $cache['expired'] }}"><span class="mr20">分钟</span><span class="gray">0代表不更新</span></dd>
		</dl>
		<dl class="cc">
			<dt>数据更新区间：</dt>
			<dd>
				<div class="mb10">开始于&nbsp;
				<input type="text" class="input length_1 mr5" name="cache[start_hour]" value="{{ $cache['start_hour'] }}"><span class="mr20">时</span>
				<input type="text" class="input length_1 mr5" name="cache[start_minute]" value="{{ $cache['start_minute'] }}"><span>分</span></div>
				<div class="mb10">结束于&nbsp;
				<input type="text" class="input length_1 mr5" name="cache[end_hour]" value="{{ $cache['end_hour'] }}"><span class="mr20">时</span>
				<input type="text" class="input length_1 mr5" name="cache[end_minute]" value="{{ $cache['end_minute'] }}"><span>分</span></div>
			</dd>
		</dl>
	<!--# } #-->
