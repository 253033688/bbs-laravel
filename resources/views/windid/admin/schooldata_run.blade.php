<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">
	<div class="nav">
		<ul class="cc">
			<li class="{{ App\Core\Tool::isCurrent($type == 3) }}"><a href="{{ url('admin/windid/schooldata/run?type=3') }}">大学管理</a></li>
			<li class="{{ App\Core\Tool::isCurrent($type == 2) }}"><a href="{{ url('admin/windid/schooldata/run?type=2') }}">中学管理</a></li>
			<li class="{{ App\Core\Tool::isCurrent($type == 1) }}"><a href="{{ url('admin/windid/schooldata/run?type=1') }}">小学管理</a></li>
		</ul>
	</div>
	<div class="h_a">功能说明</div>
	<div class="prompt_text">
		<ul>
			<li>此功能允许管理员手动维护学校的联动关系及新增学校。</li>
			<li>此功能的维护涉及全站所有的学校联动调用，请管理员根据实际的行政地域调整变化修改。</li>
		</ul>
	</div>
	<div class="h_a">{{ $schools[$type] }}管理</div>
<!--#
$_var = $type == 3 ? 'province' : 'other';
	#-->
	<div class="table_full">
	
		<table width="100%">
			<col class="th" />
			<col width="600" />
			<col />
			<tr>
				<th>选择地区</th>
				<td>
					<div class="yarnball mr20">
						<ul class="cc" id="J_yarnball_list">
							<!-- <li id="J_yarnball_country" class="li_disabled"><a class="J_yarnball" href="javascript:;" data-type="all">中国</a><em></em></li> -->
							<li id="J_yarnball_province" class="li_disabled" style="{{ $route['province']['display'] }}"><a class="J_yarnball" href="javascript:;" data-type="province" data-id="{{ $route['province']['areaid'] }}">{{ $route['province']['name'] }}</a><em></em></li>
							<li id="J_yarnball_city" class="li_disabled" style="{{ $route['city']['display'] }}"><a class="J_yarnball" href="javascript:;" data-id="{{ $route['city']['areaid'] }}">{{ $route['city']['name'] }}</a><em></em></li>
							<li id="J_yarnball_district" class="li_disabled" style="{{ $route['area']['display'] }}"><a class="J_yarnball" href="javascript:;" data-id="{{ $route['area']['areaid'] }}">{{ $route['area']['name'] }}</a><em></em></li>
						</ul>
					</div>
					<a href="" id="J_school_filter" data-rank="{{ $_var }}" data-pid="{{ $route['province']['areaid'] }}" data-cid="{{ $route['city']['areaid'] }}" data-did="{{ $route['area']['areaid'] }}">请选择&gt;&gt;</a>
					<!-- <a href="#" style="display:none;" id="J_region_change">更换省市&gt;&gt;</a> -->
					<input type="hidden" value="{{ $data['areaid'] }}" name='areaid'>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			
			<tr>
				<th>搜索{{ $schools[$data['typeid']] }}</th>
				<td>
					<form action="#" id="J_shcool_search">
						<input type="text" class="input length_3 mr10" name="name" value="{{ $data['name'] }}"><button type="submit" class="btn">搜索</button>
					</form>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
		</table>
	
	</div>
	
	<form class="J_ajaxForm" action="{{ url('windid/schooldata/update') }}" method="post">
	<div class="table_full">
		<table width="100%" id="J_table_list">
		<col width="160">
		<thead>
			<tr class="h_a">
				<th>双击名称进行编辑</th>
				<td>操作</td>
			</tr>
		</thead>
		 <tbody id="J_school_list">

@foreach ($list as $_i)

			<tr>
				<th><div data-id="{{ $_i['schoolid'] }}" class="J_school_item">{{ $_i['name'] }}</div></th>
				<td><a href="{{ url('windid/schooldata/delete?schoolid=' . $_i['schoolid']) }}" class="J_school_del">[删除]</a></td>
			</tr>
<!--#}#-->
		</tbody>
		</table>
		<div class="p10" id="J_school_add"><a href="" class="link_add" id="J_add_root" data-html="tbody">添加</a></div>
	</div>
	<div class="btn_wrap">
		<div class="btn_wrap_pd"><input style="display:none;" id="J_input_areaid" value="{{ $data['areaid'] }}" name="areaid" /><input style="display:none;" id="J_input_typeid" value="{{ $data['typeid'] }}" name="typeid" /><button class="btn btn_submit J_ajax_submit_btn" type="submit">提交</button></div>
	</div>
	</form>
@include('admin.common.footer')
</div>
<script>
var SCHOOL_DEL = "{{ url('windid/schooldata/delete') }}"; //schoolid
Wind.js(GV.JS_ROOT +'pages/config/admin/schoolData.js?v='+ GV.JS_VERSION, GV.JS_ROOT+ 'pages/admin/common/forumTree_table.js?v=' +GV.JS_VERSION);

//添加 模板 forumTree_table.js
var root_tr_html = '<tr><th><input type="text" class="input length_2" value="" name="add[]"></th><td><a href="#" class="J_newRow_del">[删除]</a></td></tr>'
</script>
</body>
</html>