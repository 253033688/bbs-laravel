<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">
	<div class="nav">
		<ul class="cc">
			<li><a href="{{ url('bbs/setforum/run') }}">版块管理</a></li>
			<li class="current"><a href="{{ url('bbs/setforum/unite') }}">版块合并</a></li>
		</ul>
	</div>
	<div class="h_a">功能说明</div>
	<div class="prompt_text">
		<ul>
			<li>源版块将被删除，源版块的帖子将移动到目标版块中</li>
			<li>有子版块的版块不能合并到其他版块</li>
			<li>分类不能使用合并功能</li>
		</ul>
	</div>
	<div class="h_a">合并版块</div>
	<form class="J_ajaxForm" action="{{ url('bbs/setforum/dounite') }}" method="post">
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>源版块</th>
				<td>
					<select name="fid"> {!! $options !!}
					</select>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>目标版块</th>
				<td>
					<select name="tofid"> {!! $options !!}
					</select>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
		</table>
	</div>
	<div class="btn_wrap">
		<div class="btn_wrap_pd">
		<button class="btn btn_submit J_ajax_submit_btn" type="submit">提交</button>
		</div>
	</div>
	</form>
@include('admin.common.footer')
</body>
</html>