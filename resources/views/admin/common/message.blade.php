<!doctype html>
<html>
<head>
@include('common.head')

@if ($referer && $refresh)

<meta http-equiv="refresh" content="2;url={{ $referer }}">
<!--# } #-->
</head>
<body>
<div class="wrap">
	<div id="error_tips">
		<h2>信息提示</h2>
		<div class="error_cont">
			<ul>

@foreach ($message as $value)
if(!WIND_DEBUG)
						$value = str_replace(Wind::getRootPath(Wind::getAppName()), '~/', $value);#-->
				<li>{{ $value }}</li>
				<!--# } #-->
			</ul>

@if($referer)

			<div class="error_return"><a href="{{ $referer }}" class="btn">返回</a></div>

@else

			<div class="error_return"><a href="javascript:window.history.go(-1);" class="btn">返回</a></div>
			<!--# } #-->
		</div>
	</div>
</div>
{{--  @include('common.footer') --}}
</body>
</html>