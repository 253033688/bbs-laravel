<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body class="body_none" style="width:355px;">
	<form class="J_ajaxForm" data-role="list" action="{{ url('hook/inject/doEdit') }}" method="post">
	<div class="pop_cont pop_table" style="height:auto;padding-top:0;">
		<table width="100%">
			<tr>
				<th>别名</th>
				<td><input type="text" name="alias" class="input length_4" value="{{ $inject['alias'] }}"><input type="hidden" name="id" value="{{ $inject['id'] }}"></td>
			</tr>
			<tr>
				<th>hook名称</th>
				<td>
				<select name="hook_name" class="select_4">

@foreach($hooks as $v)

				<option value="{{ $v['name'] }}" {{ App\Core\Tool::isSelected($inject['hook_name']==$v['name']) }}>{{ $v['name'] }}</option>
				<!--# } #-->
				</select>
				</td>
			</tr>
			<tr>
				<th>类名</th>
				<td>
				<input type="text" name="class" value="{{ $inject['class'] }}" class="input length_4">
				</td>
			</tr>
			<tr>
				<th>方法名</th>
				<td>
				<input type="text" name="method" value="{{ $inject['method'] }}" class="input length_4">
				</td>
			</tr>
			<tr>
				<th>loadway</th>
				<td>
				<select name="loadway" class="select_4">
				<option value="" {{ App\Core\Tool::isSelected($inject['loadway']=='') }}></option>
				<option value="load" {{ App\Core\Tool::isSelected($inject['loadway']=='load') }}>load</option>
				<option value="loadDao" {{ App\Core\Tool::isSelected($inject['loadway']=='loadDao') }}>loadDao</option>
				</select>
				</td>
			</tr>
				<tr>
				<th>expression</th>
				<td>
				<input type="text" name="expression" value="{{ $inject['expression'] }}" class="input length_4">
				</td>
			</tr>
			<tr>
				<th>描述</th>
				<td><textarea name="description" class="length_4">{{ $inject['expression'] }}</textarea></td>
			</tr>
		</table>
	</div>
	<div class="pop_bottom">
		<button class="btn fr" id="J_dialog_close" type="button">取消</button>
		<button type="submit" class="btn btn_submit J_ajax_submit_btn fr mr10">提交</button>
	</div>
	</form>
	@include('admin.common.footer')
</body>
</html>