<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">	
	
	
<!--添加模板-->

	<div class="nav">
		<div class="return"><a href="{{ url('design/module/run?type=api') }}">返回上一级</a></div>
		<ul class="cc">
			<li class="current"><a href="{{ url('design/property/add1') }}">新增模块</a></li>
		</ul>
	</div>
	<div class="h_a">新增模块</div>
	<form class="J_ajaxForm" action="{{ url('design/property/doadd?_json=1') }}" method="post">
	<div class="design_ct">
		@include('design.segment.property')
	</div>
	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<button class="btn btn_submit J_ajax_submit_btn" type="submit" >下一步</button>
			<input type="hidden"  name="model" value="{{ $model }}">
		</div>
	</div>
	</form>

	
</div>
@include('admin.common.footer')
<script>
Wind.use('region', function(){
	$('a.J_region_change').region({
		regioncancl : true
	});
});
</script>
</body>
</html>