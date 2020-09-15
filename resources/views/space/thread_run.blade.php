<!doctype html>
<html>
<head>
@include('common.head')
<link href="{{ asset('assets/themes/site/default/css/dev/style.css') }} "rel="stylesheet" />
</head>
<body {!! $space->space['backbround'] !!}>
<div class="wrap">
{{-- @include('common.header') --}}
<div class="space_page">
	@include('space.common.nav')

	<div class="cc">
		<div class="space_content">
<!--我的帖子-->
			<div class="box">
				<div class="my_article">
					<div class="hd"><h2 class="name">{{ $host }}的帖子</h2><a href="{{ url('space/thread/run?uid=' . $space->spaceUid) }}" class="current">主题</a><span class="line">|</span><a href="{{ url('space/thread/post?uid=' . $space->spaceUid) }}">回复</a></div>
					<div class="ct">

@if ($threads)

						<table width="100%" class="mb10">
							<thead>
								<tr>
									<td class="subject">帖子标题</td>
									<td class="time">发布时间</td>
									<td class="num">回复/人气</td>
								</tr>
							</thead>

@foreach ($threads as $value)
$value['created_time'] = App\Core\Tool::time2str($value['created_time'],'auto');
					$value['lastpost_time'] = App\Core\Tool::time2str($value['lastpost_time'],'auto');
					#-->
							<tr>
								<td class="subject">
								<span class="posts_icon"><i class="icon_{{ $value['icon'] }}" title="{{ $icon[$value['icon']] }}"></i></span>
								<a href="{{ url('bbs/read/run?tid=' . $value['tid'] . '&fid=' . $value['fid']) }}" class="st" style="{{ $value['highlight_style'] }}" title="{{ $value['subject'] }}">{{ $value['subject'] }}</a>
@if ($value['disabled'])
<span class="red">(审核中)</span><!--# } #-->

								</td>
								<td class="time">{{ $value['created_time'] }}</td>
								<td class="num"><span>{{ $value['replies'] }}</span>/{{ $value['hits'] }}</td>
							</tr>
						<!--# } #-->
						</table>
						<div class="">
							<page tpl="TPL:common.page" total="$totalpage" page="$page" per="$perpage" count="$count" url="space/thread/run" args="$args"/>
						</div>

@elseif ($space->tome == 2)

						<div class="not_content">啊哦，您暂没有发布任何主题哦！</div>

@else

						<div class="not_content">啊哦，Ta暂没有发布过帖子！</div>
						<!--# } #-->
					</div>
				</div>
			</div>

			
		</div>
		<div class="space_sidebar">
			@include('space.common.sidebar')
		</div>
	</div>
</div>
{{--  @include('common.footer') --}}
</div>
<script>
//引入js组件
Wind.use('jquery', 'global', 'dialog', 'ajaxForm', 'tabs', 'draggable', 'uploadPreview', function(){
	Wind.js(GV.JS_ROOT +'pages/space/space_index.js?v='+ GV.JS_VERSION);
});
</script>
</body>
</html>