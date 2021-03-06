<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">
	<div class="nav">
		<div class="return">
		<a href="{{ url('appcenter/app/run') }}">返回上一级</a>
		</div>
		<ul class="cc">
			<li><a href="{{ url('appcenter/develop/edit?alias=' . $app['alias']) }}">设置</a></li>
		<li><a href="{{ url('appcenter/develop/edithook?alias=' . $app['alias']) }}">hook</a></li>
		<li class="current"><a href="{{ url('appcenter/develop/editxml?alias=' . $app['alias']) }}">xml</a></li>
		</ul>
	</div>
<div class="h_a">提示信息</div>
	<div class="prompt_text">
		<ul>
			<li>该功能仅供应用开发者使用，通过创建应用可以生成一个最简单的demo。开发者可以基于这个demo继续开发。</li>
			<li>应用开发文档请参考《云平台文档中心》，有疑问请至phpwind官方论坛开发者论坛交流。</li>
			<li>在应用开发之前，请先在phpwind云平台创建应用，获取“应用标识”。</li>
		</ul>
	</div>

<form class="J_ajaxForm" method="post" action="{{ url('appcenter/develop/doEditXml') }}">
<div class="h_a">配置文件Manifest.xml</div>
<div class="p10">
<input type="hidden" name="alias" value="{{ $app['alias'] }}">
<textarea name="xml" style="width:700px;height:500px">{{ $manifest }}</textarea>
</div>

<div class="btn_wrap">
	<div class="btn_wrap_pd">
		<button class="btn btn_submit J_ajax_submit_btn" type="submit">提交</button>
	</div>
</div>
</form>
@include('admin.common.footer')
</div>

</body>
</html>