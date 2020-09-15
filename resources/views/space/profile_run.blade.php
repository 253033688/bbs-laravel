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
			<div class="box">
				<div class="hd">
					<h2>{{ $host }}的资料</h2>
				</div>
				<div class="space_profile">
					<h3>

@if ($space->tome == 2)

						<a href="{{ url('profile/index/run?_tab=profile') }}" class="edit">编辑</a>
						<!--# } #-->
						<strong>基本资料</strong>
					</h3>
					<dl class="cc">
						<dt>UID</dt>
						<dd>{{ $space->spaceUid }}</dd>
					</dl>
					<dl class="cc">
						<dt>头衔</dt>
						<dd>{{ $groupName }}</dd>
					</dl>
					<dl class="cc">
						<dt>在线时长</dt>
						<dd>{{ @floor($space->spaceUser['onlinetime']/3600) }}&nbsp;小时</dd>
					</dl>

@if ($space->allowView('constellation'))

					<dl class="cc">
						<dt>星座</dt>
						<dd>{{ $constellation }}</dd>
					</dl>
					<!--# } #-->	

@if ($space->allowView('local'))

					<dl class="cc">
						<dt>现居住地</dt>
						<dd>{{ $space->spaceUser['location_text'] }}</dd>
					</dl>
					<!--# } #-->	

@if ($space->allowView('nation'))

					<dl class="cc">
						<dt>家乡</dt>
						<dd>{{ $space->spaceUser['hometown_text'] }}</dd>
					</dl>
					<!--# } #-->	
					<dl class="cc">
						<dt>个人主页</dt>
						<dd>{{ $space->spaceUser['homepage'] }}</dd>
					</dl>
					<dl class="cc">
						<dt>注册日期</dt>
						<dd>{{ App\Core\Tool::time2str($space->spaceUser['regdate'], 'Y年m月d日') }}</dd>
					</dl>
					<dl class="cc">
						<dt>最后登录</dt>
						<dd>{{ App\Core\Tool::time2str($space->spaceUser['lastvisit'], 'Y年m月d日') }}</dd>
					</dl>
				</div>

@if ($space->allowView('aliwangwang') || $space->allowView('qq') || $space->allowView('msn') || $space->allowView('mobile'))

				<div class="space_profile">
					<h3>

@if ($space->tome == 2)

						<a href="{{ url('profile/index/contact?_tab=contact') }}" class="edit">编辑</a>
					<!--# } #-->
						<strong>联系方式</strong>
					</h3>
				

@if ($space->allowView('aliwangwang'))

					<dl class="cc">
						<dt>阿里旺旺</dt>
						<dd>{{ $space->spaceUser['aliww'] }}</dd>
					</dl>
					<!--# } #-->	

@if ($space->allowView('qq'))

					<dl class="cc">
						<dt>QQ</dt>
						<dd>{{ $space->spaceUser['qq'] }}</dd>
					</dl>
					<!--# } #-->	

@if ($space->allowView('msn'))

					<dl class="cc">
						<dt>MSN</dt>
						<dd>{{ $space->spaceUser['msn'] }}</dd>
					</dl>
					<!--# } #-->	

@if ($space->allowView('mobile'))

					<dl class="cc">
						<dt>手机号码</dt>
						<dd>{{ $space->spaceUser['mobile'] }}</dd>
					</dl>
					<!--# } #-->	
				</div>
			<!--# } #-->	
				{{-- <hook name="space_profile" args="array($space)" /> --}}
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