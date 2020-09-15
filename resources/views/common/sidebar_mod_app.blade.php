@if (Core::getLoginUser()->isExists())
    <div class="box_wrap">
        <h2 class="box_title J_sidebar_box_toggle">我的应用</h2>
        <div class="my_app_list">
            <ul>
                <li><a href="{{ url('vote/my/run') }}"><span class="icon_vote"></span>投票</a></li>
                <li><a href="{{ url('like/mylike/run') }}"><span class="icon_like"></span>喜欢</a></li>
                @if (Core::C('site','medal.isopen'))
                    <li><a href="{{ url('medal/index/run') }}"><span class="icon_medal"></span>勋章</a></li>
                @endif
                @if (1 == Core::C('site', 'task.isOpen'))
                    <li><a href="{{ url('task/index/run') }}"><span class="icon_task"></span>任务</a></li>
                @endif
            </ul>
        </div>
    </div>
@endif