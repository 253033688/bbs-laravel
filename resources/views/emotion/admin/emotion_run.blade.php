<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">
	<div class="h_a">表情安装说明</div>
	<div class="prompt_text">
		<ol>
			<li>请将包含表情文件的文件夹通过ftp上传至 <span class="red">www/res/images/emotion</span> 目录下。</li>
			<li>在“未安装表情”列表里安装该分类。</li>
			<li>在“启用”列表里启用该分类。</li>
			<li>“管理”该该分类下的表情，“添加”需要启用的表情。</li>
		</ol>
	</div>
<form class="J_ajaxForm" action="{{ url('emotion/emotion/dorun') }}" method="post">
	<div class="table_list">
		<table width="100%">
			<colgroup>
				<col width="50" />
				<col width="80" />
				<col width="220" />
				<col width="250" />
				<col />
			</colgroup>
			<thead>
				<tr>
					<td>启用</td>
					<td>顺序</td>
					<td>分类名称</td>
					<td>文件夹名</td>
					<td>操作</td>
				</tr>
			</thead>

@foreach ($catList as $cat)

			<tr>
				<td><input type="checkbox" name="isopen[{{ $cat['category_id'] }}]"  {{ App\Core\Tool::ifcheck($cat['isopen']) }} value="1"/>
					<input type="hidden" name="catid[]" value="{{ $cat['category_id'] }}"/>
				</td>
				<td><input type="number" class="input length_1" name="category_orderid[{{ $cat['category_id'] }}]" value="{{ $cat['orderid'] }}" /></td>
				<td><input type="text" class="input length_3" name="category_name[{{ $cat['category_id'] }}]" value="{{ $cat['category_name'] }}"/></td>
				<td>{{ $cat['emotion_folder'] }}</td>

				<td>
					<a href="{{ url('emotion/emotion/emotion?catid=' . $cat['category_id']) }}" class="mr5">[管理]</a>
					<a href="{{ url('emotion/emotion/deletecate') }}" class="mr5 J_ajax_del" data-pdata="{'cateid': {{ $cat['category_id'] }}}">[删除]</a>
				</td>
			</tr>
		<!--# } #-->
		</table>
	</div>
	<div class="btn_wrap_pd"><button class="btn btn_submit J_ajax_submit_btn" type="submit">提交</button></div>
	</form>
	<div class="table_list mb10">
		<div class="h_a">未安装表情</div>
		<form class="J_ajaxForm" action="{{ url('emotion/emotion/doadd') }}" method="post">
		<table width="100%">
			<tr>
				<td width="80">顺序</td>
				<td width="220">分类名称</td>
				<td width="120">文件夹名</td>
				<td>操作</td>
			</tr>

@foreach ($folderList as $folder)

			<tr>
				<td><input type="number" class="input length_1" name="orderid"/></td>
				<td><input type="text" class="input length_3" name="catname"/></td>
				<td>{{ $folder }}<input type="hidden" name="folder" value="{{ $folder }}"/></td>
				<td><button class="btn J_ajax_submit_btn" type="submit">安装</button></td>
			</tr>
		<!--# } #-->
		</table>
		</form>	
	</div>
</div>
@include('admin.common.footer')
<script>
$(function(){
	//显示支持应用
	$('a.J_click_toggle').on('click', function(e){
		e.preventDefault();
		$(this).prev('.J_toggle_list').toggleClass('dn');			//不能用toggle()，父标签浮动宽高为0，jquery :hidden为true
	});
	
	var lock = false;
	$('div.J_toggle_list').children().on('mouseenter', function(){
		lock = true;
	}).on('mouseleave', function(){
		$(this).focus();
		lock = false;
	}).on('blur', function(){
		if(!lock) {
			$(this).parent().addClass('dn');
		}
	}).on('click', 'input:checkbox', function(){
		//点击下拉项
		var arr = [],
			list = $(this).parents('.J_toggle_list'),
			checked = list.find('input:checkbox:checked');
		
		//循环写入名称
		$.each(checked, function(i, o){
			arr.push($(this).parent().text());
		});
		list.siblings('.J_support_list').text(arr.join('、'));
		
	});
});
</script>
</body>
</html>
