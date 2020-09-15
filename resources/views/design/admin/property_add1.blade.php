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
	<div class="h_a">新增调用</div>
	<form  action="{{ url('design/property/add2') }}" method="post">
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>选择数据模型</th>
				<td>
					<select name="model">

@foreach ($models as $key=>$model)

							<option value="{{ $key }}">{{ $model['name'] }}</option>
						<!--# } #-->
					</select>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
		</table>
	</div>
	<div class="">
		<div class="btn_wrap_pd">
			<button class="btn btn_submit" type="submit">下一步</button>
		</div>
	</div>
	</form>

	
</div>
@include('admin.common.footer')
</body>
</html>