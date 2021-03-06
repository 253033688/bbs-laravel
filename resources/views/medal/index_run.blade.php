<!doctype html>
<html>
<head>
@include('common.head')
<link href="{{ asset('assets/themes/site/default/css/dev/medal.css') }} "rel="stylesheet" />
</head>
<body>
<div class="wrap">
{{-- @include('common.header') --}}
	<div class="main_wrap">
		<div class="bread_crumb">
			<a href="{{ url() }}" class="home" title="{{ Core::C('site', 'info.name') }}">首页</a><em>&gt;</em><a href="{{ url('medal/index/run') }}">勋章</a><em>&gt;</em><a href="{{ url('medal/index/run') }}">我的勋章</a>
		</div>
		<div class="main cc">
			<div class="main_body">
				<div class="main_content">
					<div class="box_wrap medal_page">
					<nav>
						<div class="content_nav">
							<ul>
								<li class="current"><a href="{{ url('medal/index/run') }}">我的勋章</a></li>
								<li><a href="{{ url('medal/index/center') }}">勋章中心</a></li>
								<li><a href="{{ url('medal/index/order') }}">勋章排行</a></li>
							</ul>
						</div>
					<nav>
						<div id="J_medal_card_wrap" class="medal_content">

@if (!$alreadyAll)
$disable = $count < 4 ? 'next_disable' : '';
							#-->
							<div class="medal_unshow_list">
								<div class="hd">
									<h2>未展示的勋章</h2><span>（共{$count}枚）</span>
								</div>

@if (!$myList_w)

								<p>您还有勋章没有申请哦，赶紧去申请个吧！ <a href="{{ url('medal/index/center') }}#medal_manual">点击申请</a><p>

@else

								<div id="J_medal_unshow" class="cc">
									<div class="pre J_lazyslide_prev pre_disable">上一组</div>
									<div class="ct" style="overflow:hidden;">
									<ul class="J_lazyslide_list" style="width:9999px;">

@foreach ($myList_w as $key=>$my)


@if($my['award_status'] <= 1)

										<li class="doing">

@else

										<li>
									<!--# } #-->
											<a data-role="show" data-id="{{ $my['medal_id'] }}" class="J_medal_card" href="{{ url('medal/index/show?medalid=' . $my['medal_id'] . '&pop=wei') }}"><img src="{{ $my['image'] }}" width="96" height="96" alt="{{ $my['name'] }}" /></a>
											<p title="{{ $my['name'] }}">{{ $my['name'] }}</p>

@if($my['award_status'] == 1)

											<button class="btn disabled" type="button" disabled>进行中</button>

@elseif($my['award_status'] == 2)

											<button class="btn disabled" type="button" disabled>等待审核</button>

@elseif($my['award_status'] == 3)

											<a data-role="receive" href="{{ url('medal/index/show?medalid=' . $my['medal_id'] . '&pop=wei') }}" data-logid="{{ $my['log_id'] }}" data-id="{{ $my['medal_id'] }}" class="btn btn_success J_medal_card">领取</a>

@else

											<button class="btn disabled" type="button" disabled>进行中</button>
											<!--# } #-->
										</li>
									<!--# } #-->
										
									</ul>
									</div>
									<div class="next J_lazyslide_next {{ $disable }}">下一组</div>
								</div>
								<!--# } #-->
							</div>
							<!--# } #-->
					
			
							<!--设置排序时，样式变成 medal_show_sort -->
							<!--# $count = count($myList_y);
							if ($count > 0){#-->
							<div id="J_medal_show_wrap" class="medal_show_list">
								<form id="J_medal_order_form" action="{{ url('medal/index/doOrder') }}" method="post">
								<div class="hd">

@if ($count > 1)

									<div class="fr" style="display:none;" id="J_order_wrap">
										<button id="J_medal_order_sub" type="submit" class="btn btn_submit">保存</button>
										<a id="J_order_cancl" href="#" class="btn">取消</a>
									</div>
									<div class="fr"><a id="J_show_order_btn" href="#" class="btn btn_submit">设置排序</a></div>
									<!--# } #-->
									<h2>已展示的勋章</h2><span>（共{$count}枚）</span>
								</div>
								<div class="ct" style="">
								<ul id="J_medal_show_list" class="cc" style="position:relative;">

@foreach ($myList_y as $key=>$my)

									<li style="position:relative;z-index:1;">
										<a data-role="show" data-id="{{ $my['medal_id'] }}" class="J_medal_card" href="{{ url('medal/index/show?medalid=' . $my['medal_id'] . '&pop=yi') }}">
											<img src="{{ $my['image'] }}" width="96" height="96" alt="{{ $my['name'] }}" />
											<p title="{{ $my['name'] }}">{{ $my['name'] }}</p>
										</a>
										<input type="hidden" name="id[]" value="{{ $my['log_id'] }}" />
										<input type="hidden" name="order[]" value="" class="J_medal_order" />
									</li>
								<!--# } #-->
								</ul>
								</div>
								</form>
							</div>
							<!--# } #-->
							<!-- <div class="not_content">啊哦，您还没有申请勋章哦，赶紧<a href="">去申请个</a>吧！</div> -->
						</div>
					</div>
				</div>
			</div>
			<div class="main_sidebar">
				@include('common.sidebar_1')
			</div>
		</div>
	</div>
{{--  @include('common.footer') --}}
</div>
<script>


var MEDAL_JSON = {{ Security::escapeEncodeJson($medalJson) }},																									//所有未展示勋章数据
	MEDAL_SHOW = "{{ url('medal/index/show?pop=wei') }}",
		MEDAL_COUNT = '{{ @count($myList_y) }}',																							//已领取勋章数
		MEDAL_APPLY_URL = '{{ url('medal/index/doApply/') }}',			//勋章申请url
		MEDAL_AWARD_URL = '{{ url('medal/index/doAward/') }}',			//勋章领取url
		MEDAL_PAGE_URL = '{{ url('medal/index/run') }}',						//勋章应用的链接地址
		medel_data = {};

Wind.use('jquery', 'global', 'lazySlide', 'ajaxForm', function(){

	var medal_unshow_arr = [],
			medal_unshow = '<li class="_CLS" id="_ID"><a class="J_medal_card" data-id="_ID" data-role="show" href="'+ MEDAL_SHOW +'&medalid=_ID"><img src="_SRC" width="96" height="96"></a><p title="_NAME">_NAME</p>_BTN</li>',
			medal_data_len = MEDAL_JSON.length;

	for(i=0;i<medal_data_len;i++){

		var o = MEDAL_JSON[i],
				status = parseInt(o.status),
				medal_btn,
				cls = '';

		//创建以id为键的数据对象
		medel_data[o.id] = o;

		if(status < 4) {

			//所有未展示的勋章勋章
			if(status === 3) {
				medal_btn = '<a data-id="'+ o.id +'" class="btn btn_success J_medal_card" data-role="receive" type="button">领取</a></li>';
			}else if(status === 2){
				medal_btn = '<button class="btn disabled" type="button">等待审核</button>';
			}else if(status === 0){
				medal_btn = '<button class="btn disabled" type="button">进行中</button>';
				cls = 'doing';
			}else if(status === 1){
				medal_btn = '<button class="btn disabled" type="button">未完成</button>';
				cls = 'doing';
			}

			medal_unshow_arr.push(medal_unshow.replace('_CLS', cls).replace(/_ID/g, o.id).replace('_SRC', o.big).replace(/_NAME/g, o.name).replace('_BTN', medal_btn));
		
		}
	}


	//滚动组件
	setTimeout(function(){
		$('#J_medal_unshow').lazySlide({
			step_length	: 4,									//一次滚动个数
			html_arr : medal_unshow_arr,			//滚动加载html数组
			dis_cls_prev : 'pre_disable',
			dis_cls_next : 'next_disable'
		});
	},200);
	

	//点击设置排序
	var medal_show_wrap = $('#J_medal_show_wrap'),
		medal_show_list = $('#J_medal_show_list');
	$('#J_show_order_btn').on('click', function(e){
		e.preventDefault();
		
		//样式切换
		medal_show_wrap.addClass('medal_show_sort');
		
		//备份html
		medal_show_list.data('clone', medal_show_list.clone());
		
		var $this = $(this);
			
		$this.parent().hide().siblings('#J_order_wrap').show();
		
		//写入拖拽clcas
		medal_show_list.find('a').addClass('J_medal_order').removeClass('J_medal_card');

		//拖拽排序
		if(!$.fn.dragsort) {
			Wind.use('dragsort', function(){
				medal_show_list.dragsort({ dragSelector: "a.J_medal_order", placeHolderTemplate: '<li style="position:relative;z-index:1;"><a href="javascript:;" style="height:103px;"></a></li>' });
			});
		}
		
	});

	medal_show_list.on('click', 'a.J_medal_order', function(e){
		e.preventDefault();
	});
	
	
	//提交排序
	$('#J_medal_order_sub').on('click', function(e){
		e.preventDefault();
		$.each(medal_show_list.children('li'), function(i, o){
			$(o).find('input.J_medal_order').val(i+1);
		});
		
		$('#J_medal_order_form').ajaxSubmit({
			dataType : 'json',
			success : function(data){
				if(data.state === 'success') {
					Wind.Util.resultTip({
						msg : data.message,
						callback : function(){
							window.location.reload();
						}
					});
				}else if(data.state === 'fail'){
					Wind.Util.resultTip({
						error : true,
						msg : data.message
					});
				}
			}
		})
	});
	
	//取消设置排序
	$('#J_order_cancl').on('click', function(e){
		e.preventDefault();
		
		//样式切换
		medal_show_wrap.removeClass('medal_show_sort');
		
		//恢复html
		medal_show_list.html(medal_show_list.data('clone').html());
		
		$('#J_order_wrap').hide().siblings(':hidden').show();
	});
	
	Wind.js(GV.JS_ROOT+'pages/medal/medal.js?v=' + GV.JS_VERSION);
});

</script>
</body>
</html>