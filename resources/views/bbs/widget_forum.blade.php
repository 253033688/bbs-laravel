<div class="box_wrap">
    <div class="forum_info_box cc" id="J_forum_info_box">
        @if ($logo = $pwforum->foruminfo['logo'])
            <div class="banner"><img src="{{ App\Core\Tool::getPath($logo) }}" alt="{{ $pwforum->foruminfo['name'] }}"/>
            </div>
        @endif

        <div class="name">
            @if (Core::getLoginUser()->isExists() && $pwforum->foruminfo['type'] != 'category')
                <span class="fr">
                    @if (!$pwforum->isJoin(Core::getLoginUser()->uid))
                        <a href="{{ url('bbs/forum/join?fid=' . $fid) }}" data-role="join" data-fid="{{ $fid }}"
                           class="core_follow J_forum_join J_qlogin_trigger">加入版块</a>
                    @else
                        <a href="{{ url('bbs/forum/quit?fid=' . $fid) }}" data-role="quit" data-fid="{{ $fid }}"
                           class="core_unfollow J_forum_join">已加入<span>&nbsp;&nbsp;|&nbsp;&nbsp;取消</span></a>
                    @endif
				</span>
            @endif
            <h3>{!! $pwforum->foruminfo['name'] !!}</h3>
        </div>

        <div class="num">
            <ul class="cc">
                <li>今日：<em>{{ $pwforum->foruminfo['todayposts'] }}</em></li>
                <li>主题：<em>{{ $pwforum->foruminfo['threads'] }}</em></li>
                <li>总帖：<em>{{ $pwforum->foruminfo['article'] }}</em></li>
            </ul>
        </div>

        @if ($forumManager = $pwforum->getManager())
            <div class="moderator">
                版主：
                @foreach ($forumManager as $key => $value)
                    {@$key ? '，' : ''}<a class="J_user_card_show" data-username="{{ $value }}"
                                         href="{{ url('space/index/run?username=' . $value) }}">{{ $value }}</a>
                @endforeach
            </div>
        @endif

        <div class="notice">
            <span class="J_forum_intro">{!! $pwforum->foruminfo['descrip'] !!}<!-- &nbsp;&nbsp;<a href="#" class="more s4 J_forum_intro_slide" data-role="down">更多&gt;&gt;</a> --></span>
        </div>
    </div>

    @if ($pwforum->foruminfo['hassub'] && $sub = $pwforum->getSubForums(1, true))
        <div class="forum_group forum_child">
            <div class="hd"><h2 class="cname">子版块</h2></div>
            @if ($pwforum->foruminfo['across'] > 1)
                {{--<segment tpl="forum_list_table" name="more_across" args="$pwforum->foruminfo,$sub"/>--}}
            @else
                {{--<segment tpl="forum_list_table" name="one_across" args="$pwforum->foruminfo,$sub"/>--}}
            @endif
        </div>
    @endif

</div>