<!doctype html>
<html>
<head>
@include('common.head')
<link href="{{ asset('assets/themes/site/default/css/dev/tag.css') }} "rel="stylesheet" />
</head>
<body>

<div class="wrap">
{{-- @include('common.header') --}}
	<div class="main_wrap">

		<div class="bread_crumb">
			<a href="{{ url() }}" class="home" title="{{ Core::C('site', 'info.name') }}">首页</a><em>&gt;</em><a href="{{ url('tag/index/run') }}">话题</a><em>&gt;</em><a href="{{ url('tag/index/my') }}">我关注的话题</a>
		</div>

		<nav>
			<div class="tag_nav">
				<ul class="cc">
					<li><a href="{{ url('tag/index/run') }}">热门话题</a></li>
					<li class="current"><a href="{{ url('tag/index/my') }}">我关注的话题</a></li>
				</ul>
			</div>
		</nav>
		<div class="main cc">
			{{-- <advertisement id='Common.Topic.Top' sys='1'/> --}}
			<div class="main_body">
				<div class="main_content">

					<div class="tag_page box_wrap">

@if ($myTagsCount)


@foreach($tagContents as $k=>$v)
if(!$v) continue; #-->
					<div id="J_tag_item_{{ $k }}" class="J_tag_items">
						<div class="hd J_tag_items_hd">
							<a data-id="{{ $k }}" class="J_unfollow fr" href="{{ url('tag/index/attention?type=del&id=' . $k) }}">取消关注</a>
							<h2><a href="{{ @url:/tag/index/view?name=$myTagsList[$k]['tag_name'] }}">{{ $myTagsList[$k]['tag_name'] }} ({$myTagsList[$k]['content_count']})</a></h2>
						</div>
						<div class="tag_lists_wrap">

@if ($v)


@foreach($v as $k2=>$v2)
if (!$v2) continue;
							#-->
							<dl class="cc">
								<dt class="face"><a href="{{ url('space/index/run?uid=' . $v2['created_userid']) }}" class="J_user_card_show" data-uid="{{ $v2['created_userid'] }}"><img class="J_avatar" src="{{ App\Core\Tool::getAvatar($v2['created_userid'], 'small') }}" data-type="small" width="50" height="50" alt="{{ $v2['created_username'] }}" /></a></dt>
								<dd class="text_content">
									<div class="content">
										<a href="{{ url('space/index/run?uid=' . $v2['created_userid']) }}" class="name J_user_card_show" data-uid="{{ $v2['created_userid'] }}">{{ $v2['created_username'] }}</a>：
										<a href="{{ url('bbs/read/run?tid=' . $v2['tid'] . '&fid=' . $v2['fid']) }}" target="_blank" class="title">{{ $v2['subject'] }}</a>
										<div class="descrip">{{ App\Core\Tool::substrs(App\Core\Tool::stripWindCode($v2['content'],true),125) }}</div>
									</div>
									<div class="info">
										<span class="time"><!--# echo pw::time2str($v2['created_time'],'auto');  #--></span>&nbsp;来自版块&nbsp;-&nbsp;<a href="{{ url('bbs/thread/run?fid=' . $v2['fid']) }}" target="_blank">{!! $v2['forum_name'] !!}</a>

@if($relatedTags[$v2['tid']])

										<span>

@foreach($relatedTags[$v2['tid']] as $k3=>$v3)
if ($k3==$k) continue; #-->
											<a href="{{ url('tag/index/view?name=' . $v3['tag_name']) }}">{{ $v3['tag_name'] }}</a>
											<!--# } #-->
										</span>
										<!--# } #-->
									</div>
								</dd>
							</dl>
							<!--# } #-->
						<!--# } #-->
						</div>
					</div>
					<!--# } #-->

@if ($moreTags)

						<div class="tag_more_list" id="tag_more_list">
							<ul class="cc">

@foreach($moreTags as $k=>$v)

									<li><a href="{{ url('tag/index/view?name=' . $v['tag_name']) }}">{{ $v['tag_name'] }}</a><em>({$v['content_count']})</em></li>
							<!--# } #-->
							</ul>
						</div>
					<!--# } #-->

@else

					<div class="not_content">
						啊哦，您还没有关注任何话题哦！试试去<a href="{{ url('tag/index/run') }}">关注几个</a>话题！
					</div>
				<!--# } #-->
					</div>
				</div>
				<div>
					<page tpl="TPL:common.page" page="$page" per="$perpage" count="$count" url="/tag/index/my" />
				</div>
				{{-- <advertisement id='Common.Topic.Btm' sys='1'/> --}}
			</div>
			<div class="main_sidebar">
				@include('common.sidebar_1')
				@include('tag.index_my_model')
				@include('tag.index_hot_model')
			</div>
		</div>
	</div>
{{--  @include('common.footer') --}}
</div>
<script>
Wind.use('jquery', 'global', function(){
	var unfollow_btn = $('a.J_unfollow');
	
	unfollow_btn.on('click', function(e){
		e.preventDefault();
		
		var $this = $(this);

		$.getJSON($this.attr('href'), function(data){

			if(data.state === 'success') {
				//写入相对的信息
				$('#J_tag_item_'+ $this.data('id')).slideUp('slow', function(){
					$(this).remove();

					if(!$('.J_tag_items').length) {
						location.reload();
					}
				});
			}else if(data.state === 'fail') {
				resultTip({
					error : true,
					msg : data.message
				});
			}
		});
	});
	
	Wind.use(GV.JS_ROOT +'pages/tag/tag_index.js?v=' + GV.JS_VERSION);
});
</script>

</body>
</html>
