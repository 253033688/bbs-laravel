<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">

<div class="h_a">功能说明</div>
<div class="prompt_text">
	<ul>
		<li>可以为每个应用设置二级域名，根域名需和站点地址中的设置保持一致。</li>
		<li>如果应用的不同页面还需要分配子域名，则勾选“子域名”，并设置根域名。然后在具体应用的频道设置中设置子域名。根域名可以重复，根域名请不要频繁修改。
	    比如要设置版块的应用域名，开启子域名，设置根域名为空，则版块的域名形如food.phpwind.net；
	    如果设置根域名为bbs，则版块的域名形如food.bbs.phpwind.net</li>
	    <li class="red">不建议频繁更改根域名</li>
	    <li class="red">设置完二级域名后，建议重新提交下后台<a class="J_linkframe_trigger" href="{{ url('nav/nav/run') }}">导航</a>，防止跨子域失败。</li>
	</ul>
</div>
<form method="post" class="J_ajaxForm" action="{{ url('rewrite/domain/doModify') }}">

@if($root)

<div class="h_a">应用域名设置</div>
<div class="table_purview mb10">
	<table width="100%">
		<tr class="hd">
			<th width="160">应用名称</th>
			<td width="220">应用域名</td>
			<td width="90">开启子域名</td>
			<td width="220">根域名</td>
			<td></td>
		</tr>

@foreach($addons as $k => $v)

			<tr>
				<th>{{ $v[0] }}</th>
				<td><input name="app[{{ $k }}]" type="text" value="{{ $v[2] }}" class="input length_1" >&nbsp;{{ $root }}</td>

@if($v[1])
$pre_root = trim(str_replace(substr($root, 1), '', $domain[$k.'.root']), '.'); #-->
				<td><input name="domain[{{ $k }}][isopen]" value="1" type="checkbox" {{ App\Core\Tool::ifcheck($domain[$k.'.isopen']) }}></td>
				<td><input name="domain[{{ $k }}][root]" type="text" value="{{ $pre_root }}" class="input length_1" >&nbsp;{{ $root }}</td>
				<td></td>

@else

				<td>无</td>
				<td>不需设置</td>
				<td></td>
				<!--# } #-->
			</tr>
			<!--# } #-->
	</table>
</div>

@else

		<div class="not_content_mini"><i></i>要开启个性域名，需先&nbsp;<a class="J_linkframe_trigger" href="{{ url('config/config/site') }}">设置cookie作用域</a></div>
		<!--# } #-->

<div class="h_a">保留二级域名</div>
<div class="table_full">
	<table width="100%">
		<tr>
			<th width="160">保留二级域名</th>
			<td width="320"><textarea class="length_5" name="domain_hold">{{ $domain['domain.hold'] }}</textarea></td>
			<td>
			<span>
			开启了类似空间应用的子域名功能后，
			保留二级域名可以控制用户不能使用设置的关键词作为二级域名，可以通过“*”模糊匹配。
			多个词之间用英文半角逗号","分隔
			</span>
			</td>
		</tr>
	</table>
</div>
<div class="btn_wrap">
	<div class="btn_wrap_pd">
		<button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
	</div>
</div>
</form>
</div>
@include('admin.common.footer')
</body>
</html>
