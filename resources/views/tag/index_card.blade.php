
@if ($tag['isAttention'])
$type = 'del';
		$core_unfollow = 'core_unfollow';
		$attentionText = '取消关注';
	} else {
		$type = 'add';
		$core_unfollow = '';
		$attentionText = '关注该话题';
	}
#-->
<div class="name"><h3>{{ $tag['tag_name'] }}</h3><a href="{{ url('tag/index/attention?id=' . $tag['tag_id']) }}" data-id="{{ $tag['tag_id'] }}" data-type="{{ $type }}" class="core_follow J_read_tag_follow {{ $core_unfollow }}">{{ $attentionText }}</a></div>
<div class="num">
	<ul class="cc">
		<li>帖子：<em>{{ $tag['content_count'] }}</em></li>
		<li>被关注：<em>{{ $tag['attention_count'] }}</em></li>
	</ul>
</div>

@if (!$tag['isAttention'])

<div class="ft">
	关注后，最新的话题内容将显示在<a class="J_qlogin_trigger" data-referer="true" href="{{ url('tag/index/my') }}">我的话题</a>中
</div>
<!--# } #-->