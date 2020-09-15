<!doctype html>
<html>
<head>
	@include('common.head')
	<link href="{{ asset('assets/themes/site/default/css/dev/profile.css') }} "rel="stylesheet" />
	<meta  http-equiv="pragma" content="no-cache" />
	<meta  http-equiv="cache-control" content="no-cache" />
	<meta  http-equiv="expires" content="0" />
</head>
<body>
<div class="wrap">
	{{-- @include('common.header') --}}
	<div class="main_wrap">
		<div class="bread_crumb">
			<a href="{{ url() }}" class="home" title="{{ Core::C('site', 'info.name') }}">首页</a><em>&gt;</em><a href="{{ url('profile/index/run') }}">设置</a>
<!--#
$_profileBread = Wind::getApp()->getResponse()->getData('G','profileBread');
foreach ($_profileBread as $key => $_item) {
if (!$_item || !is_array($_item)) continue;
#-->
			<em>&gt;</em><a href="{{ $_item['url'] }}">{{ $_item['title'] }}</a>
<!--#}#-->
		</div>
		<div class="cc profile_page">
			<div class="md">
				@include('profile_left')
			</div>
			<div class="cm">
				<div class="cw">
					<div class="box_wrap">
<!--头像上传开始-->
						<div class="content">
							<div class="profile_nav">
								<ul>
									<li class="current"><a href="{{ url('profile/avatar/run?_left=avatar') }}">更改头像</a></li>
								</ul>
							</div>

@if ($isAvatarBan)
$endTime = $banInfo['end_time'] > 0 ? App\Core\Tool::time2str($banInfo['end_time'], 'Y年m月d日 H:i') : '永久';
						#-->
							<div class="profile_ct">
								<div class="tips_icon">由于“{!! $banInfo['reason'] !!}”被{$banInfo['operator']}禁止至{{ $endTime }}</div>
							</div>

@elseif ($type != 'nomal')

							<div class="profile_ct"> {!! $avatarFlash !!}
									<div class="other_upload">如果无法上传头像，请尝试使用<a href="{{ url('profile/avatar/run?type=nomal') }}">普通上传模式</a></div>
							</div>

@else

							<div class="avatar_other">
								<form id="J_avatgar_normal_form" action="{{ $avatarArr['postUrl']|url }}&_json=1" method="post" enctype="multipart/form-data" >
								<dl class="cc">
									<dt>
										<img class="J_avatar J_previewImg" src="{{ App\Core\Tool::getAvatar(Core::getLoginUser()->uid, 'big') }}" data-type="big" width="200" height="200" />
									</dt>
									<dd>
										<div class="mb10"><input type="file" name="avatar" class="J_upload_preview"></div>
										<div class="gray mb20">支持JPG、JPEG、PNG文件格式</div>
										<button type="submit" class="btn btn_submit btn_big mr20" id="J_avatgar_normal_btn">保存</button>
									</dd>
								</dl>
								</form>
								<div class="other_upload">返回 <a href="{{ url('profile/avatar/run') }}">高级上传模式</a></div>
							</div>
						<!--#}#-->
						</div>
<!--头像上传结束-->
					<img src="{{ App\Core\Tool::getAvatar(Core::getLoginUser()->uid, 'big') }}" style="display:none">
					<img src="{{ App\Core\Tool::getAvatar(Core::getLoginUser()->uid, 'middle') }}" style="display:none">
					<img src="{{ App\Core\Tool::getAvatar(Core::getLoginUser()->uid, 'small') }}" style="display:none">
					</div>
				</div>
			</div>
		</div>
	</div>
	{{--  @include('common.footer') --}}
</div>
<script>
Wind.ready(document, function(){
	Wind.use('jquery', 'global');

@if ($type == 'nomal')

		Wind.js(GV.JS_ROOT + 'pages/profile/profileAvatarNormal.js?v=' + GV.JS_VERSION)
	<!--#}#-->
});
</script>
</body>
</html>
