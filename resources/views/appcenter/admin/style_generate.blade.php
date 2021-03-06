<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">
	<div class="nav">
		<ul class="cc">

@foreach($addons as $key => $value)

			<li><a href="{{ url('appcenter/style/run?type=' . $key) }}">{{ $value[0] }}</a></li>
			<!--# } #-->
			<li><a href="{{ url('appcenter/style/install') }}">本地安装</a></li>
			<li><a href="{{ url('appcenter/style/manage') }}">界面管理</a></li>

@if(app('APPCENTER:service.srv.PwDebugApplication')->inDevMode1())

			<li class="current"><a href="{{ url('appcenter/style/generate') }}">开发助手</a></li>
			<!--# } #-->
		</ul>
	</div>
	<!--应用安装-->
<div class="h_a">提示信息</div>
<div class="prompt_text">
		<ul>
			<li>该功能仅供应用开发者使用，通过创建应用可以生成一个最简单的demo。开发者可以基于这个demo继续开发。</li>
			<li>应用开发文档请参考《云平台文档中心》，有疑问请至phpwind官方论坛开发者论坛交流。</li>
			<li>在应用开发之前，请先在phpwind云平台创建应用，获取“应用标识”。</li>
		</ul>
	</div>
<div class="h_a">生成模板包</div>
<form class="J_ajaxForm" method="post" action="{{ url('appcenter/style/doGenerate') }}">
<div class="table_full">
	<table width="100%">
		<col class="th" />
		<col width="320" />
		<col />
		<tr>
			<th>模板名称</th>
			<td><span class="must_red">*</span>
				<input type="text" class="input length_5" name="name" value="" required>
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>模板标识(alias)</th>
			<td>
				<input type="text" class="input length_5" name="alias" value="" required>
			</td>
			<td><div class="fun_tips">请先至 <a href="http://open.phpwind.com" target="_blank">phpwind云平台</a> 创建应用，获取应用标识</div></td>
		</tr>
		<tr>
			<th>模板类型</th>
			<td><span class="must_red">*</span>
			<select size="1" name="style_type" class="select_5">

@foreach($support as $k => $v)

				<option value="{{ $k }}">{{ $v[0] }}</option>
				<!--# } #-->
			</select>
			<!-- <ul class="switch_list cc">
				# foreach($support as $k => $v){ #
				<li><label><input type="radio" name="style_type" value="{{ $k }}"><span>{{ $v[0] }}</span></label></li>
				# } #
			</ul> -->
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>模板描述</th>
			<td>
				<textarea name="description" class="length_5"></textarea>
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>模板版本号</th>
			<td><span class="must_red">*</span>
				<input type="text" class="input length_5" name="version" value="1.0" required>
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>适用phpwind版本</th>
			<td><span class="must_red">*</span>
				<input type="text" class="input length_5" name="pwversion" value="{{ @NEXT_VERSION }}" required>
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>作者名称</th>
			<td>
				<input type="text" class="input length_5" name="author" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>作者email</th>
			<td>
				<input type="text" class="input length_5" name="email" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>网站地址</th>
			<td>
				<input type="text" class="input length_5" name="website" value="">
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
@include('admin.common.footer')
</div>

</body>
</html>