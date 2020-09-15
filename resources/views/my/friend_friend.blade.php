<!doctype html>
<html>
<head>
@include('common.head')
<link href="{{ asset('assets/themes/site/default/css/dev/fans.css') }} "rel="stylesheet" />
</head>
<body>
<div class="wrap">
{{-- @include('common.header') --}}
	<div class="main_wrap">
		<div class="bread_crumb">
			<a href="{{ url() }}" class="home" title="{{ Core::C('site', 'info.name') }}">首页</a><em>&gt;</em>
			<a href="{{ url('my/friend/run') }}">找人</a><em>&gt;</em>
			<a href="{{ url('my/friend/friend') }}">可能认识</a>
		</div>
		<div class="main cc">
			<div class="main_body">
				<div class="main_content cc">
					<div class="box_wrap fans_page">
						@include('bbs.mine_tab')
						<div class="content_type">
							<ul class="cc">
								<li><a href="{{ url('my/friend/run') }}">推荐关注</a></li>
								<li class="line"></li><li class="current"><a href="{{ url('my/friend/friend') }}">可能认识</a></li>
								<li class="line"></li><li><a href="{{ url('my/friend/search') }}">查找关注</a></li>
							</ul>
						</div>

@if ($userList)

						<div class="fans_list" id="J_fans_page">

@if (Core::getLoginUser()->info['recommend_friend'])
$pFriends = unserialize(Core::getLoginUser()->info['recommend_friend']);
								
							}
							foreach ($userList as $key => $value) { 
								$birthday = $value['byear'] ? '生日：' . $value['byear'] . '年'.$value['bmonth'].'月'.$value['bday'].'日' : '';
								$profile = $value['profile'] ? '  自我介绍：'.$value['profile'] : '';
								
								if (isset($pFriends[$key])) {
									$tmp = array();
									foreach($pFriends[$key]['sameUser'] as $sk => $su){
										if (!trim($su)) continue;
										$tmp[] = sprintf('<a href="%s" class="J_user_card_show" data-uid="%d" target="_blank">%s</a>',WindUrlHelper::createUrl('space/index/run?uid=' . $sk),$sk,$su);
									}
									$tmp = implode('、', $tmp);
									$recommendUser = '共同好友：'.$tmp;
								}
							#-->
							<dl class="cc J_friends_items">
								<dt><a data-uid="{{ $value['uid'] }}" class="J_user_card_show" href="{{ url('space/index/run?uid=' . $value['uid']) }}"><img class="J_avatar" src="{{ App\Core\Tool::getAvatar($value['uid'], 'small') }}" data-type="small" width="50" height="50" alt="{{ $value['username'] }}" /></a></dt>
								<dd>
									<div class="title">
										<a href="{{ url('space/index/run?uid=' . $value['uid']) }}" data-uid="{{ $value['uid'] }}" class="name J_user_card_show">{{ $value['username'] }}</a>
										<!--# $gender = $value['gender'] == 1 ? 'women' : 'man';
											$online = App\Core\Tool::checkOnline($value['lastvisit']) ? 'ol' : 'unol';
										 #-->
										<span class="{{ $gender }}_{{ $online }}"></span>
									</div>
									<div class="num">
										关注<a href="{{ url('space/follows/run?uid=' . $value['uid']) }}">{{ $value['follows'] }}</a><span>|</span>粉丝<a href="{{ url('space/fans/run?uid=' . $value['uid']) }}">{{ $value['fans'] }}</a><span>|</span>帖子<a href="{{ url('space/thread/run?uid=' . $value['uid']) }}">{{ $value['postnum'] }}</a>
									</div>
									<div class="action">{!! $recommendUser !!}</div>
									<div class="action">{{ $birthday }}</div>
									<div class="action">{{ $profile }} </div>
									<div class="action"></div>
									<div class="attribute">
										<a href="{{ url('my/follow/add') }}" class="core_follow J_fans_follow" data-role="follow" data-uid="{{ $value['uid'] }}" data-role="follow">加关注</a>
									</div>
								</dd>
							</dl>
							<!--# } #-->
						</div>

@else

						<div class="nofollow_list"><div class="hd">啊哦，暂时还没有可能认识的人哦！</div></div>
						<!--# } #-->
					</div>
				</div>
			</div>
			<div class="main_sidebar">
				@include('common.sidebar_1')
			</div>
		</div>
	</div>
	
{{--  @include('common.footer') --}}
<script>
var URL_UNFOLLOW = "{{ url('my/follow/delete/') }}",
		URL_FOLLOW = "{{ url('my/follow/add/') }}";
Wind.use('jquery', 'global', GV.JS_ROOT +'pages/my/fansFollow.js?v='+ GV.JS_VERSION);
</script>
</div>
</body>
</html>