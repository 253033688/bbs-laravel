<!--#
$is_design = 1;
$models = array();
$service = app('design.srv.PwDesignService');
$types = $service->getDesignModelType();
$_models = $service->getModelList();
$styles =  $service->getDesignAppStyle(1,100);
foreach ($_models AS $k=>$model) {
	$models[$model['type']][] = array('name'=>$model['name'], 'model'=>$k);
}
#-->

<!--====================头部模块设计菜单==================-->
<style>
/*结构编辑*/
.move{cursor:move;}
.layout_edit{
	background:#ff0000;
	display:block;
	color:#fff;
	font-size:12px;
	position:absolute;
	width:68px;
	text-align:center;
	height:24px;
	line-height:24px;
	z-index:99998;
}
/*增加间距用于模块叠加和结构编辑*/
.mod_box,
.design_layout_style{
	margin:5px 0;
	min-height:40px;
	_height:40px;
}
.design_layout_ct{
	padding:5px 0;
	min-height:40px;
	_height:40px;
}
/*模块编辑*/
.mode_edit{
	position:absolute;
	z-index:99998;
	border:1px solid #488FCE;
	margin-left:-1px;
	margin-top:-1px;
}
.mode_edit .hd{
	background:#488FCE;
	line-height:25px;
	height:25px;
	color:#fff;
	position:absolute;
	margin-top:-25px;
	left:0;
	width:100%;
	border:1px solid #488FCE;
	margin-left:-1px;
}
.mode_edit .hd h2{
	float:left;
	font-size:12px;
	padding:0 0 0 10px;
	margin:0;
}
.mode_edit .hd a{
	float:right;
	margin-right:10px;
	color:#fff;
	font-size:12px;
}

/*
===================
弹窗管理
===================
*/
.core_pop_wrap{
	font-family:Arial;
	line-height:1.5;
}
#J_layout_edit_pop{
	width:600px;
}
.pop_design{
	width:580px;
	height:460px;
	padding:0 10px;
}
/*头部*/
.pop_design_hd{
	padding-top:5px;
	border-bottom:1px solid #ddd;
	height:25px;
	margin:0 0 10px;
}
.pop_design_hd .del{
	float:right;
}
.pop_design_hd li{
	float:left;
	margin-right:3px;
	cursor:pointer;
}
.pop_design_hd li a{
	display:block;
	float:left;
	padding:3px 10px;
	border:1px solid #e4e4e4;
	border-bottom:0;
	background:#f6f6f6;
}
.pop_design_hd li a:hover{
	text-decoration:none;
	background:#f9f9f9;
	color:#333;
}
.pop_design_hd li.current a{
	background:#fff;
	color:#333;
	font-weight:700;
	padding-top:4px;
	margin-bottom:-1px;
	border-color:#ddd;
}
/*内容区域*/
.pop_design .ct{
	height:370px;
	overflow-x:hidden;
	overflow-y:auto;
	position:relative;
}
/*设置*/
.pop_design .pop_cont{
	padding:0 5px 15px;
}
.pop_design .pop_cont dl{
	padding:5px 0;
}
.pop_design .hr{
	height:1px;
	background:#ccc;
	padding:0;
	font:0/0 Arial;
	overflow:hidden;
	margin:10px 0;
}
/*隐藏内容*/
.pop_design .down_hidden{
	background:#f7f7f7;
	padding:10px 0;
	margin:10px 0;
}

/*
===================
单图上传
===================
*/
.single_image_up{
	width:80px;
	height:20px;
	position:relative;
	margin-bottom:5px;
	overflow:hidden;
}
.single_image_up a{
	height:20px;
	width:80px; 
	display:block;
	line-height:20px;
	text-indent:25px;
	background:url({@G:url.images}/portal/thumb_up.png) no-repeat;
	filter:alpha(opacity=80);
	-moz-opacity:0.8;
	opacity:0.8;
	text-decoration:none;
	color:#333;
}
.single_image_up:hover a{
	text-decoration:none;
	filter:alpha(opacity=100);
	-moz-opacity:1;
	opacity:1;
}
.single_image_up input{
	width:80px;
	height:22px;
	position:absolute;
	top:0;
	right:0;
	background:none;
	filter:alpha(opacity=0);
	-moz-opacity:0;
	opacity:0;
	cursor:pointer;
	outline:none;
}

/*
===================
表格排序列表
===================
*/
.pop_design_tablelist thead td select{
	padding:1px;
	line-height:22px;
	height:22px;
}
.pop_design_tablelist th input{
	margin:0;
	padding:0;
}
.pop_design_tablelist th.thbg{
	background:#ffffee;
}
.pop_design_tablelist .subject{
	white-space:nowrap;
	text-overflow:ellipsis;
	line-height:18px;
	height:18px;
	overflow:hidden;
}

/*
===================
模块模板
===================
*/
/*左侧*/
.pop_design_code{
	height:370px;
	width:440px;
	float:left;
}
.pop_design_code textarea{
	width:430px;
	height:280px;
	font-family:"Courier New", Courier, monospace;
	margin-bottom:5px;
}
/*右侧*/
.pop_design_case{
	float:right;
	width:135px;
	height:368px;
	overflow-x:hidden;
	overflow-y:auto;
	border-left:1px solid #e4e4e4;
}
.pop_design_case .thbg{
	background:#f7f7f7;
}
/*高帅富编辑效果外框*/
.CodeMirror {
	border: 1px solid #ccc;
	margin-bottom: 10px;
}

/*
===================
三列列表
===================
*/
.core_pop .three_list{
	width:360px;
}
.core_pop .three_list li{
	float:left;
	width:33%;
	height:25px;
	line-height:25px;
	overflow:hidden;
}

/*
===================
管理样式
===================
*/
.design_layout_edit{
	display:none;
	float:right;
}
.design_layout_edit a{
	background:#ff0000;
	display:block;
	color:#fff;
	font-size:12px;
	font-weight:700;
	position:absolute;
	width:60px;
	margin-left:-60px;
	text-align:center;
	height:24px;
	line-height:24px;
}
.J_module_edit{
	position:absolute;
	line-height:24px;
	height:24px;
	padding:0 10px;
	background:#336699;
	color:#fff;
}

/*
===================
空布局默认效果
===================
*/
.J_mod_box{
	min-height:20px;
	_height:20px;
}
.tempplace{
	width:100%;
	min-height:20px;
	_height:20px;

	border:1px dashed #6ea4cc;
	padding:1px;
	margin-left:-2px;
	margin-bottom:10px;
}
.tempplace_tips{
	width:100%;
	min-height:20px;
	_height:20px;
	background:#ffffe9;
	border:1px solid #faebd2;
	padding:1px;
	margin-left:-2px;
	margin-bottom:10px;
	color:#e4a06f;
	text-align:center;
}
.tempplacein{
	background:#fff;
	outline:1px dashed #6ea4cc;
	_border:1px dashed #6ea4cc;
}
.insert_holder{
	min-height:20px;
	_height:20px;
	border:3px dashed #ffd284;
	margin-left:-3px;
	position:relative;
}
/*隐藏模块管理按钮*/
.design_mode_edit{
	display:none;
}
.design_layout_hd{
	cursor:move;
}
</style>



@if($toolbar =='toolbar')

<style>
/*
===================
顶部管理
===================
*/
body{
	padding-top:161px !important;
}
.header_wrap{
	position:static !important;
}
.custom_wrap{
	padding:30px 0 !important;
}
.top_design_wrap{
	height:160px;
	background:#f4f4f4;
	position:fixed;
	width:100%;
	top:0;
	left:0;
	border-bottom:1px solid #ccc;
	box-shadow:0 2px 5px rgba(0,0,0,0.3);
	z-index:99999;
	font-family:Arial;
	line-height:1.5;
	_position:absolute;
	_top: expression(documentElement . scrollTop);
}
.top_design .hd{
	background:#2e3337;
	height:35px;
	border-bottom:1px solid #fff;
	padding:0 0 0 10px;
}
/*名称*/
.top_design .hd h2{
	float:left;
	font-size:14px;
	color:#fff;
	line-height:35px;
	margin-right:10px;
}
/*切换*/
.top_design .hd ul{
	float:left;
	padding-top:5px;
}
.top_design .hd li{
	float:left;
	line-height:30px;
	margin-right:10px;
}
.top_design .hd li a{
	float:left;
	display:block;
	font-size:14px;
	font-weight:700;
	color:#dedede;
	background:#585c5f;
	padding:0 15px;
	border-radius:3px 3px 0 0;
}
.top_design .hd li.current a{
	background:#f4f4f4;
	color:#6c6f79;
	border:1px solid #fff;
	border-bottom:0 none;
}
/*小帖士*/
.top_design .hd .mini_tips{
	float:right;
	background:#585c5f;
	color:#dedede;
	line-height:25px;
	padding:0 10px;
	margin:5px 20px 0 0;
	width:260px;
}
.top_design .hd .mini_tips strong{
	color:#fffde4;
}
.top_design .hd .mini_tips span{
	font-family:Simsun;
	margin:0 5px;
}
.top_design .hd .mini_tips .close{
	float:right;
	display:inline;
	width:16px;
	height:16px;
	overflow:hidden;
	font:0/0 Arial;
	background:url({@theme:site.images}/common/core_icon.png) 5px -37px no-repeat;
	margin:5px 0 0 10px;
}
/*右侧操作*/
.top_design .hd .operate{
	float:right;
	padding-top:5px;
	width:160px;
}
.top_design .hd .operate .btn{
	width:60px;
	float:right;
	margin-right:10px;
}
.top_design .hd .operate a{
	background:#585c5f;
	color:#dedede;
	border-radius:3px;
	line-height:25px;
	padding:0 10px;
	float:right;
	margin-right:10px;
}
.top_design .hd .operate .arrow{
	padding:0 5px 0 3px;
	*padding-top:4px;
	cursor:pointer;
}
.top_design .hd .operate .arrow em{
	border-top:4px #dedede solid;
}
/*内容区域*/
.top_design_wrap .ct{
	overflow:hidden;
	overflow-y:auto;
	height:120px;
}
/*结构样例*/
.top_design .layout_sample{
	height:100px;
	padding-top:10px;
	position:relative;
	overflow-y:auto;
	overflow-x:hidden;
}
.top_design .layout_sample li{
	float:left;
	width:100px;
	height:100px;
	margin-left:10px;
	margin-bottom:10px;
	display:inline;
}
.top_design .layout_sample li a{
	display:block;
	width:98px;
	height:98px;
	border:1px solid #e5e5e5;
	background:#fff;
	position:relative;
	color:#565656;
}
.top_design .layout_sample li a:hover{
	text-decoration:none;
	border-color:#50b2e7;
	outline:1px solid #50b2e7;
}
.top_design .layout_sample li em{
	line-height:28px;
	text-align:center;
	display:block;
	padding-top:70px;
	cursor:move;
}
.top_design .layout_sample li img{
	position:absolute;
	left:8px;
	top:8px;
}
/*结构效果*/
.top_design .layout_sample a span{
	position:absolute;
	background:#a4abb2;
	height:60px;
	top:8px;
	cursor:move;
}
.top_design .layout_sample .span_1{
	width:82px;
	left:8px;
}
.top_design .layout_sample .span_2{
	width:39px;
	left:8px;
}
.top_design .layout_sample .span_3{
	width:39px;
	right:8px;
}
.top_design .layout_sample .span_4{
	width:26px;
	left:8px;
}
.top_design .layout_sample .span_5{
	width:52px;
	right:8px;
}
.top_design .layout_sample .span_6{
	width:52px;
	left:8px;
}
.top_design .layout_sample .span_7{
	width:26px;
	right:8px;
}
.top_design .layout_sample .span_8{
	width:20px;
	left:8px;
}
.top_design .layout_sample .span_9{
	width:58px;
	right:8px;
}
.top_design .layout_sample .span_10{
	width:58px;
	left:8px;
}
.top_design .layout_sample .span_11{
	width:20px;
	right:8px;
}
.top_design .layout_sample .span_12{
	width:22px;
	right:38px;
}
/*tab结构效果*/
.top_design .layout_sample .span_13{
	left:8px;
	width:26px;
	height:20px;
}
.top_design .layout_sample .span_14{
	right:36px;
	width:24px;
	height:16px;
}
.top_design .layout_sample .span_15{
	right:8px;
	width:24px;
	height:16px;
}
.top_design .layout_sample .span_16{
	top:28px;
	width:82px;
	height:40px;
	left:8px;
}
.top_design .layout_sample .span_17{
	width:17px;
	left:8px;
}
.top_design .layout_sample .span_18{
	width:17px;
	left:30px;
}
.top_design .layout_sample .span_19{
	width:17px;
	left:51px;
}
.top_design .layout_sample .span_20{
	width:17px;
	right:8px;
}
.top_design .layout_sample .span_21{
	width:19px;
	left:8px;
}
.top_design .layout_sample .span_22{
	width:27px;
	left:32px;
}
.top_design .layout_sample .span_23{
	width:26px;
	right:8px;
}
.top_design .layout_sample .span_24{
	width:27px;
	left:8px;
}
.top_design .layout_sample .span_25{
	width:19px;
	right:8px;
}
.top_design .layout_sample .span_26{
	width:26px;
	right:32px;
}
.top_design .layout_sample .span_27{
	width:12px;
	left:8px;
}
.top_design .layout_sample .span_28{
	width:36px;
	left:24px;
}
.top_design .layout_sample .span_29{
	width:35px;
	right:24px;
}
.top_design .layout_sample .span_30{
	width:12px;
	right:8px;
}
/*2:3*/
.top_design .layout_sample .span_31{
	width:30px;
	left:8px;
}
.top_design .layout_sample .span_32{
	width:47px;
	right:8px;
}
/*3:2*/
.top_design .layout_sample .span_33{
	width:30px;
	right:8px;
}
.top_design .layout_sample .span_34{
	width:47px;
	left:8px;
}
/*模块类型切换*/
.top_design .tab_type{
	margin:10px;
	border-bottom:1px solid #dedede;
}
.top_design .tab_type li{
	float:left;
	padding-bottom:8px;
}
.top_design .tab_type span.line{
	padding:0 10px;
	color:#dedede;
}
.top_design .tab_type li a{
	color:#333;
}
.top_design .tab_type li.current a{
	font-weight:700;
}
/*模块类型内容*/
.top_design .tab_type_ct{
	padding:0 0 10px 10px;
}
.top_design .tab_type_ct li{
	float:left;
	margin-right:5px;
}
.top_design .tab_type_ct li a{
	float:left;
	line-height:28px;
	border:1px solid #d7d7d7;
	padding:0 10px;
	background:#fff;
	color:#333;
}
.top_design .tab_type_ct li a:hover{
	text-decoration:none;
	border-color:#50b2e7;
	outline:1px solid #50b2e7;
}
/*
===================
地区学校资料库
===================
*/
.pop_region_list{
	padding-bottom:10px;
}
.pop_region_list ul{
	padding-left:2px;
}
.pop_region_list ul li{
	float:left;
	line-height:20px;
}
.pop_region_list ul li a,
.pop_region_list ul li span{
	display:block;
	padding:0 5px;
	color:#333;
	white-space:nowrap;
	border-radius:2px;
}
.pop_region_list ul li a:hover{
	background:#e0e0e0;
	text-decoration:none;
}
.pop_region_list ul li.current a,
.pop_region_list ul li.current span{
	background:#266aae;
	color:#ffffff;
}
.pop_region_list .hr{
	background:#e4e4e4;
	height:1px;
	overflow:hidden;
	font:0/0 Arial;
	clear:both;
	margin:10px 0;
}
.pop_region_list .filter{
	padding:10px 0;
}
.pop_region_list .filter a{
	margin-right:12px;
}
.pop_region_list .filter a.current{
	color:#333;
	font-weight:700;
}
.pop_region_list .list{
	border:1px solid #ccc;
	height:108px;
	overflow-x:hidden;
	overflow-y:auto;
}
.pop_region_list .list ul{
	padding:5px;
}
.pop_region_list .list li{
	float:left;
	width:33%;
	cursor:pointer;
	text-indent:5px;
	border-radius:2px;
}
.pop_region_list .list li:hover{
	background:#f7f7f7;
}
.pop_region_list .list li.current{
	background:#266aae;
	color:#ffffff;
}
</style>
	<div class="top_design_wrap">
		<div class="top_design J_tab_wrap" id="J_top_design">
			<div class="hd">
				<h2>界面设计：</h2>
				<ul class="" id="J_design_top_nav">
					<li class="current"><a href="">设置结构</a></li>
					<li><a href="">设置模块</a></li>

@if($portal)

					<li><a href="">设置模版</a></li>
					<!--# } #-->
				</ul>
				<div class="operate">
					<a id="J_design_quit" href="{{ url('design/design/doexit') }}" class="quit">退出</a>
					<button type="button" id="J_design_submit" data-action="{{ url('design/design/dosavepage') }}" class="btn btn_submit">保存</button>
					<a id="J_design_top_arrow" class="arrow" style="background:none;"><em class="core_arrow"></em></a>
				</div>
				<div class="mini_tips" id="J_mini_tips" style="display:none;">
					<a href="javascript:;" class="close" id="J_mini_tips_close">关闭</a>
					<strong>使用小帖士：</strong>先设置结构<span>&rarr;</span>后设置模块
				</div>
			</div>
			<div class="core_menu" id="J_design_top_list" style="display:none;top:35px;right:133px;z-index:11;">
				<div class="core_down" style="background:#fff;border:1px solid #ccc;border-bottom:0 none;width:10px;height:27px;position:absolute;right:-1px;top:-30px;padding:2px 5px 0 3px;"><em class="core_arrow" style="border-top:4px #bfbfbf solid;"></em></div>
				<ul class="core_menu_list">
					<li><a id="J_design_import" href="{{ url('design/import/dorun') }}">导入模版</a></li>
					<li><a id="J_design_export" href="#"  target="_blank">导出模版</a></li>
					<li><a id="J_design_cache" href="{{ url('design/design/docache') }}">更新数据</a></li>
					<li><a id="J_design_clear" href="{{ url('design/design/doclear') }}">清空模块</a></li>
					<li><a id="J_design_restore" href="{{ url('design/design/dorestore') }}">恢复备份</a></li>
				</ul>
			</div>
			<div class="" id="J_design_top_ct">
				<div class="ct">
					<ul class="layout_sample" id="J_layout_sample">
						<li><a data-name="100" href="javascript:;"><span class="span_1"></span><em>100%结构</em></a></li>
						<li><a data-name="1_1" href="javascript:;"><span class="span_2"></span><span class="span_3"></span><em>1:1</em></a></li>
						<li><a data-name="1_2" href="javascript:;"><span class="span_4"></span><span class="span_5"></span><em>1:2</em></a></li>
						<li><a data-name="2_1" href="javascript:;"><span class="span_6"></span><span class="span_7"></span><em>2:1</em></a></li>
						<li><a data-name="1_3" href="javascript:;"><span class="span_8"></span><span class="span_9"></span><em>1:3</em></a></li>
						<li><a data-name="3_1" href="javascript:;"><span class="span_10"></span><span class="span_11"></span><em>3:1</em></a></li>
						<li><a data-name="2_3" href="javascript:;"><span class="span_31"></span><span class="span_32"></span><em>2:3</em></a></li>
						<li><a data-name="3_2" href="javascript:;"><span class="span_33"></span><span class="span_34"></span><em>3:2</em></a></li>
						<li><a data-name="1_1_1" href="javascript:;"><span class="span_4"></span><span class="span_12"></span><span class="span_7"></span><em>1:1:1</em></a></li>
						<li><a data-name="1_1_1_1" href="javascript:;"><span class="span_17"></span><span class="span_18"></span><span class="span_19"></span><span class="span_20"></span><em>1:1:1:1</em></a></li>
						<li><a data-name="2_3_3" href="javascript:;"><span class="span_21"></span><span class="span_22"></span><span class="span_23"></span><em>2:3:3</em></a></li>
						<li><a data-name="3_3_2" href="javascript:;"><span class="span_24"></span><span class="span_26"></span><span class="span_25"></span><em>3:3:2</em></a></li>
						<li><a data-name="1_4_3" href="javascript:;"><span class="span_27"></span><span class="span_28"></span><span class="span_23"></span><em>1:4:3</em></a></li>
						<li><a data-name="3_4_1" href="javascript:;"><span class="span_24"></span><span class="span_29"></span><span class="span_30"></span><em>3:4:1</em></a></li>
						<li><a data-name="tab" href="javascript:;"><span class="span_13"></span><span class="span_14"></span><span class="span_15"></span><span class="span_16"></span><em>tab结构</em></a></li>
					</ul>
				</div>
				<div class="ct" id="J_tab_type" style="display:none;">
					<div class="tab_type">
						<ul class="cc" id="J_tab_type_nav">
							<!--# $i=0; foreach ($types as $k=>$v){	#-->

@if($i == 0)

							<li  class="current"><a href="#" id="{{ $k }}">{{ $v }}</a><span class="line">|</span></li>

@else

							<li><a href="#" id="{{ $k }}">{{ $v }}</a><span class="line">|</span></li>
							<!--# } #-->
							<!--# $i++; } #-->
						</ul>
					</div>
					<div class="" id="J_tab_type_ct">

@foreach ($types as $k=>$v)

						<div class="tab_type_ct">
							<ul class="cc">

@if (!is_array($models[$k])) $models[$k] = array();
								foreach ($models[$k] as $v)

								<li><a href="{{ url('design/property/add/') }}" id="{{ $v['model'] }}">{{ $v['name'] }}</a></li>
								<!--# } #-->
							</ul>
						</div>
						<!--# } #-->
					</div>
				</div>

@if($portal)

				<div class="ct" style="display:none;">
					<div class="design_sample_list">
						<ul class="layout_sample cc">

@foreach ($styles as $v)

							<li><a class="J_nav_import" href="{{ url('design/import/editstyle?styleid=' . $v['app_id'] . '&portalid=' . $portal['id']) }}"><img src="{{ $v['logo'] }}" width="80" height="60" /><em style="cursor:pointer;">{{ $v['name'] }}</em></a></li>
						<!--# } #-->
						</ul>
					</div>
				</div>
				<!--# } #-->
			</div>
		</div>
	</div>


@else

<style>
body{
	padding-top:40px !important;
}
.header_wrap{
	position:static !important;
}
.custom_wrap{
	padding:30px 0 !important;
}
.top_design_text_wrap{
	position:fixed;
	width:100%;
	top:0;
	left:0;
	text-align:center;
	background:#2e3337;
	height:24px;
	line-height:24px;
	padding:8px 0;
	font-size:14px;
	color:#fff;
	box-shadow:0 2px 5px rgba(0,0,0,0.3);
	z-index:99999;
	font-family:Arial;
	line-height:1.5;
	_position:absolute;
	_top: expression(documentElement . scrollTop);
}
.top_design_text_wrap a{
	display:inline-block;
	font-weight:700;
	color:#dedede;
	background:#585c5f;
	padding:0 15px;
	border-radius:3px;
	margin-left:10px;
	cursor:pointer;
}
</style>
<div class="top_design_text_wrap">
	您可以可直接管理模块或模块数据&nbsp;&nbsp;
	<a id="J_design_submit" data-action="{{ url('design/design/dosavepage') }}" class="quit">保存</a>
	<a id="J_design_quit" href="{{ url('design/design/doexit') }}" class="quit">退出</a>
</div>
<!--# } #-->
	<div id="J_design_move_temp" tabindex="0" style="display:none;cursor:move;text-align:right;position:absolute;z-index:99999;width:120px;height:15px;border:2px dashed #ccc;"><div style="width:100%;height:100%;"></div></div>
	<!-- 编辑弹窗 -->
	
	
	<div class="core_pop_wrap" id="J_layout_edit_pop" style="z-index:99999;display:none;">
				<div class="core_pop">
					<div class="pop_top J_drag_handle"><a href="" class="pop_close" id="J_layout_edit_close">关闭</a><strong id="J_design_name">模块管理</strong></div>
					<div class="pop_design">
						<div class="pop_design_hd">
							<a href="" class="del" id="J_design_del">删除该模块</a>
							<ul class="tabs_nav" id="J_layout_edit_nav">
								<li style="display:none;" id="J_tabnav_data"><a id="J_moudel_data" href="{{ url('design/data/run') }}" data-role="module">显示内容</a></li>
								<li style="display:none;" id="J_tabnav_push"><a href="{{ url('design/data/push') }}" data-role="module">推送审核</a></li>
								<li style="display:none;" id="J_tabnav_add"><a href="{{ url('design/data/add') }}" data-role="module">添加内容</a></li>
								<li style="display:none;" id="J_layouttitle"><a data-type="title" data-role="layouttitle">标题</a></li>
								<li style="display:none;" id="J_tabnav_title"><a href="{{ url('design/title/edit') }}" data-type="title" data-role="module">标题</a></li>
								<li style="display:none;" id="J_moduletitle"><a data-type="title" data-role="modttitle">标题</a></li>
								<li style="display:none;" id="J_layoutstyle"><a data-role="layoutstyle">样式</a></li>
								<li style="display:none;" id="J_tabnav_style"><a href="{{ url('design/style/edit') }}" data-role="module">样式</a></li>
								<li style="display:none;" id="J_moduleproperty_add"><a data-role="">属性</a></li>
								<li style="display:none;" id="J_tabnav_property"><a href="{{ url('design/property/edit') }}" data-role="module">属性</a></li>
								<li style="display:none;" id="J_tabnav_template"><a href="{{ url('design/template/edit') }}" data-role="module">模板</a></li>
							</ul>
						</div>
						<div class="tabs_contents" id="J_layout_edit_contents">
							<div id="J_tabct_data"><div class="pop_loading"></div></div>
							<div id="J_tabct_push"><div class="pop_loading"></div></div>
							<div id="J_tabct_add"><div class="pop_loading"></div></div>
							<div id="J_tabct_layouttitle"><div class="pop_loading"></div></div>
							<div id="J_tabct_title"><div class="pop_loading"></div></div>
							<div id="J_tabct_moduletitle"><div class="pop_loading"></div></div>
							<div id="J_tabct_layoutstyle"><div class="pop_loading"></div></div>
							<div id="J_tabct_style"><div class="pop_loading"></div></div>
							<div id="J_tabct_moduleproperty_add"><div class="pop_loading"></div></div>
							<div id="J_tabct_property"><div class="pop_loading"></div></div>
							<div id="J_tabct_template"><div class="pop_loading"></div></div>
						</div>
					</div>
					
				</div>
	</div>

<!-- 导出 -->
	<div class="core_pop_wrap J_menu_pop" id="J_design_export_pop" style="z-index:99999;display:none;width:300px;">
			<div class="core_pop">
				<div class="pop_top J_drag_handle"><a href="" class="pop_close J_pop_close">关闭</a><strong id="J_design_name">导出模版</strong></div>
				<div>
					<div class="p20">
							<p class="">编码格式：<label class="mr10"><input type="radio" value="gbk" {{ App\Core\Tool::ifcheck(Core::V('charset') == 'GBK') }} name="charset">GBK</label><label><input type="radio" value="utf-8" {{ App\Core\Tool::ifcheck(Core::V('charset') == 'UTF-8') }} name="charset">UTF-8</label></p>
						</div>
						<div class="pop_bottom">
							<a class="btn btn_submit" href="{{ url('design/export/dorun') }}" id="J_design_export_btn">导出</a>
						</div>
				</div>
		</div>
	</div>

<!-- 导入 -->
	<div class="core_pop_wrap J_menu_pop" id="J_design_import_pop" style="z-index:99999;display:none;width:300px;">
			<div class="core_pop">
				<div class="pop_top J_drag_handle"><a href="" class="pop_close J_pop_close">关闭</a><strong id="J_design_name">导入模块</strong></div>
				<div>
					<form id="J_design_import_form" method="post" action="{{ url('design/import/dorun?_json=1') }}">
						<div class="p20">
							<input type="file" name="file" class="length_4 mb5">
							<p class="gray">导入后将不可恢复备份！</p>
							<p class="gray">系统页面可导入txt文件；</p>
							<p class="gray">新建页面可导入zip文件和txt文件。</p>
							<p class="gray">导入zip文件将会清空当前页面的模块。</p>
						</div>
						<div class="pop_bottom">
							<button class="btn btn_submit" type="submit">导入</button>
							<input type="hidden" name="step" value="1">
						</div>
					</form>
				</div>
		</div>
	</div>

<!-- 模块编辑 -->
<div class="mode_edit" style="" id="J_mode_edit">
	<div class="hd"><h2 id="J_mode_edit_tit"></h2><a id="J_mode_edit_btn" href="">模块编辑</a></div>
</div>
<!-- 结构编辑 -->
<a href="" id="J_layout_edit" class="layout_edit" style="display:none;">结构编辑</a>
<!-- 标题编辑 -->
<a href="{{ url('design/structure/edit') }}" id="J_mod_tit_edit" class="layout_edit" style="display:none;position:absolute;">标题编辑</a>


<input type="hidden" id="J_moduleid">

<!--====================头部模块设计菜单结束==================-->
<script>
var LAYOUT_EDID_TITLE = '{{ url('design/structure/title') }}',
	LAYOUT_EDID_STYLE	= '{{ url('design/structure/style') }}',
	MODULE_EDIT_JUDGE = '{{ url('design/design/getmodulepermissions') }}',						//模块编辑
	MODULE_BOX_UPDATE = '{{ url('design/design/module') }}',										//模块内容列表更新
	MODULE_BOX_DEL = '{{ url('design/property/delete') }}',										//模块删除
	MODULE_ADD_TAB = '{{ url('design/property/gettab') }}',										//模块添加tab判断
	DESIGN_LOCK = '{{ url('design/design/lockdesign') }}', 										//编辑锁定轮循
	DESIGN_MODELS = {{ Security::escapeEncodeJson($models) }};

Wind.ready('global.js', function(){
	Wind.use('ajaxForm', 'draggable', function() {
		//scrollFixed
		Wind.js(GV.JS_ROOT +'pages/design/design_index.js?v='+ GV.JS_VERSION);
	});
});
</script>