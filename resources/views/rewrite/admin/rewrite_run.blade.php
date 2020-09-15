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
		<li>此功能把站点的URL转换成静态链接的方式，更容易被搜索引擎收录。</li>
		<li><span class="red">开启伪静态功能后，需要开启服务器的rewrite模块</span></li>
		<li>url格式尽量加些特殊前缀以及连接符(例如.*-等)作为唯一标识，否则url容易冲突造成混乱。</li>
		<li>当格式中含有/时，需要把导航地址都设为绝对地址，否则会引起根目录混乱。</li>
		<li>如果url格式中包含{fname}参数，则必须在<a class="J_linkframe_trigger" href="{{ url('bbs/setforum/run') }}">【版块编辑】</a>中设置版块的个性域名后才能正常访问。</li>
	</ul>
</div>
<form method="post" class="J_ajaxForm" action="{{ url('rewrite/rewrite/doModify') }}">
<div class="h_a">URL伪静态设置</div>
<div class="table_purview mb10">
<table width="100%" class="J_check_wrap">
		<tr class="hd">
			<th width="160">页面</th>
			<td width="200">可用url参数</td>
			<td width="260">url格式</td>
			<td><label><input name="" class="J_check_all" data-checklist="J_check_rewrite" data-direction="y" type="checkbox" value="">全选</label></td>
		</tr>

@foreach($addons as $k => $v)

		<tr>
			<th>{{ $v[0] }}</th>
			<td>{{ $v[1] }}</td>
			<td>

@if($k == 'default')

				m-c-a

@else
$format = empty($rewrite["format.$k"]) ? $v[3] : $rewrite["format.$k"];
			 #-->
				<input name="format[{{ $k }}]" type="text" value='{{ $format }}' class="input length_4">
			<!--# } #-->
			</td>
			<td><input name="isopen[{{ $k }}]" type="checkbox" value="1" class="J_check" data-yid="J_check_rewrite" {{ App\Core\Tool::ifcheck($rewrite["isopen.$k"]) }}>
			</td>
		</tr>
		<!--# } #-->
	</table>
</div>
<div class="h_a">使用方法</div>
<div class="prompt_text">
	<div class="red mb20">首先需要确定服务器支持rewrite模块并开启了</div>
	<h3 class="mb10">Apache Web Server 配置</h3>
	<div class="mb20">在www目录下自带了.htaccess文件，开启了rewrite后可直接使用，更改了格式后也无需更改这个文件内容。</div>
	<h3 class="mb10">IIS配置</h3>
	<div class="mb20">iis下建议使用isapi_rewrite 第三版,老版本的rewrite不支持RewriteCond语法。 
	下载地址 http://www.helicontech.com/download-isapi_rewrite3.htm 

<pre>
RewriteBase /
RewriteCond %{REQUEST_FILENAME} !-f 
RewriteCond %{REQUEST_FILENAME} !-d 
RewriteRule !\.(js|ico|gif|jpe?g|bmp|png|css)$ index.php [L] 
</pre>
管理工具-> internet信息服务-> 网站 点右键. -> 属性 ISAPI筛选器 看到下面那个ISAPI_Rewrite3了吧。 转到 rewrite的选项卡 可以看到里面的rewrite规则 
	</div>
	<h3 class="mb10">Nginx配置</h3>
	<p>
	
<pre>
location / { 
    if (-f $request_filename) {
           break;
    }
    if ($request_filename ~* "\.(js|ico|gif|jpe?g|bmp|png|css)$") {
        break;
    }
    if (!-e $request_filename) {
        rewrite . /index.php last;
    }
} 
</pre>
	</p>
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
