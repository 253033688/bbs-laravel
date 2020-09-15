<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap J_check_wrap">	
	<!--============================权限管理============================-->	

	<div class="nav">
		<div class="return">

@if ($type == 1)

		<a href="{{ url('design/page/run') }}">返回上一级</a>

@else

		<a href="{{ url('design/portal/run') }}">返回上一级</a>
		<!--# } #-->
		</div>
		<ul class="cc">
			<li class="current"><a href="{{ url('design/permissions/page?id=' . $designId) }}">页面权限管理</a></li>
		</ul>
	</div>
	<div class="h_a">功能说明</div>
	<div class="prompt_text">
		<ol>
			<li>此处设置的权限将作用于此页面所有的模块； </li>
			<li>编辑模块：对此页的所有模块有编辑权限； </li>
			<li>管理内容：推送的内容可以直接在此页的所有模块显示，拥有本页所有模块显示内容、推送内容和添加内容的管理权限； </li>
			<li>推送内容需审核：可推送内容到本页的所有模块，但需要通过审核后才会显示。</li>
		</ol>
	</div>
	<div class="h_a">页面权限设置</div>
	<div class="table_full">
		<table width="100%">
			<colgroup>
				<col width="40">
				<col width="200">
			</colgroup>
			<tr>
				<th>页面名称：</th>
				<td>{{ $info['page_name'] }}</td>
			</tr>
		</table>
	</div>
	<form class="J_ajaxForm" method="post" action="{{ url('design/permissions/doedit') }}">
	<div class="table_list">
		<table width="100%" id="J_table_list">
			<colgroup>
				<col width="70">
				<col width="200">
				<col width="90">
				<col width="90">
				<col width="130">
			</colgroup>
			<thead>
				<tr>
					<td><label><input type="checkbox" data-checklist="J_check_y" data-direction="y" class="J_check_all">全选</label></td>
					<td>用户名</td>
					<td><label><input class="J_radio_type" data-type="modle" type="radio" name="all" value="3">编辑模块</label></td>
					<td><label><input class="J_radio_type" data-type="content" type="radio" name="all" value="2">管理内容</label></td>
					<td><label><input class="J_radio_type" data-type="verify" type="radio" name="all" value="1">推送内容需审核</label></td>
					<td>操作</td>
				</tr>
			</thead>

@foreach ($list as $v)

			<tr>
				<td><input data-xid="J_check_x" data-yid="J_check_y" class="J_check" type="checkbox" name="del_ids[]" value="{{ $v['id'] }}"></td>
				<td><a href="{{ url('design/permissions/view?uid=' . $v['uid']) }}">{{ $users[$v['uid']]['username'] }}</a> <input type="hidden" name="ids[{{ $v['id'] }}]" value="{{ $v['id'] }}"></td>
				<td><input class="J_radio_type_modle" type="radio" name="permissions[{{ $v['id'] }}]" value="3" {{ App\Core\Tool::ifcheck($v['permissions'] == 3) }}></td>
				<td><input class="J_radio_type_content" type="radio" name="permissions[{{ $v['id'] }}]" value="2" {{ App\Core\Tool::ifcheck($v['permissions'] == 2) }}></td>
				<td><input class="J_radio_type_verify" type="radio" name="permissions[{{ $v['id'] }}]" value="1" {{ App\Core\Tool::ifcheck($v['permissions'] == 1) }}></td>
				<td><a class="J_ajax_del" href="{{ url('design/permissions/delete') }}" data-pdata="{'id': {{ $v['id'] }}}">[删除]</a></td>
			</tr>
			<!--# } #-->
			<tr>
				<td></td>
				<td><input type="text" class="input length_3" name="new_username[tmp_1]"></td>
				<td><input class="J_radio_type_modle" type="radio" name="new_permissions[tmp_1]" value="3" ></td>
				<td><input class="J_radio_type_content" type="radio" name="new_permissions[tmp_1]" value="2"></td>
				<td><input class="J_radio_type_verify" type="radio" name="new_permissions[tmp_1]" value="1" checked></td>
				<td></td>
				<!-- <td><a href="" class="link_add" id="J_add_root" data-html="tbody">添加用户</a></td> -->
			</tr>
		</table>
	</div>
	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<label class="mr20"><input type="checkbox" data-checklist="J_check_x" data-direction="x" class="J_check_all">全选</label>
			<button class="btn btn_submit J_ajax_submit_btn" type="submit">提交</button>
			<button class="btn J_ajax_submit_btn" data-subcheck="true" data-msg="确定删除选中的项？" data-action="{{ url('design/permissions/batchdelete') }}" type="button">删除</button>
			<input type="hidden" name="design_type" value="{{ $pType }}">
			<input type="hidden" name="design_id" value="{{ $designId }}">
		</div>
	</div>
	
	</form>
		
</div>
@include('admin.common.footer')
<script>
var root_tr_html = '<tr>\
				<td></td>\
				<td><input type="text" class="input length_3" name="new_username[tmp_NEW_ID_]"></td>\
				<td><input class="J_radio_type_modle" type="radio" name="new_permissions[tmp_NEW_ID_]" value="3"></td>\
				<td><input class="J_radio_type_content" type="radio" name="new_permissions[tmp_NEW_ID_]" value="2"></td>\
				<td><input class="J_radio_type_verify" type="radio" name="new_permissions[tmp_NEW_ID_]" value="1"  checked></td>\
				<td><a href="#" class="J_newRow_del">[删除]</a></td>\
			</tr>';
$(function(){
	//权限radio关联
	$('#J_table_list').on('change', 'input.J_radio_type', function(){
		var type = $(this).data('type');
		if(this.checked) {
			$('input.J_radio_type_' + type).prop('checked', true);
		}
	});

	Wind.js(GV.JS_ROOT+ 'pages/admin/common/forumTree_table.js?v=' +GV.JS_VERSION);
});
</script>
</body>
</html>