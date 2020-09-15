<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body class="body_none" style="width:340px;">
	<!--颁发勋章弹窗-->
	<!-- <form class="J_ajaxForm" action="{{ url('medal/medal/doAddAward') }}" method="post"> -->
<form class="J_ajaxForm" action="{{ url('medal/medal/doAddAward') }}" method="post">
				<div class="pop_cont">
					<div class="pop_table" style="height:auto;">
						<table width="100%">
							<tr>
								<th>用户名</th>
								<td>
									<input type="text" class="input length_4 mb5"name="username" placeholder="多人请按空隔隔开" />
								</td>
							</tr>
							<tr>
								<th>勋章名称</th>
								<td>
									<select class="select_4" name="medalid">

@foreach ($medalList as $medal)

										<option value="{{ $medal['medal_id'] }}">{{ $medal['name'] }}</option>
									<!--# } #-->

@if (!$medalList)
<option value="">只能颁发手动勋章</option><!--# } #-->
									</select>
								</td>
							</tr>
							<tr>
								<th>颁发原因</th>
								<td><input type="text" class="input length_4" name="message"/></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="pop_bottom">
					<button class="btn fr" id="J_dialog_close" type="button">取消</button>
					<button type="submit" class="btn btn_submit J_ajax_submit_btn fr mr10">提交</button>
				</div>
	</form>
	<!--颁发勋章弹窗 end-->

</div>
@include('admin.common.footer')
</body>
</html>