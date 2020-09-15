<!doctype html>
<html>
<head>
@include('common.head')
<link href="{{ asset('assets/themes/site/default/css/dev/article.css') }} "rel="stylesheet" />
</head>
<body>
<div class="wrap">
{{-- @include('common.header') --}}
	<div class="main_wrap">
		<div class="bread_crumb">
			<a href="{{ url() }}" class="home" title="{{ Core::C('site', 'info.name') }}">首页</a><em>&gt;</em><a href="{{ url('my/article/run') }}">帖子</a><em>&gt;</em><a href="{{ url('my/article/run') }}">我的主题</a>
		</div>
		<div class="main cc">
			<div class="main_body">
				<div class="main_content">
					<div class="box_wrap thread_page">
					<nav>
						<div class="content_nav">
							<ul>
								<li class="current"><a href="{{ url('my/article/run') }}">我的主题</a></li>
								<li><a href="{{ url('my/article/reply') }}">我的回复</a></li>
							</ul>
						</div>
					</nav>
						<div class="thread_posts_list">

@if ($threads)

							<table width="100%" summary="帖子列表" class="mb10">

@foreach ($threads as $value)
$value['created_time'] = App\Core\Tool::time2str($value['created_time'],'auto');
								$value['lastpost_time'] = App\Core\Tool::time2str($value['lastpost_time'],'auto');
								#-->
								<tr>
									<td class="subject">
										<p class="title">
											<span class="posts_icon"><i class="icon_topic"></i></span>
											<!--span class="posts_icon"><i class="icon_{{ $value['icon'] }}" title="{{ $icon[$value['icon']] }}"></i></span-->

@if($value['topic_type'])

											<em class="s4">[<a href="{{ url('bbs/thread/run?fid=' . $value['fid'] . '&type=' . $value['topic_type']) }}" class="s4" target="_blank">{!! $topictypes[$value['topic_type']]['name'] !!}</a>]</em>
											<!--#}#-->
											<a href="{{ url('bbs/read/run?tid=' . $value['tid'] . '&fid=' . $value['fid']) }}" class="st" style="/*{$value['highlight_style']}*/" target="_blank">{{ $value['subject'] }}</a>
@if ($value['disabled'])
<span class="red">(审核中)</span><!--# } #-->
										</p>
										<p class="info">
											<span>{{ $value['created_time'] }}</span>
											最后回复：<a class="J_user_card_show" data-uid="{{ $value['lastpost_userid'] }}" href="{{ url('space/index/run?uid=' . $value['lastpost_userid']) }}">{{ $value['lastpost_username'] }}</a> <span><a href="{{ url('bbs/read/run?tid=' . $value['tid'] . '&fid=' . $value['fid'] . '&page=e') }}#a" aria-label="最后回复时间">{{ $value['lastpost_time'] }}</a></span>
										</p>
									</td>
									<td class="num">
										<span>回复<em>{{ $value['replies'] }}</em></span>
										<span>浏览<em>{{ $value['hits'] }}</em></span>
									</td>
								</tr>
								<!--# } #-->
							</table>
							<page tpl='TPL:common.page' page='$page' count='$count' per='$perpage' url='my/article/run' />

@else

							<div class="not_content">啊哦，您暂没有发布任何主题哦！</div>
							<!--# } #-->
						</div>
					</div>
				</div>
			</div>
			<div class="main_sidebar">
				@include('common.sidebar_2')
			</div>
		</div>
	</div>
{{--  @include('common.footer') --}}
</div>
<script>
Wind.use('jquery', 'global');
</script>
</body>
</html>