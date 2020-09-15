<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">

<!-- start -->
<div class="nav">
	<ul class="cc">
		<li class="current"><a href="{{ url('/config/editor/run') }}">基本设置</a></li>
	</ul>
</div>

<form method="post" class="J_ajaxForm" action="{{ url('/config/editor/dorun') }}" data-role="list">
	<div class="h_a">功能设置</div>
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>布局样式</th>
				<td>
					<ul class="switch_list cc">
						<li><label><input name="style" value="0" type="radio" {{ App\Core\Tool::ifcheck($config['editor.style']==0) }}><span>高级</span></label></li>
						<li><label><input name="style" value="1" type="radio" {{ App\Core\Tool::ifcheck($config['editor.style']==1) }}><span>简单</span></label></li>
					</ul>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>内容重复验证</th>
				<td>
					<ul class="switch_list cc">
						<li><label><input name="content_duplicate" value="1" type="radio" {{ App\Core\Tool::ifcheck($config['content.duplicate']==1) }}><span>开启</span></label></li>
						<li><label><input name="content_duplicate" value="0" type="radio" {{ App\Core\Tool::ifcheck($config['content.duplicate']==0) }}><span>关闭</span></label></li>
					</ul>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
		</table>
	</div>

	<div class="h_a">标签设置</div>
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>帖子中标签转换控制</th>
				<td>
					<input name="cvtimes" type="text" class="input length_3" value="{{ $config['ubb.cvtimes'] }}">
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>[img]标签</th>
				<td>
					<ul class="switch_list cc">
						<li><label><input name="img_open" value="1" type="radio" {{ App\Core\Tool::ifcheck($config['ubb.img.open']==1) }}><span>开启</span></label></li>
						<li><label><input name="img_open" value="0" type="radio" {{ App\Core\Tool::ifcheck($config['ubb.img.open']==0) }}><span>关闭</span></label></li>
					</ul>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>[img]大小控制</th>
				<td>
					<div class="mb10">宽:&nbsp;<input name="img_width" type="number" class="input length_2 mr5" value="{{ $config['ubb.img.width'] }}">像素</div>
					<div>高:&nbsp;<input name="img_height" type="number" class="input length_2 mr5" value="{{ $config['ubb.img.height'] }}">像素</div>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>[size]标签最大值控制</th>
				<td>
					<input name="size_max" type="text" class="input length_3" value="{{ $config['ubb.size.max'] }}">
				</td>
				<td><div class="fun_tips">建议取值：5~7，留空不限制</div></td>
			</tr>
			<tr>
				<th>[flash]标签</th>
				<td>
					<ul class="switch_list cc">
						<li><label><input name="flash_open" value="1" type="radio" {{ App\Core\Tool::ifcheck($config['ubb.flash.open']==1) }}><span>开启</span></label></li>
						<li><label><input name="flash_open" value="0" type="radio" {{ App\Core\Tool::ifcheck($config['ubb.flash.open']==0) }}><span>关闭</span></label></li>
					</ul>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>多媒体标签</th>
				<td>
					<ul class="switch_list cc">
						<li><label><input name="media_open" value="1" type="radio" {{ App\Core\Tool::ifcheck($config['ubb.media.open']==1) }}><span>开启</span></label></li>
						<li><label><input name="media_open" value="0" type="radio" {{ App\Core\Tool::ifcheck($config['ubb.media.open']==0) }}><span>关闭</span></label></li>
					</ul>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>[iframe]标签</th>
				<td>
					<ul class="switch_list cc">
						<li><label><input name="iframe_open" value="1" type="radio" {{ App\Core\Tool::ifcheck($config['ubb.iframe.open']==1) }}><span>开启</span></label></li>
						<li><label><input name="iframe_open" value="0" type="radio" {{ App\Core\Tool::ifcheck($config['ubb.iframe.open']==0) }}><span>关闭</span></label></li>
					</ul>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
		</table>
	</div>
	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
		</div>
	</div>
</form>
<!-- end -->

</div>
@include('admin.common.footer')
</body>
</html>