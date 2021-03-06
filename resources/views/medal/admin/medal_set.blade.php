<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">
	<div class="nav">
		<ul class="cc">
			<li><a href="{{ url('medal/medal/run') }}">勋章管理</a></li>
			<li><a href="{{ url('medal/medal/award') }}">勋章颁发</a></li>
			<li><a href="{{ url('medal/medal/approval') }}">勋章审核</a></li>
			<li  class="current"><a href="{{ url('medal/medal/set') }}">勋章设置</a></li>
		</ul>
	</div>
	<div class="h_a">勋章设置</div>
	<div class="prompt_text">
		<ul>
			<li>如果出现勋章统计数据不准确的情况，请点击“重新统计”按钮 ，尽量在服务器相对空闲时使用。</li>
		</ul>
	</div>
	<form class="J_ajaxForm" action="{{ url('medal/medal/doSet') }}" method="post">
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>勋章功能</th>
				<td>
					<ul class="switch_list cc">
						<li><label><input type="radio" name="isopen" value="1" {{ App\Core\Tool::ifcheck($config['medal.isopen']) }}><span>开启</span></label></li>
						<li><label><input type="radio" name="isopen" value="0" {{ App\Core\Tool::ifcheck(!$config['medal.isopen']) }}><span>关闭</span></label></li>
					</ul>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
		</table>
	</div>
	<div class="">
		<div class="btn_wrap_pd">
			<button class="btn btn_submit J_ajax_submit_btn" type="submit" >提交</button>
			<a class="btn"  href="{{ url('medal/medal/doUserMedal') }}" role="button">重新统计</a>
		</div>
	</div>
	</form>
</div>
@include('admin.common.footer')
</body>
</html>