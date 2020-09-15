<!doctype html>
<html>
<head>

@if(!isset($error))

<meta http-equiv="refresh" content="1; url={{ url('appcenter/upgrade/db') }}" />
<!--# } #-->
@include('admin.common.head')
</head>
<body>
<div class="wrap">
	<div class="nav">
		<ul class="cc">
			<li class="current"><a href="{{ url('appcenter/upgrade/run') }}">版本升级</a></li>
			<li><a href="{{ url('appcenter/fixup/run') }}">安全中心</a></li>
		</ul>
	</div>
	<div class="nav cc">
		<ul class="stepstat">
			<li>1.获取待更新文件列表</li>
			<li>2.下载更新</li>
			<li>3.本地文件比对</li>
			<li class="current">4.正在升级数据库</li>
			<li>5.升级完成</li>
		</ul>
	</div>
	<div class="tips">
		<p>{{ $msg }}</p>

@if($error)

		<p><a href="{{ url('appcenter/upgrade/db') }}">继续升级</a></p>
		<!--# } #-->
	</div>
</div>
@include('admin.common.footer')
</body>
<script>

</script>
</html>