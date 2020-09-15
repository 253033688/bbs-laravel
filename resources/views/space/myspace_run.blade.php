<style>
/*
===================
设置弹窗
===================
*/
.pop_space_edit{
	width:480px;
	height:365px;
}
/*遮罩*/
.pop_space_edit_bg{
	left:0;
	top:0;
	height:100%;
	width:100%;
	position:absolute;
	background:#000;
	filter:alpha(opacity=40);
	-moz-opacity:0.4;
	opacity:0.4;
}
/*设置tab*/
.pop_nav {
	padding:10px 15px 0;
	margin-bottom:10px;
}
.pop_nav ul{
	border-bottom:1px solid #e3e3e3;
	padding:0 5px;
	height:25px;
	clear:both;
}
.pop_nav ul li{
	float:left;
	margin-right:10px;
}
.pop_nav ul li a{
	float:left;
	display:block;
	padding:0 10px;
	height:25px;
	line-height:23px;
}
.pop_nav ul li.current a{
	border:1px solid #e3e3e3;
	border-bottom:0 none;
	color:#333;
	font-weight:700;
	background:#fff;
	position:relative;
	border-radius:2px;
	margin-bottom:-1px;
}
/*隐私*/
.core_pop_wrap .a_privacy{
	float:right;
	clear:right;
	color:#333333;
	margin-top:-24px;
	padding-left:20px;
	background:url({@G:url.images}/myspace/lock.png) no-repeat;
}
/*基本信息*/
.pop_space_edit .pop_cont{
	height:230px;
	padding:0 10px;
}
.pop_space_edit dt{
	text-align:left;
	width:65px;
	padding-left:10px;
}
.pop_space_edit dd.enter{
	overflow:hidden;
}
/*取消背景图*/
.pop_space_edit .del{
	float:left;
	margin:5px 0 0 0;
	color:#105cb6;
	padding-left:12px;
	background:url({@G:url.images}/myspace/close.png) 0 4px no-repeat;
	cursor:pointer;
}
.pop_space_edit .del:hover{
	background-position:0 -21px;
}
/*
===================
模板选择列表
===================
*/
.pop_space_themes {
	padding:0;
	overflow:hidden;
}
.pop_space_themes h2{
	font-size:12px;
	font-weight:100;
	margin-bottom:5px;
}
.pop_space_themes ul{
	margin-left:-3px;
}
.pop_space_themes li{
	float:left;
	width:142px;
	height:95px;
	margin-left:10px;
	margin-bottom:5px;
	overflow:hidden;
}
.pop_space_themes li a{
	float:left;
	border:1px solid #cccccc;
	width:140px;
	height:93px;
	color:#fff;
	overflow:hidden;
}
.pop_space_themes li a:hover,
.pop_space_themes li.current a{
	border:1px solid #f50;
	text-decoration:none;
}
.pop_space_themes li a img{
	width:140px;
}
/*背景缩略图*/
.thumb_img{
	border:1px solid #ccc;
	background:#f7f7f7;
	width:160px;
	height:100px;
	float:left;
	margin-right:10px;
}

/*
===================
模板分页
===================
*/
.space_themes_pages{
	padding:7px 5px 0;
	font-family:Simsun;
	float:right;
	height:17px;
}
.space_themes_pages a{
	padding:0 5px;
	display:block;
	background:#ececec;
	margin-left:10px;
	float:left;
	line-height:17px;
	height:17px;
}
.space_themes_pages a:hover{
	background:#e1e1e1;
	text-decoration:none;
}
.space_themes_pages a.current{
	color:#333;
	background:none;
}
.space_themes_pages a.next,
.space_themes_pages a.pre{
	width:17px;
	height:17px;
	overflow:hidden;
	text-indent:-2000em;
	padding:0;
	background:url({@G:url.images}/myspace/themes_pages.png) no-repeat;
}
.space_themes_pages a.next:hover{
	background-position:0 -38px;
}
.space_themes_pages a.pre{
	background-position:0 -114px;
}
.space_themes_pages a.pre:hover{
	background-position:0 -152px;
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
</style>
<!--======================空间设置弹窗=======================-->
	<div class="pop_space_edit">
		<div class="pop_top">
			<a href="#" class="pop_close J_close">关闭</a>
			<strong>空间设置</strong>
		</div>
		<div class="pop_nav">
			<ul id="J_space_pop_nav" class="cc">
				<li class="current"><a href="">基本信息</a></li>
				<li><a href="">模板设置</a></li>
				<li><a href="">自定义背景</a></li>
			</ul>
			<a href="{{ url('profile/secret/run?_left=secret') }}" class="a_privacy">隐私设置</a>
		</div>
			
<!--=====基本信息=====-->
	<div id="J_space_pop_content">
		<div>
			<form action="{{ url('space/myspace/doeditspace') }}" method="post">
			<div class="pop_cont">
				<div id="J_edit_tip" style="display:none;"></div>
				<dl class="cc">
					<dt>空间名称：</dt>
					<dd><input type="text" id="J_spacename" class="input length_5 mr10" name="spacename" value="{{ $space->space['space_name'] }}"/><span class="s6">限20字</span></dd>
				</dl>
				<dl class="cc">
					<dt>空间简介：</dt>
					<dd class="enter"><textarea id="J_descrip" class="length_5 mr10" name="descrip">{{ $space->space['space_descrip'] }}</textarea>
					<span class="s6">限250字</span></dd>
				</dl>

@if(isset($spaceroot))

				<dl class="cc">
					<dt>个性域名：</dt>
					<dd class="enter">
					http://<input id="J_domain" type="text" class="input length_1" name="domain" value="{{ $spacedomain }}"/>
					<span class="mr15">.{{ $spaceroot }}</span>
					<button data-url="{{ url('space/myspace/allowdomain') }}" class="btn mr10" id="J_check_domain" type="button">校验</button>
					<span class="s6">保存后不可修改</span>
					<input id="J_root" type="hidden" name="spaceroot" value="{{ $spaceroot }}">
					</dd>
				</dl>
				<!--#}#-->
			</div>
			<div class="pop_bottom">
				<button type="submit" class="btn btn_submit" id="J_editspace_sub">保存</button>
				<button type="button" class="btn J_close">取消</button>
			</div>
			</form>
		</div>
<!--=====模板设置=====-->
		<div style="display:none;">
			<form class="J_space_pop_form" action="{{ url('space/myspace/doeditstyle') }}" method="post">
			<div class="pop_cont">
				<div class="pop_space_themes">
					<div style="height:196px;overflow:hidden;">
						<ul class="cc" id="J_temp_list" style="position:relative;width:458px;">
				<!--# 
					$i = 0;
					foreach($list AS $value){
				#-->
					<!--# 
						$class = ($space->space['space_style'] == $value['alias']) ? 'current' : '';
						if ($space->space['space_style'] == $value['alias']) $currentId =  $value['id'];
						if(strpos($value['logo'],'http://') === false) {
							$img = $themeUrl . '/' . $value['alias'] . '/' . $value['logo'];
						} else {
							$img = $value['logo'];
						}
						
					#-->
							<li class="{{ $class }}">

@if ($i < $perpage)

							<a data-id="{{ $value['app_id'] }}" href="{{ url('space/index/demo?id=' . $value['app_id'] . '&uid=' . $space->spaceUid) }}"><img src="{{ $img }}" alt="{{ $value['name'] }}" title="{{ $value['name'] }}" /></a>

@else

							<a data-id="{{ $value['app_id'] }}" href="{{ url('space/index/demo?id=' . $value['app_id'] . '&uid=' . $space->spaceUid) }}"><img data-src="{{ $img }}" alt="{{ $value['name'] }}" title="{{ $value['name'] }}" /></a>
					<!--# } #-->
							</li>
				<!--#
					$i++;
					}
				#-->
						
						</ul>
					</div>
				</div>

@if ($totalpage > 1)

				<div class="space_themes_pages">
					<a href="" class="pre J_temp_pn" data-role="prev">上一页</a><span id="J_temp_page">
					<!--# for($p = 1; $p <= $totalpage; $p ++){ #-->

@if ($p == 1)

							<a href="" class="current">{{ $p }}</a>

@else

							<a href="">{{ $p }}</a>
						<!--# } #-->
					<!--# } #-->
					</span><a href="" class="next J_temp_pn" data-role="next">下一页</a>
				</div>
				<!--# } #-->
			</div>
			<div class="pop_bottom">
				<button type="submit" class="btn btn_submit">保存</button>
				<button type="button" class="btn J_close" id="J_refresh">取消</button>
				<input type="hidden" name="id" value="{{ $currentId }}" id="J_styleid"/>
			</div>
			</form>
		</div>
<!--=====自定义背景=====-->
		<div style="display:none;">
			<form class="J_space_pop_form" action="{{ url('space/myspace/doeditbackground?_json=1') }}" method="post">
			<!--# 
				list($image, $repeat, $fixed, $align) =  $space->space['back_image'];		
			#-->
				<div class="pop_cont">
					<dl class="cc">
						<dt>背景图片：</dt>
						<dd>
							<!--[if gt IE 9]><!-->
							<div class="thumb_img" style="">

@if ($image)

								<img src="{{Core::V('attach') }}/{{ $image }}" id="J_space_bg_preview" width="160" height="100" alt="" class="J_previewImg" />

@else

								<img src="{{ asset('assets') }}/images/blank.gif" id="J_space_bg_preview" width="160" height="100" alt="" class="J_previewImg" />
								<!--# } #-->
								<input type="hidden" name="background" value="{{ $image }}" id="J_space_bg_saved">
							</div>
							<div class="fl" style="width:200px;">
								<div class="single_image_up" style="margin:0 0 10px 0"><a href="javascript:;">上传图片</a><input name="back_image" type="file" id="J_custom_thumb"></div>
								<div class="s6 mb5">支持jpg,png,gif格式，<br />最大不能超过2MB</div>
								<span class="del" id="J_space_bg_cancl" style="display:none;">取消背景图片</span>
							</div>
							<!--<![endif]-->
							<!--[if IE]>
								<div style="margin:0 0 10px 0"><input name="back_image" type="file" id="J_custom_thumb"></div>
								<div class="s6 mb5">支持jpg,png,gif格式，最大不能超过2MB</div>
								<input type="hidden" name="background" value="{{ $image }}" id="J_space_bg_saved">
								<span class="del" id="J_space_bg_cancl" style="display:none;">取消背景图片</span>
							<![endif]-->
						</dd>
					</dl>
					<dl class="cc" style="padding:5px 0;">
						<dt>背景设置：</dt>
						<dd>
							<div class="pick_list" id="J_bg_position">
								<a data-val="" href="" class="{{ App\Core\Tool::isCurrent($repeat == 'no-repeat' && $fixed == 'scroll') }}">正常</a>
								<a data-val="fixed" href="" class="{{ App\Core\Tool::isCurrent($fixed == 'fixed') }}">锁定</a>
								<a data-val="repeat" href="" class="{{ App\Core\Tool::isCurrent($repeat == 'repeat') }}">平铺</a>
							</div>
						</dd>
					</dl>
					<dl class="cc" style="padding:5px 0;">
						<dt>对齐方式：</dt>
						<dd>
							<div class="pick_list" id="J_bg_align">
								<a data-val="left" href=""  class="{{ App\Core\Tool::isCurrent($align == 'left') }}">居左</a>
								<a data-val="center" href="" class="{{ App\Core\Tool::isCurrent($align == 'center') }}">居中</a>
								<a data-val="right" href=""  class="{{ App\Core\Tool::isCurrent($align == 'right') }}">居右</a>
							</div>
						</dd>
					</dl>
				</div>
				<div class="pop_bottom">
					<input type="hidden" name="repeat" value="{{ $repeat }}" id="J_bg_repeat_input" />
					<input type="hidden" name="fixed" value="{{ $scroll }}" id="J_bg_attachment_input" />
					<input type="hidden" name="align" value="{{ $center }}" id="J_bg_position_input" />
					<button type="submit" class="btn btn_submit">保存</button>
					<button type="button" class="btn J_close">取消</button>
					<input type="hidden"  name="styleid" value="{{ $space->space['space_style'] }}"/>
				</div>
			</form>
		</div>

<!--=====结束=====-->
	</div>
</div>