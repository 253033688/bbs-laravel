@if (!Core::getLoginUser()->isExists())
    <div class="header_login">
        {{-- <hook name="header_info_3"/> --}}
        <a rel="nofollow" href="{{ url('u/login/run') }}">登录</a><a rel="nofollow"
                                                                   href="{{ url('u/register/run') }}">注册</a>
    </div>
@else
    <?php
    if (isset($pwforum) && $pwforum->isForum()) {
        $_tmpfid = $pwforum->fid;
        $_tmpcid = $pwforum->getCateId();
    } else {
        $_tmpfid = 0;
        $_tmpcid = isset($pwforum) ? $pwforum->getCateId() : '0';
    }
    ?>
    <a class="header_login_btn" id="J_head_forum_post" role="button" aria-label="快速发帖" aria-haspopup="J_head_forum_pop"
       href="#" title="快速发帖" tabindex="-1"><span class="inside"><span class="header_post">发帖</span></span></a>
    <div id="J_head_forum_pop" tabindex="0" class="pop_select_forum" style="display:none;"
         aria-label="快速发帖菜单,按ESC键关闭菜单"><a id="J_head_forum_close" href="#" class="pop_close" role="button">关闭窗口</a>
        <div class="core_arrow_top" style="left:310px;"><em></em><span></span></div>
        <div class="hd">发帖到其他版块</div>
        <div id="J_head_forum_ct" class="ct cc" data-fid="{{ $_tmpfid }}" data-cid="{{ $_tmpcid }}">
            <div class="pop_loading"></div>
        </div>
        <div class="ft">
            <div class="associate">
                <label class="fr"><input type="checkbox" id="J_head_forum_join" data-url="{{ url('bbs/forum/join') }}">添加到我的版块</label>
                发帖到：<span id="J_post_to_forum"></span>
            </div>
            <div class="tac">
                <button type="button" class="btn btn_submit disabled" disabled="disabled" id="J_head_forum_sub"
                        data-url="{{ url('bbs/post/run/') }}">确定
                </button>
            </div>
        </div>
    </div>
    <?php
    $messageCount = Core::getLoginUser()->info['notices'] + Core::getLoginUser()->info->messages;
    $messageClass = $messageCount ? 'header_message' : 'header_message header_message_none';
    ?>
    <a class="header_login_btn" id="J_head_msg_btn" tabindex="0" href="{{ url('message/message/run') }}"
       aria-haspopup="J_head_msg_pop" aria-label="消息菜单,按pagedown打开菜单,tab键导航,esc键关闭"><span class="inside"><span
                    class="{{ $messageClass }}">消息<em
                        class="core_num J_hm_num">{{ $messageCount }}</em></span></span></a>
    <!--消息下拉菜单-->
    <div id="J_head_msg_pop" tabindex="0" aria-label="消息下拉菜单,按ESC键关闭菜单" class="header_menu_wrap my_message_menu"
         style="display:none;">
        <div class="header_menu cc">
            <div class="header_menu_hd" id="J_head_pl_hm"><span class="{{ $messageClass }} header_message_down">消息<em
                            class="core_num J_hm_num">{{ $messageCount }}</em></span></div>
            <div id="J_head_msg" class="my_message_content">
                <div class="pop_loading"></div>
            </div>
        </div>
    </div>
    <div class="header_login_later">
        {{-- <hook name="header_info_1"/> --}}
        <a aria-haspopup="J_head_user_menu" aria-label="个人功能菜单,按pagedown打开菜单,tab键导航,esc键关闭" tabindex="0" rel="nofollow"
           href="{{ url('space/index/run?uid=' . Core::getLoginUser()->uid) }}" id="J_head_user_a" class="username"
           title="{{ Core::getLoginUser()->username }}">{{ App\Core\Tool::substrs(Core::getLoginUser()->username,6) }}<em class="core_arrow"></em></a>
        {{-- <hook name="header_info_2"/> --}}
        <div class="fl">
            <div id="J_head_user_menu" role="menu" class="header_menu_wrap my_menu_wrap" style="display:none;">
                <div class="header_menu my_menu cc">
                    <div class="header_menu_hd" id="J_head_pl_user"><span title="{{ Core::getLoginUser()->username }}"
                                                                          class="username">{{ \App\Core\Tool::substrs(Core::getLoginUser()->username,6) }}</span><em
                                class="core_arrow_up"></em></div>
                    <ul class="ct cc">
                        <?php
                        $nav = app(App\Services\nav\bo\PwNavBo::class);
                        $myNav = $nav->getNavFromConfig('my');
                        ?>
                        @foreach($myNav as $key=>$value)
                            <li>{!! $value['name'] !!}</li>
                        @endforeach
                        <?php
                        $_url = '';
                        $_panelManage = false;
                        // $_toCheck: permission name => array(permission key, url path)
                        $_toCheck = array(
                                'panel_bbs_manage' => array('thread_check', 'manage/content/run'),
                                'panel_user_manage' => array('user_check', 'manage/user/run'),
                                'panel_report_manage' => array('report_manage', 'manage/report/run'),
                                'panel_recycle_manage' => array('recycle', 'manage/recycle/run'),
                        );
                        foreach ($_toCheck as $_permName => $_permInfo) {
                            if ($_panelManage) {
                                break;
                            }
                            $_permission = Core::getLoginUser()->getPermission($_permName, false, array());
                            if ($_permission && isset($_permission[$_permInfo[0]])) {
                                $_url = $_permInfo[1];
                                $_panelManage = true;
                            }
                        }
                        ?>
                        @if ($_panelManage)
                            <li><a href="{{ url($_url) }}" rel="nofollow"><em class="icon_system"></em>前台管理</a></li>
                        @endif
                        @if (App\Core\Tool::getstatus(Core::getLoginUser()->info['status'], \App\Services\user\bs\PwUser::STATUS_ALLOW_LOGIN_ADMIN) || \App\Core\Tool::inArray(3, Core::getLoginUser()->groups))
                            <li><a href="{{ url('admin.php') }}" target="_blank" rel="nofollow"><em
                                            class="icon_admin"></em>系统后台</a></li>
                        @endif
                    </ul>
                    <ul class="ft cc">
                        <li><a href="{{ url('profile/index/run') }}"><em class="icon_profile"></em>个人设置</a></li>
                        {{-- <hook name="header_my" /> --}}
                        <li><a href="{{ url('u/login/logout') }}" rel="nofollow"><em class="icon_quit"></em>退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @if (Core::getLoginUser()->info['message_tone'] > 0 && $messageCount > 0)
        <audio autoplay="autoplay">
            <source src="{{ asset('assets/images/message/msg.wav') }}" type="audio/wav"/>
            <source src="{{ asset('assets/images/message/msg.mp3') }}" type="audio/mp3"/>
            <div style='overflow:hidden;width:0;float:left'>
                <embed src='{{ asset('assets/images/message/msg.wav') }}' width='0' height='0' AutoStart='true'
                       type='application/x-mplayer2'></embed>
            </div>
        </audio>
    @endif
@endif
