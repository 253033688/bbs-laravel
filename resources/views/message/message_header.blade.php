<nav>
<div class="content_nav">
	<span class="fr"><a href="{{ url('message/message/pop/') }}" class="btn btn_submit J_send_msg_pop">写私信</a></span>
	<a href="{{ url('message/message/set') }}" class="edit">设置</a>
	<ul>
		<li
@if($_controller == 'message' && !App\Core\Tool::inArray($_action,array('set','add')))
 class="current"<!--#}#-->>
			<a href="{{ url('message/message/run') }}">私信
@if (Core::getLoginUser()->info['messages'])
<em class="core_num id="J_unread_count">{{ Core::getLoginUser()->info['messages'] }}</em><!--# } #--></a></li>
		<li
@if($_controller == 'notice' && !App\Core\Tool::inArray($_action,array('set','add')))
 class="current"<!--#}#-->><a href="{{ url('message/notice/run') }}">通知
@if (Core::getLoginUser()->info['notices'])
<em class="core_num">{{ Core::getLoginUser()->info['notices'] }}</em><!--# } #--></a></li>
	</ul>

@if($_controller == 'message' && !App\Core\Tool::inArray($_action,array('set','add')))

	<div class="message_search">
	<form id="J_msg_search_form" action="{{ url('message/message/search') }}" method="post" >
	<input type="text" placeholder="输入用户名" name="keyword" id="J_msg_search_input"><button id="J_msg_search_btn" type="submit"><span>搜索</span></button>
	</form>
	</div>
	<!--# } #-->
</div>
</nav>
