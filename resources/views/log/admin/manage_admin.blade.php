<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">

	<div class="nav">
		<ul class="cc">
			<li><a href="{{ url('log/manage/run') }}">前台日志</a></li>
			<li class="current"><a href="{{ url('log/adminlog/run') }}">后台日志</a></li>
			<li><a href="{{ url('log/loginlog/run') }}">用户登录日志</a></li>
		</ul>
	</div>
	<div class="h_a">功能说明</div>
	<div class="prompt_text">
		<ol>
			<li>为了保证后台的安全性，系统只允许站点创始人删除日志</li>
			<li>系统必须保留前500条后台管理日志</li>
		</ol>
	</div>
	<div class="h_a">搜索</div>
	<div class="search_type cc mb10">
		<form action="{{ url('log/adminlog/run') }}" method="post">
		<div class="ul_wrap">
			<ul class="cc">
				<li>
					<label>关键字：</label><input type="text" class="input length_3" value="{{ $keyword }}" name="keyword">
				</li>
				<li>
				<button class="btn btn_submit" type="submit">搜索</button>
				</li>
			</ul>
		</div>
		</form>
	</div>
	
	<div class="table_list">
		<table width="100%">
			<thead>
				<tr>
					<td width="80">操作者</td>
					<td width="250">功能菜单</td>
					<td>操作日志</td>
					<td width="120">操作时间</td>
					<td width="80">IP</td>
				</tr>
			</thead>

@foreach ($logs as $key => $item)

			<tr>
				<td><a href="{{ url('space/index/run?username=' . $item[1]|pw) }}" target="_blank">{{ $item[1] }}</a></td>
				<td>{{ $item[2] }}<br />{{ $item[5] }}</td>
				<td>{{ $item[6] }}</td>
				<td>{{ App\Core\Tool::time2str($item[4], 'Y-m-d H:i:s') }}</td>
				<td>{{ $item[3] }}</td>
			</tr>
	<!--#}#-->
		</table>
		<div class="p10">
			<page tpl='TPL:common.page' page='$page' count='$count' per='$perpage' url='admin/log/adminlog/run' args='$searchData'/>
		</div>
	</div>

@if ($isFound)

	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<a class="btn" id="J_clear" href="{{ url('log/adminlog/clear') }}">清除多余日志</a>
		</div>
	</div>
	<!--#}#-->
@include('admin.common.footer')
</div>
<script>
Wind.use('ajaxForm', 'dialog', function(){
	var clear = $('#J_clear');
	clear.on('click', function(e){
		e.preventDefault();

		Wind.dialog({
			type : 'confirm',
			isMask	: false,
			message : '确认删除？',
			follow	: clear,
			onOk	: function() {
				clear.parent().find('span').remove();

				$.post(clear.attr('href'), {
					step : '2'
				}, function(data){
					if(data.state == 'success') {
						$( '<span class="tips_success">' + data.message + '</span>' ).appendTo(clear.parent()).fadeIn('slow').delay( 1000 ).fadeOut(function(){
							reloadPage(window);
						});
					}else if(data.state == 'fail'){
						$( '<span class="tips_error">' + data.message + '</span>' ).appendTo(clear.parent()).fadeIn( 'fast' );
					}
				}, 'json');
			}
		});
	});
});
</script>
</body>
</html>