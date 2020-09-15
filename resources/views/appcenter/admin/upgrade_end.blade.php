<!doctype html>
<html>
<head>
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
	<li>4.正在升级数据库</li>
	<li class="current">5.升级完成</li>
	</ul>
	</div>
	<div class="tips">
	<p>恭喜你，升级成功！</p>
	<p>您当前的版本为：{{ $systeminfo }}</p>
	<p>为安全起见，升级文件已保存至{$upgrade}目录</p>
	<p>备份文件已保存至{$back}目录</p>
	</div>
</div>
@include('admin.common.footer')
</body>
<script>

</script>
</html>