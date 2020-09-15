
@if ($replies)


@foreach ($replies as $key => $value)

	<dl class="cc">
		<dt><a class="J_user_card_show" data-uid="{{ $value['created_userid'] }}" href="{{ url('space/index/run?uid=' . $value['created_userid']) }}"><img src="{{ App\Core\Tool::getAvatar($value['created_userid'], 'small') }}" width="30" height="30" alt="{{ $value['created_username'] }}" class="J_avatar" data-type="small" /></a></dt>
		<dd>
			<p class="content"><a class="J_user_card_show" data-uid="{{ $value['created_userid'] }}" href="{{ url('space/index/run?uid=' . $value['created_userid']) }}">{{ $value['created_username'] }}</a>：<em>{!! $value['content'] !!}</em><span>({{ App\Core\Tool::time2str($value['created_time'], 'auto') }})</span></p>
			<p class="repeat_btn"><a data-user="{{ $value['created_username'] }}" href="" class="J_feed_single">回复</a></p>
		</dd>
	</dl>
	<!--# } #-->

@if ($count > 6)

	<a href="{{ url('space/index/fresh?uid=' . $fresh['created_userid'] . '&id=' . $fresh['id']) }}">查看全部回复>></a>
	<!--# } #-->
<!--# } #-->