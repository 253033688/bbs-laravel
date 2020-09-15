<!doctype html>
<html>
<head>
@include('common.head')
<link href="{{ asset('assets/themes/site/default/css/dev/invite.css') }} "rel="stylesheet" />
</head>
<body>
<div class="wrap">
{{-- @include('common.header') --}}
	<div class="main_wrap">
		<div class="bread_crumb">
			<a href="{{ url() }}" class="home" title="{{ Core::C('site', 'info.name') }}">首页</a><em>&gt;</em>
			<a href="{{ url('my/invite/run') }}">邀请好友</a><em>&gt;</em>
			<a href="{{ url('my/invite/statistics') }}">邀请统计</a>
		</div>
		<div class="main cc">
			<div class="main_body">
				<div class="main_content cc">
					<div class="box_wrap invite_page">		
						@include('bbs.mine_tab')
		<!--邀请统计-->
						<div class="content_type">
							<ul class="cc">
								<li><a href="{{ url('my/invite/run') }}">邀请码管理</a></li>
								<li class="line"></li><li class="current"><a href="{{ url('my/invite/statistics') }}">邀请统计</a></li>
							</ul>
						</div>
						<div class="invite_content">
							<div class="tips mb10">
								<div class="tips_icon">
									多邀请好友不仅可以增加人气还可以获得额外奖励哦，每邀请一个好友注册可获得 <span class="org">{{ $rewardNum }}</span> {{ $rewardCredit['unit'] }}{$rewardCredit['name']}奖励。
								</div>
							</div>
							<h2>总邀请人数：<span class="org">{{ $count }}</span>人</h2>
							<div class="invite_uesr_list">
								<ul class="cc">

@foreach ($list as $id => $item)

									<li>
										<a href="{{ url('space/index/run?uid=' . $id) }}"><img data-type="middle" class="J_avatar" src="{{ App\Core\Tool::getAvatar($id, 'middle') }}" width="90" height="90" alt="{{ $item['username'] }}" /></a>
										<p><a href="{{ url('space/index/run?uid=' . $id) }}">{{ $item['username'] }}</a></p>
									</li>
								<!--#}#-->
								</ul>
							</div>
							<div class="tac"><page tpl="TPL:common.page" url="my/invite/statistics" page="$page" count="$count" per="$perpage" /></div>
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
Wind.use('jquery', 'global', function(){})
</script>
</body>
</html>