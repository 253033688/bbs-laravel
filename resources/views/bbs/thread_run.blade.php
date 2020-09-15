<!doctype html>
<html>
<head>
    @include('common.head')
    <link href="{{ asset('assets/themes/site/default/css/dev/forum.css') }} " rel="stylesheet"/>
</head>
<body>

<div class="wrap">
    @include('common.header')
    <div class="main_wrap">

        <div class="bread_crumb" id="bread_crumb"> {!! $headguide !!}
            @if ($tab == 'digest')
                <em>&gt;</em><a href="{{ url('bbs/thread/run?fid=' . $fid . '&tab=digest') }}">精华</a>
            @endif
            @if ($type)
                <em>&gt;</em>
                <?php $_urladd_ = $tab ? '&tab=' . $tab : ''; ?>
                @if ($_parentid = $topictypes['all_types'][$type]['parentid'])
                    <a href="{{ url('bbs/thread/run?fid=' . $fid . '&type=' . $_parentid) }}{{ $_urladd_ }}">{!! $topictypes['all_types'][$_parentid]['name'] !!}</a>
                    <em>&gt;</em>
                @endif
                <a href="{{ url('bbs/thread/run?fid=' . $fid . '&type=' . $type) }}{{ $_urladd_ }}">{!! $topictypes['all_types'][$type]['name'] !!}</a>
            @endif
        </div>

        <div class="main cc">
            <div id="cloudwind_thread_top"></div>
            <div class="main_body">

                <div class="main_content">
                    @include('bbs.widget_forum')

                    <div id="cloudwind_threadleft_content"></div>
                    {{-- <advertisement id='Thread.Top' sys='1'/> --}}
                    <div class="pages_wrap cc">
                        <a href="{{ url('bbs/post/run?fid=' . $pwforum->fid) }}"
                           class="btn_post J_thread_post_btn{{ $postNeedLogin }}"
                           data-rel="J_thread_post_types_1">发帖</a>
                        @include('bbs.widget_thread_page')
                    </div>

                    <!--需要js定位-->
                    <div id="J_thread_post_types_1" class="btn_post_menu" style="display:none;">
                        <ul>
                            @foreach (($threadType = $pwforum->getThreadType(Core::getLoginUser())) as $key => $value)
                                <?php $_urladd_ = ($key != 'default') ? ('&special=' . $key) : ''; ?>
                                <li><a href="{{ url('bbs/post/run?fid=' . $pwforum->fid) }}{{ $_urladd_ }}"
                                       data-referer="true" class="{{ @trim($postNeedLogin) }}">{{ $value[0] }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="box_wrap thread_page J_check_wrap">
                        <nav>
                            <div class="content_nav">
                                <?php
                                $_urladd_ = rtrim('&' . http_build_query(array('type' => $type, 'tab' => $tab)), '&');
                                ?>

                                <div class="content_filter"><a
                                            href="{{ url('bbs/thread/run?fid=' . $fid) }}{$_urladd_}{{ @$defaultOrderby == 'lastpost' ? '&orderby=postdate' : '' }}"
                                            class="{{ App\Core\Tool::isCurrent($orderby == 'postdate') }}">最新发帖</a><span>|</span><a
                                            href="{{ url('bbs/thread/run?fid=' . $fid) }}{$_urladd_}{{ @$defaultOrderby == 'lastpost' ? '' : '&orderby=lastpost' }}"
                                            class="{{ App\Core\Tool::isCurrent($orderby != 'postdate') }}">最后回复</a></div>

                                <ul class="cc" id="hashpos_ttype">
                                    <li class="{{ App\Core\Tool::isCurrent(!$tab) }}"><a
                                                href="{{ url('bbs/thread/run?fid=' . $fid) }}">全部</a></li>
                                    <li class="{{ App\Core\Tool::isCurrent('digest' == $tab) }}"><a
                                                href="{{ url('bbs/thread/run?fid=' . $fid . '&tab=digest') }}">精华</a>
                                    </li>
                                    <li><a href="{{ url('bbs/user/run?fid=' . $fid) }}">会员</a></li>
                                </ul>
                            </div>

                            @if (isset($topictypes['topic_types']))
                                <?php
                                $_urladd_ = '';
                                $tab && $_urladd_ .= '&tab=' . $tab;
                                $orderby != $defaultOrderby && $_urladd_ .= '&orderby=' . $orderby;
                                ?>

                                <div class="content_type">
                                    <ul class="cc">
                                        <li class="{{ App\Core\Tool::isCurrent(!$type) }}"><a
                                                    href="{{ url('bbs/thread/run?fid=' . $pwforum->fid) }}{{ $_urladd_ }}">全部</a>
                                        </li>
                                        <?php
                                        foreach ($topictypes['topic_types'] as $v){
                                        $subTopicTypes = $topictypes['sub_topic_types'][$v['id']];
                                        $currentClass = ($type == $v['id']) ? 'current' : '';
                                        ?>
                                        <li class="line"></li>
                                        <li class="J_menu_drop {{ $currentClass }}">
                                            @if ($subTopicTypes)
                                                <div class="fl J_menu_drop_list" style="margin-top:22px;display:none;">
                                                    <div class="core_menu">
                                                        <ul class="core_menu_list cc">
                                                            @foreach ($subTopicTypes as $v2)
                                                                <li>
                                                                    <a href="{{ url('bbs/thread/run?fid=' . $pwforum->fid . '&type=' . $v2['id']) }}{{ $_urladd_ }}"
                                                                       title="{{ @strip_tags($v2['name']) }}">{!! $v2['name'] !!}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <a href="{{ url('bbs/thread/run?fid=' . $pwforum->fid . '&type=' . $v['id']) }}{{ $_urladd_ }}"
                                                   class="drop">{!! $v['name'] !!}<span></span></a>
                                            @else
                                                <a href="{{ url('bbs/thread/run?fid=' . $pwforum->fid . '&type=' . $v['id']) }}{{ $_urladd_ }}">{!! $v['name'] !!}</a>
                                            @endif
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            @endif
                        </nav>

                        @if ($threaddb)
                            <div class="thread_posts_list">
                                <table width="100%" id="J_posts_list" summary="帖子列表">
                                    <?php $tpc_topped = 0; ?>
                                    @foreach ($threaddb as $key => $value)
                                        @include('bbs.widget_thread')
                                    @endforeach
                                </table>
                            </div>

                            @if ($operateThread)
                                <div class="management J_post_manage_col" data-role="list">
                                    <label class="mr5"><input class="J_check_all" type="checkbox">全选</label>

                                    <?php
                                    $hasFirstPart = $operateThread['topped'] || $operateThread['digest'] || $operateThread['highlight'] || $operateThread['up'];
                                    $hasSecondPart = $operateThread['type'] || $operateThread['move'] || $operateThread['copy'] || $operateThread['unite'];
                                    $hasThirdPart = $operateThread['lock'] || $operateThread['down'];
                                    $hasFirthPart = $operateThread['delete'] || $operateThread['ban'];
                                    ?>

                                    @if ($operateThread['topped'])
                                        <a href="{{ url('bbs/manage/topped') }}">置顶</a>
                                    @endif
                                    @if ($operateThread['digest'])
                                        <a href="{{ url('bbs/manage/digest') }}">精华</a>
                                    @endif
                                    @if ($operateThread['highlight'])
                                        <a href="{{ url('bbs/manage/highlight') }}">加亮</a>
                                    @endif
                                    @if ($operateThread['up'])
                                        <a href="{{ url('bbs/manage/up') }}">提前</a>
                                    @endif
                                    @if ($hasFirstPart && $hasSecondPart)
                                        <i>|</i>
                                    @endif
                                    @if ($operateThread['type'])
                                        <a href="{{ url('bbs/manage/type') }}">分类</a>
                                    @endif
                                    @if ($operateThread['move'])
                                        <a href="{{ url('bbs/manage/move') }}">移动</a>
                                    @endif
                                    @if ($operateThread['copy'])
                                        <a href="{{ url('bbs/manage/copy') }}">复制</a>
                                    @endif
                                    @if ($operateThread['unite'])
                                        <a href="{{ url('bbs/manage/unite') }}">合并</a>
                                    @endif
                                    @if ($hasThirdPart && ($hasFirstPart ^ $hasSecondPart || $hasFirstPart && $hasSecondPart))
                                        <i>|</i>
                                    @endif
                                    @if ($operateThread['lock'])
                                        <a href="{{ url('bbs/manage/lock') }}">锁定</a>
                                    @endif
                                    @if ($operateThread['down'])
                                        <a href="{{ url('bbs/manage/down') }}">压帖</a>
                                    @endif
                                    @if (($hasFirstPart || $hasSecondPart || $hasThirdPart) && $hasFirthPart)
                                        <i>|</i>@endif
                                    @if ($operateThread['delete'])
                                        <a href="{{ url('bbs/manage/delete') }}">删除</a>
                                    @endif
                                    @if ($operateThread['ban'])
                                        <a href="{{ url('bbs/manage/ban') }}">禁止</a>
                                    @endif
                                </div>
                            @endif
                        @else
                            <div class="not_content">
                                @if ($tab == 'digest')
                                    啊哦，该版块暂没有精华帖！
                                @elseif ($type)
                                    啊哦，该分类暂没有任何内容！
                                @else
                                    啊哦，该版块暂没有任何内容！
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="pages_wrap cc">
                        <a href="{{ url('bbs/post/run?fid=' . $pwforum->fid) }}"
                           class="btn_post J_thread_post_btn{{ $postNeedLogin }}"
                           data-rel="J_thread_post_types_2">发帖</a>
                        @include('bbs.widget_thread_page')
                    </div>
                    <div id="J_thread_post_types_2" class="btn_post_menu" style="display:none;">
                        <ul>
                            <?php
                            foreach ($threadType as $key => $value){
                            $_urladd_ = $key ? ('&special=' . $key) : ''; ?>
                            <li><a href="{{ url('bbs/post/run?fid=' . $pwforum->fid) }}{{ $_urladd_ }}"
                                   data-referer="true" class="{{ @trim($postNeedLogin) }}">{{ $value[0] }}</a></li>
                            <?php } ?>
                        </ul>
                    </div>

                    {{-- <advertisement id='Thread.Btm' sys='1'/> --}}
                </div>
            </div>

            <div class="main_sidebar">
               {{-- @include('common.sidebar_2')--}}
                <div id="cloudwind_threadright_content"></div>
            </div>

        </div>
        <div id="cloudwind_thread_bottom"></div>
    </div>

    @if ($operateThread)
        <div id="J_post_manage_main" class="core_pop_wrap J_post_manage_pop"
             style="display:none;position:fixed;_position:absolute;">
            <div class="core_pop">
                <div style="width:415px;">
                    <div class="pop_top"><a href="#" id="J_post_manage_close"
                                            class="pop_close">关闭</a><strong>帖子操作</strong>(已选中&nbsp;<span class="red"
                                                                                                         id="J_post_checked_count">1</span>&nbsp;篇&nbsp;&nbsp;<a
                                href="" class="s4" id="J_post_manage_checkall" data-type="check">全选</a>)
                    </div>
                    <div class="pop_cont">
                        <div class="pop_operat_list">
                            <ul class="cc J_post_manage_col" data-role="list">
                                @if ($operateThread['topped'])
                                    <li><a href="{{ url('bbs/manage/topped') }}">置顶</a></li>
                                @endif
                                @if ($operateThread['digest'])
                                    <li><a href="{{ url('bbs/manage/digest') }}">精华</a></li>
                                @endif
                                @if ($operateThread['highlight'])
                                    <li><a href="{{ url('bbs/manage/highlight') }}">加亮</a></li>
                                @endif
                                @if ($operateThread['up'])
                                    <li><a href="{{ url('bbs/manage/up') }}">提前</a></li>
                                @endif
                                @if ($operateThread['type'])
                                    <li><a href="{{ url('bbs/manage/type') }}">分类</a></li>
                                    @endif
                                            <!-- <li><a href="{{ url('manage/topped') }}">印戳</a></li>  -->
                                    @if ($operateThread['move'])
                                        <li><a href="{{ url('bbs/manage/move') }}">移动</a></li>
                                    @endif
                                    @if ($operateThread['copy'])
                                        <li><a href="{{ url('bbs/manage/copy') }}">复制</a></li>
                                    @endif
                                    @if ($operateThread['unite'])
                                        <li><a href="{{ url('bbs/manage/unite') }}">合并</a></li>
                                    @endif
                                    @if ($operateThread['lock'])
                                        <li><a href="{{ url('bbs/manage/lock') }}">锁定</a></li>
                                    @endif
                                    @if ($operateThread['down'])
                                        <li><a href="{{ url('bbs/manage/down') }}">压帖</a></li>
                                    @endif
                                    @if ($operateThread['delete'])
                                        <li><a href="{{ url('bbs/manage/delete') }}">删除</a></li>
                                    @endif
                                    @if ($operateThread['ban'])
                                        <li><a href="{{ url('bbs/manage/ban') }}">禁止</a></li>
                                    @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @include('common.footer')
</div>

<script>
    var FID = '{{ $pwforum->fid }}';
    Wind.use('jquery', 'global', function () {
        //主题分类下拉
        $('li.J_menu_drop').on('mouseenter', function (e) {
            $(this).children('div.J_menu_drop_list').show();
        }).on('mouseleave', function (e) {
            $(this).children('div.J_menu_drop_list').hide();
        });

        {{--@if(!$is_design)--}}

        @if ($operateThread)

        //管理
        Wind.js(GV.JS_ROOT + 'pages/bbs/threadManage.js?v=' + GV.JS_VERSION);
                @endif
                @if (Core::getLoginUser()->isExists())

        var JOIN_URL = "{{ url('bbs/forum/join') }}",		//版块加入
                QUIT_URL = "{{ url('bbs/forum/quit') }}",		//版块退出
                lock = false;
        //ie6 hover显示版块退出
        if ($.browser.msie && $.browser.version < 7) {
            $('a.J_forum_join').hover(function () {
                if ($(this).data('role') == 'quit') {
                    $(this).children().show();
                }
            }, function () {
                if ($(this).data('role') == 'quit') {
                    $(this).children().hide();
                }
            });
        }

        //版块加入 退出
        $('a.J_forum_join').on('click', function (e) {
            e.preventDefault();
            var $this = $(this),
                    role = $this.data('role'),
                    url = (role == 'join' ? JOIN_URL : QUIT_URL);

            if (lock) {
                return false;
            }
            lock = true;

            //global.js
            Wind.Util.ajaxMaskShow();

            $.post(url, {fid: $this.data('fid')}, function (data) {
                //global.js
                Wind.Util.ajaxMaskRemove();

                if (data.state == 'success') {
                    if (role == 'join') {
                        $this.html('已加入<span>&nbsp;&nbsp;|&nbsp;&nbsp;取消</span>').removeClass('core_follow').addClass('core_unfollow').data('role', 'quit');
                    } else {
                        $this.html('加入版块').removeClass('core_unfollow').addClass('core_follow').data('role', 'join');
                    }
                } else if (data.state == 'fail') {
                    //global.js
                    Wind.Util.resultTip({
                        error: true,
                        msg: data.message,
                        elem: $this,
                        follow: true
                    });
                }
                lock = false;

            }, 'json');
        });
        @endif

        /*
         * 版块简介收起展开
         */
        $('a.J_forum_intro_slide').on('click', function (e) {
            e.preventDefault();
            var role = $(this).data('role');

            if (role == 'down') {
                $(this).text('收起<<').data('role', 'up');
            } else {
                $(this).text('更多>>').data('role', 'down');
            }
            $('span.J_forum_intro:hidden').show().siblings('.J_forum_intro').hide();
        });

        var thread_post_btn = $('a.J_thread_post_btn');
        thread_post_btn.each(function (i, o) {
            Wind.Util.hoverToggle({
                elem: $(o),						//hover元素
                list: $('#' + $(o).data('rel')),		//下拉菜单
                callback: function (elem, list) {
                    list.css({
                        left: elem.offset().left,
                        top: elem.offset().top + elem.height()
                    });
                }
            });
        });

        {{--@endif--}}
    });
</script>


</body>
</html>
