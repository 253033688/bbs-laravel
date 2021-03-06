<!doctype html>
<html>
<head>
    @include('common.head')
    <link href="{{ asset('assets/themes/site/default/css/dev/forum.css') }}" rel="stylesheet"/>
</head>
<body>

<div class="wrap">
    @include('common.header')
    <div class="main_wrap">
        <div class="bread_crumb"> {!! $headguide !!}
            @if ($tab == 'digest')
                <em>&gt;</em><a href="{{ url('bbs/cate/run?fid=' . $fid . '&tab=digest') }}">精华</a>
            @endif
        </div>

        <div class="main cc">
            <div class="main_body">
                <div class="main_content">
                    {{--@include('bbs.widget_forum')--}}
                    <div class="box_wrap thread_page J_check_wrap">
                        <nav>
                            <div class="content_nav" id="hashpos_ttype">
                                <?php $_urladd_ = $tab ? '&tab=' . $tab : ''; ?>
                                <div class="content_filter"><a
                                            href="{{ url('bbs/cate/run?fid=' . $fid) }}{$_urladd_}{{ $defaultOrderby == 'lastpost' ? '&orderby=postdate' : '' }}"
                                            class="{{ App\Core\Tool::isCurrent($orderby == 'postdate') }}">最新发帖</a><span>|</span><a
                                            href="{{ url('bbs/cate/run?fid=' . $fid) }}{$_urladd_}{{ $defaultOrderby == 'lastpost' ? '' : '&orderby=lastpost' }}"
                                            class="{{ App\Core\Tool::isCurrent($orderby != 'postdate') }}">最后回复</a>
                                </div>
                                <ul class="cc">
                                    <li class="{{ App\Core\Tool::isCurrent(!$tab) }}"><a
                                                href="{{ url('bbs/cate/run?fid=' . $fid) }}">全部</a></li>
                                    <li class="{{ App\Core\Tool::isCurrent('digest' == $tab) }}"><a
                                                href="{{ url('bbs/cate/run?fid=' . $fid . '&tab=digest') }}">精华</a></li>
                                </ul>
                            </div>
                        </nav>

                        @if ($threaddb)
                            <div class="thread_posts_list">
                                <table width="100%" id="J_posts_list" summary="帖子列表">
                                    <?php
                                    $tpc_topped = 0;
                                    ?>
                                    @foreach ($threaddb as $key => $value)
                                        @if ($tpc_topped && !isset($value['issort']))
                                            <tr>
                                                <td colspan="3" class="tac ordinary">普通主题</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td class="author"><a class="J_user_card_show"
                                                                  data-uid="{{ $value['created_userid'] }}"
                                                                  href="{{ url('space/index/run?uid=' . $value['created_userid']) }}"><img
                                                            class="J_avatar"
                                                            src="{{ App\Core\Tool::getAvatar($value['created_userid'], 'small') }}"
                                                            data-type="small" width="45" height="45"
                                                            alt="{{ $value['created_username'] }}的头像"/></a></td>
                                            <td class="subject">
                                                <p class="title">

                                                    @if ($operateThread)

                                                        <input class="J_check" name="" type="checkbox"
                                                               value="{{ $value['tid'] }}"/>
                                                    @endif
                                                    <a href="{{ url('bbs/read/run?tid=' . $value['tid'] . '&fid=' . $value['fid']) }}"
                                                       target="_blank"><span class="posts_icon"><i
                                                                    class="icon_{{ $value['icon'] }}"
                                                                    title="{{ $icon[$value['icon']] }}  新窗口打开"></i></span></a>
                                                    <a href="{{ url('bbs/read/run?tid=' . $value['tid'] . '&fid=' . $value['fid']) }}"
                                                       class="st"
                                                       style="{{ $value['highlight_style'] }}">{{ App\Core\Tool::substrs($value['subject'],$numofthreadtitle) }}</a>
                                                    {{-- <hook class='$threadList' name='createHtmlAfterSubject' args="array($value)" /> --}}
                                                    @if ($value['ifupload'])
                                                        <span class="posts_icon"><i
                                                                    class="icon_{{ $uploadIcon[$value['ifupload']] }}"
                                                                    title="{{ $icon[$uploadIcon[$value['ifupload']]] }}"></i></span>
                                                    @endif
                                                </p>
                                                <p class="info">
                                                    楼主：<a class="J_user_card_show"
                                                          data-uid="{{ $value['created_userid'] }}"
                                                          href="{{ url('space/index/run?uid=' . $value['created_userid']) }}">{{ $value['created_username'] }}</a><span><?php echo App\Core\Tool::time2str($value['created_time'], 'Y-m-d');?></span>
                                                    最后回复：<a href="{{ url('space/index/run?uid=' . $value['lastpost_userid']) }}">{{ $value['lastpost_username'] }}</a><span><a
                                                                href="{{ url('bbs/read/run?tid=' . $value['tid'] . '&fid=' . $value['fid'] . '&page=e') }}#a"
                                                                rel="nofollow">
                                                            <?php echo App\Core\Tool::time2str($value['lastpost_time'], 'm-d H:i');?></a></span>
                                                </p>
                                            </td>
                                            <td class="num">
                                                <span><em>{{ $value['replies'] }}</em>回复</span>
                                                <span><em>{{ $value['hits'] }}</em>浏览</span>
                                            </td>
                                        </tr>
                                        <?php $tpc_topped = isset($value['issort']); ?>
                                    @endforeach
                                </table>
                            </div>

                            @if ($operateThread)
                                <div class="management mb10 J_post_manage_col" data-role="list">
                                    <label class="mr10"><input class="J_check_all" type="checkbox">全选</label>
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
                                    @if ($operateThread['type'])
                                        <a href="{{ url('bbs/manage/type') }}">分类</a>@endif
                                    @if ($operateThread['move'])
                                        <a href="{{ url('bbs/manage/move') }}">移动</a>@endif
                                    @if ($operateThread['copy'])
                                        <a href="{{ url('bbs/manage/copy') }}">复制</a>
                                    @endif
                                    @if ($operateThread['unite'])
                                        <a href="{{ url('bbs/manage/unite') }}">合并</a>
                                    @endif
                                    @if ($operateThread['lock'])
                                        <a href="{{ url('bbs/manage/lock') }}">锁定</a>
                                    @endif
                                    @if ($operateThread['down'])
                                        <a href="{{ url('bbs/manage/down') }}">压帖</a>
                                    @endif
                                    @if ($operateThread['delete'])
                                        <a href="{{ url('bbs/manage/delete') }}">删除</a>
                                    @endif
                                </div>
                            @endif

                            <div class="pages_wrap cc">
                                {{--<page tpl="TPL:common.page" page="$page" per="$perpage" count="$count"
                                      total="$totalpage" url="bbs/cate/run?fid=$fid" args="$urlargs"/>--}}
                            </div>

                        @else

                            <div class="not_content">
                                @if ($tab == 'digest')
                                    啊哦，该分类暂没有精华帖！
                                @elseif ($type)
                                    啊哦，该分类暂没有任何内容！
                                @else
                                    啊哦，该分类暂没有任何内容！
                                @endif
                            </div>
                        @endif
                    </div>

                    <section class="face_list" style="display:none;">
                        <h2 class="hd"><a href="#" class="fr fn">查看更多&gt;&gt;</a>当前在线</h2>
                        <article class="ct">
                            <ul class="cc">
                                <?php
                                $online = app(App\Services\online\bm\PwOnlineCountService::class);
                                $list = $online->getLastVisitor($pwforum->fid);
                                ?>
                                @foreach ($list as $value)
                                    <li><a href="#"><img src="{{ asset('assets/images') }}/face/face_small.jpg"
                                                         width="48" height="48"
                                                         alt="{{ $value['username'] }}"><br/>{{ $value['username'] }}
                                        </a></li>
                                @endforeach
                            </ul>
                        </article>
                    </section>
                </div>
            </div>
            <div class="main_sidebar">
               {{-- @include('common.sidebar_2')--}}
            </div>
        </div>

        @if ($operateThread)
            <div id="J_post_manage_main" class="core_pop_wrap J_post_manage_pop"
                 style="display:none;position:fixed;_position:absolute;">
                <div class="core_pop">
                    <div style="width:415px;">
                        <div class="pop_top"><a href="#" id="J_post_manage_close" class="pop_close">关闭</a><strong
                                    class="mr5">帖子操作</strong>(已选中&nbsp;<span class="red"
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
                                                <!-- <li><a href="{{ url('bbs/manage/topped') }}">印戳</a></li>  -->
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
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
      @include('common.footer')
</div>

<script>
    Wind.use('jquery', 'global', function () {
        @if(!isset($is_design))
        @if ($operateThread)
                Wind.js(GV.JS_ROOT + 'pages/bbs/threadManage.js?v=' + GV.JS_VERSION);
        @endif
        @endif
    });
</script>

</body>
</html>