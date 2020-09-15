<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">

	<div class="nav">
		<div class="return"><a href="{{ url('design/module/run?type=api') }}">返回上一级</a></div>
		<ul class="cc">
			<li class="current"><a href="{{ url('design/module/script?moduleid=' . $moduleid) }}">调用代码</a></li>
		</ul>
	</div>
	<div class="h_a">调用代码</div>
	<div class="prompt_text">
		<ol>
			<li>只有后台添加的“调用类型模块”才允许被站外调用，站内调用无限制; </li>
			<li>站外调用支持javascript,xml,json方式. </li>
		</ol>
	</div>
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<tr>
				<th>站内调用代码</th>
				<td><input type="text" id="J_module_copy1" class="input length_5 mr5" name="name" value="{{ $value }}"><a href="#" class="btn J_copy_clipboard" data-rel="J_module_copy1">复制</a></td>
			</tr>

			<tr>
				<th>站外调用代码javaScript</th>
				<td>
					<textarea class="length_5 mr5" id="J_module_copy2"><script type="text/javascript" src="{{ $apiUrl }}&format=script"></script></textarea>
					<a href="#" class="btn J_copy_clipboard" data-rel="J_module_copy2">复制</a>
				</td>
			</tr>
			<tr>
				<th>站外调用代码XML</th>
				<td>
					<textarea class="length_5 mr5" id="J_module_copy3">{{ $apiUrl }}&format=xml</textarea>
					<a href="#" class="btn J_copy_clipboard" data-rel="J_module_copy3">复制</a>
				</td>
			</tr>

			<tr>
				<th>站外调用代码JSON</th>
				<td>
					<textarea class="length_5 mr5" id="J_module_copy4">{{ $apiUrl }}&format=json</textarea>
					<a href="#" class="btn J_copy_clipboard" data-rel="J_module_copy4">复制</a>
				</td>
			</tr>
		</table>
	</div>

</div>
@include('admin.common.footer')
</body>
</html>