<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap J_check_wrap">
<!--==============================公告管理列表================================-->
	<div class="mb10">
		<a href="{{ url('announce/announce/add') }}" class="btn" title="添加公告"><span class="add"></span>添加公告</a>
	</div>
	<form class="J_ajaxForm" action="{{ url('announce/announce/doRun') }}" method="post">
	<div class="table_list">
		<table width="100%">
			<colgroup>
				<col width="80">
				<col width="60">
				<col>
				<col width="60">
				<col width="100">
				<col width="260">
				<col width="160">
			</colgroup>
			<thead>
				<tr>
					<td><label><input type="checkbox" name="checkAll" class="J_check_all" data-direction="y" data-checklist="J_check_y">全选</label></td>
					<td>顺序</td>
					<td>公告</td>
					<td>状态</td>
					<td>发布者</td>
					<td>有效时间</td>
					<td>操作</td>
				</tr>
			</thead>
			<tbody id="J_link_tr">

@if ($announceInfos)

			<!--#
			  $now = App\Core\Tool::str2time(App\Core\Tool::time2str(App\Core\Tool::getTime(), 'Y-m-d'));
			 foreach ($announceInfos as $value) { 
			    $status = null;
			    $subject = $value['subject'] ? App\Core\Tool::substrs($value['subject'], 30) : null;
			    #-->
			<tr>
				<td><input class="J_check" data-xid="J_check_x" data-yid="J_check_y" type="checkbox" name="aid[]" value="{{ $value['aid'] }}"></td>
				<td><input class="input length_0" type="text" name="vieworder[{{ $value['aid'] }}]" value="{{ $value['vieworder'] }}"></td>
				<td>{{ $subject }}</td>

@if($now < $value['start_date'])
$status = '未发布';$statusColor = 'red';
				}
			    if ($now >= $value['start_date'] && (0 == $value['end_date'] || $now <= $value['end_date']))	{
			    	$status = '发布中';$statusColor = 'green';
			    }
			    if ($value['end_date'] && $now > $value['end_date']) {
			  	  	$status = '已过期';$statusColor = 'gray';
			  	} 
			    $start_date = $value['start_date'] ? App\Core\Tool::time2str($value['start_date'], 'Y-m-d') : null;
			    $end_date = $value['end_date'] ? App\Core\Tool::time2str($value['end_date'], 'Y-m-d') : null;
			    #-->
				<td><span class="{{ $statusColor }}">{{ $status }}</span></td>
				<td>{{ $value['username'] }}</td>
				<td>{{ $start_date }}至{{ $end_date }}</td>
				<td><a href="{{ url('announce/announce/update?aid=' . $value['aid']) }}" title="编辑公告管理" class="mr10">[编辑]</a><a href="{{ url('announce/announce/doDelete') }}" class="mr10 J_ajax_del" data-pdata="{'aid': {{ $value['aid'] }}}">[删除]</a></td>
			</tr>
			<!--# } #-->

@else

				<tr><td colspan="7" class="tac">啊哦，暂无内容！</td></tr>
			<!--# } #-->
			</tbody>
		</table>
		<div class="p10"><page tpl="TPL:common.page" page="$page" per="$perpage" count="$pageCount" url="announce/announce/run" /></div>
	</div>

@if ($announceInfos)

	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<label class="mr20"><input type="checkbox" name="checkAll" class="J_check_all" data-direction="x" data-checklist="J_check_x">全选</label>
			<button class="btn btn_submit J_ajax_submit_btn" type="submit">提交</button>
			<button type="button" id="J_link_del_all" class="btn">删除</button>
		</div>
	</div>
	<!--# } #-->
	</form>
</div>

@include('admin.common.footer')
<script type="text/javascript">
Wind.use('dialog',function() {

	//分类筛选
	var link_tr = $('#J_link_tr > tr');
	$('#J_link_types').on('change', function(){
		link_tr.hide();
		var $this = $(this), v = $this.val();
		if(v) {
			$('.J_link_'+ v).parents('tr').show();
		}else{
			link_tr.show();
		}
	});
	
	//批量删除
	$('#J_link_del_all').on('click', function(e){
		e.preventDefault();
		if(!$('input.J_check:checked').length) {
			Wind.dialog.alert('请至少选定至一条管理公告');
			return;
		}
		Wind.dialog({
			message	: '确定删除选定的管理公告？', 
			type	: 'confirm',
			onOk	: function() {
				$('form.J_ajaxForm').ajaxSubmit({
					dataType : 'json',
					url		 : '{{ url('announce/announce/doBatchDelete') }}',
					success	 : function(data, statusText, xhr, $form) {
						if(data.state === 'success') {
							var location = window.location;
							location.href = location.pathname + location.search;
						}else{
							Wind.dialog.alert(data.message);
						}
					}
				});
			}
		});
		
	});
});
</script>
</body>
</html>
