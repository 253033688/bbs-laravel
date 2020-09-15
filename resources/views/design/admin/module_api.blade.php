<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<!--# 
	$api = $run = '';
	if ($isapi == 'api'){
		$api = 'current';
	}else{
		$run = 'current';
	}
#-->
<div class="wrap">
	<div class="nav">
		<ul class="cc">
			<li class="{{ $run }}"><a href="{{ url('design/module/run') }}">模块管理</a></li>
			<li class="{{ $api }}"><a href="{{ url('design/module/run?type=api') }}">调用管理</a></li>
		</ul>
	</div>
	<div class="h_a">搜索</div>
	<form method="post" action="{{ url('design/module/run') }}">
	<div class="search_type cc mb10">
		<div class="mb10">
		<span class="mr20">ID：<input type="text" class="input length_2" name="moduleid" value="{{ $args['moduleid'] }}"></span>
		<span class="mr20">模块名称：<input type="text" class="input length_2" name="name" value="{{ $args['name'] }}"></span>
		<span class="mr20">数据分类：
			<select class="select_2" name="model">
				<option  value="">不限制</option>

@foreach ($models as $k=>$model)

				<option value="{{ $k }}" {{ App\Core\Tool::isSelected($k == $args['model']) }}>{{ $model['name'] }}</option>
				<!--# } #-->
			</select>
		</span>
		<input type="hidden"  name="type" value="api">
		<button class="btn" type="submit">搜索</button>
		</div>
	</div>
	</form>
	<div class="mb10">
			<a  class="btn" href="{{ url('design/property/add1') }}"><span class="add"></span>添加模块</a>
	</div>

@if ($list)

	<div class="table_list">
		<table width="100%">
			<colgroup>
				<col width="70">
				<col width="200">
				<col width="200">
			</colgroup>
			<thead>
				<tr>
					<td>ID</td>
					<td>模块名称</td>
					<td>数据分类</td>
					<td>操作</td>
				</tr>
			</thead>

@foreach ($list as $v)

			<tr>
				<td>{{ $v['module_id'] }}</td>
				<td>{{ $v['module_name'] }}</td>
				<td>{{ $models[$v['model_flag']]['name'] }}</td>
				<td>

@if ($v['isdata'])

					<a href="{{ url('design/data/run?moduleid=' . $v['module_id']) }}" class="mr10">[管理]</a>

@else

					<a href="{{ url('design/property/edit?moduleid=' . $v['module_id']) }}" class="mr10">[管理]</a>
				<!--# } #-->
					<!--a href="{{ url('design/data/run?moduleid=' . $v['module_id']) }}" class="mr10">[数据]</a-->
					<a href="{{ url('design/module/script?moduleid=' . $v['module_id']) }}"  class="mr10">[调用代码]</a>
					<a href="{{ url('design/module/delete') }}" class="mr10 J_ajax_del" data-pdata="{'moduleid': {{ $v['module_id'] }}}">[删除]</a>
				</td>
			</tr>
		<!--# } #-->
		</table>
		<div class="p10"><page tpl='TPL:common.page'  total="$totalpage" page="$page" per="$perpage" count="$count" url="design/module/run" args="$args"/></div>
	</div>

@else

		<div class="not_content_mini"><i></i>啊哦，没有符合条件的内容！</div>
		<!--# } #-->
</div>
@include('admin.common.footer')
</body>
</html>