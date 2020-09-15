<div id="cloudwind_read_readfloor_{{ $read['pid'] }}"></div>
<div class="floor cc J_read_floor" id="read_{{ $read['pid'] }}">
    <table width="100%" style="table-layout:fixed;" class="floor_table">
        <tr>
            <td rowspan="2" class="floor_left">
                <div class="floor_info">
                    <!--头像-->
                    <div class="face">
                        <a href="{{ url('space/index/run?uid=' . $read['created_userid']) }}" class="J_user_card_show"
                           data-uid="{{ $read['created_userid'] }}" target="_blank"><img
                                    src="{{ App\Core\Tool::getAvatar($read['created_userid']) }}" class="J_avatar"
                                    data-type="middle" alt="{{ $read['created_username'] }}"></a>
                    </div>
                    <!--用户名-->
                    <div class="name">
                        <span class="{{ @$users[$read['created_userid']]['gender']==1 ? 'women' : 'man' }}_{{ @($_isol = App\Core\Tool::checkOnline($users[$read['created_userid']]['lastvisit'])) ? 'ol' : 'unol' }}"
                              title="{{ @$_isol ? '在线' : '离线' }}"></span><a
                                href="{{ url('space/index/run?uid=' . $read['created_userid']) }}"
                                class="J_user_card_show mr5"
                                data-uid="{{ $read['created_userid'] }}">{{ $read['created_username'] }}</a>

                        @if ($operateReply['ban'])
                            <span class="J_post_manage_col" data-role="readbar"><a
                                        href="{{ url('bbs/manage/ban?tid=' . $tid . '&uid=' . $read['created_userid']) }}"
                                        data-uid="{{ $read['created_userid'] }}" class="J_dialog_post fn org w">[禁止]</a></span>
                        @endif
                    </div>
                    <!--等级-->
                    <div class="level">
                        <div>{{ $ltitle[$users[$read['created_userid']]['groupid']] }}</div>
                        <img src="{{ asset('assets/images') }}/level/{{ $lpic[$users[$read['created_userid']]['groupid']] }}"
                             alt="{{ $ltitle[$users[$read['created_userid']]['groupid']] }}">
                    </div>
                    <!--相关数据-->
                    <ul class="cc integral">

                        @if ($displayMemberInfo && $read['created_userid'])
                            @foreach ($displayInfo as $key => $value)
                                @if ($key == 'uid')
                                    <li><em>UID</em><span>{{ $read['created_userid'] }}</span></li>
                                @elseif ($key == 'regdate')
                                    <li>
                                        <em>注册日期</em><span>{{ App\Core\Tool::time2str($users[$read['created_userid']]['regdate'], 'Y-m-d') }}</span>
                                    </li>
                                @elseif ($key == 'lastvisit')
                                    <li>
                                        <em>最后登录</em><span>{{ App\Core\Tool::time2str($users[$read['created_userid']]['lastvisit'], 'Y-m-d') }}</span>
                                    </li>
                                @elseif ($key == 'fans')
                                    <li>
                                        <em>粉丝</em><a href="{{ url('space/fans/run?uid=' . $read['created_userid']) }}"
                                                      target="_blank">{{ $users[$read['created_userid']]['fans'] }}</a>
                                    </li>
                                @elseif ($key == 'follows')
                                    <li><em>关注</em><a
                                                href="{{ url('space/follows/run?uid=' . $read['created_userid']) }}"
                                                target="_blank">{{ $users[$read['created_userid']]['follows'] }}</a>
                                    </li>
                                @elseif ($key == 'posts')
                                    <li><em>发帖数</em><a
                                                href="{{ url('space/thread/run?uid=' . $read['created_userid']) }}"
                                                target="_blank">{{ $users[$read['created_userid']]['postnum'] }}</a>
                                    </li>
                                @elseif ($key == 'homepage')
                                    <li><em>个人主页</em><span
                                                title="{{ $users[$read['created_userid']]['homepage'] }}">{{ $users[$read['created_userid']]['homepage'] }}</span>
                                    </li>
                                @elseif ($key == 'location')
                                    <li><em>来自</em><span
                                                title="{{ $users[$read['created_userid']]['location_text'] }}">{{ $users[$read['created_userid']]['location_text'] }}</span>
                                    </li>
                                @elseif ($key == 'qq')
                                    <li><em>QQ</em><span>{{ $users[$read['created_userid']]['qq'] }}</span></li>
                                @elseif ($key == 'aliww')
                                    <li><em>阿里旺旺</em><span>{{ $users[$read['created_userid']]['aliww'] }}</span></li>
                                @elseif ($key == 'birthday')
                                    <li><em>生日</em><span>{{ $users[$read['created_userid']]['byear'] }}
                                            -{$users[$read['created_userid']]['bmonth']}-{{ $users[$read['created_userid']]['bday'] }}</span>
                                    </li>
                                @elseif ($key == 'hometown')
                                    <li><em>家乡</em><span
                                                title="{{ $users[$read['created_userid']]['hometown_text'] }}">{{ $users[$read['created_userid']]['hometown_text'] }}</span>
                                    </li>
                                @elseif (isset($creditBo->cType[$key]))
                                    <li><em>{{ $creditBo->cType[$key] }}</em><span
                                                title="{{ $users[$read['created_userid']]['credit'.$key] }} {{ $creditBo->cUnit[$key] }}">{{ $users[$read['created_userid']]['credit'.$key] }} {{ $creditBo->cUnit[$key] }}</span>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>

                    @if ($read['created_userid'])
                            <!--发私信加关注-->
                    <div class="operate cc">
                        <a rel="nofollow" href="{{ url('my/follow/add') }}" data-uid="{{ $read['created_userid'] }}"
                           class="follow J_read_follow J_qlogin_trigger">加关注</a>
                        <a rel="nofollow" href="{{ url('message/message/pop?username=' . $read['created_username']) }}"
                           class="message J_send_msg_pop J_qlogin_trigger" data-name="{{ $read['created_username'] }}">写私信</a>
                        {{-- <hook class='$threadDisplay' name="createHtmlForUserButton" args="array($users[$read['created_userid']], $read)" /> --}}
                    </div>
                    @endif
                    {{-- <hook class='$threadDisplay' name="createHtmlAfterUserInfo" args="array($users[$read['created_userid']], $read)" /> --}}
                    @if ($read['lou'] == 0)
                    @endif
                            <!--广告位-->
                    {{-- <advertisement id='Read.Layer.User' sys='1'/> --}}
                            <!--信息栏结束-->
                </div>
            </td>
            <td class="box_wrap floor_right">
                <div class="fl">
                    <div class="floor_arrow"><em></em><span></span></div>
                </div>
                @if ($read['lou'] == 0)
                    <div class="floor_title cc">
                        <div class="post_num">
                            <span class="hits">阅读：<em>{{ $threadInfo['hits'] }}</em></span><span class="replies">回复：<em
                                        id="topicRepliesNum">{{ $threadInfo['replies'] }}</em></span>
                        </div>
                        <h1 id="J_post_title">
                            @if ($threadInfo['topic_type'] && ($topicTypename = $threadDisplay->getTopicTypeName($threadInfo['topic_type'])))
                                <a href="{{ url('bbs/thread/run?fid=' . $pwforum->fid . '&type=' . $threadInfo['topic_type']) }}">[{!! $topicTypename !!}
                                    ]</a>
                            @endif
                            {{ $threadInfo['subject'] }}
                        </h1>
				<span class="floor_honor posts_icon">
                    @if ($threadInfo['topped'])
                        <i class="icon_headtopic_1" title="置顶"></i>
                    @endif
                    @if ($threadInfo['digest'])
                        <i class="icon_digest" title="精华"></i>
                    @endif
                    @if ($threadInfo['replies'] > $hotIcon)
                        <i class="icon_topichot" title="热门"></i>
                    @endif
                    @if ($threadInfo['highlight'])
                        <i class="icon_highlight" title="加亮"></i>
                    @endif
				</span>
                    </div>
                @endif
                <div class="c"></div>
                <div class="floor_top_tips cc">
                    <div style="position:relative;"><span class="lou J_floor_copy" title="复制此楼地址"
                                                          @if($read['lou'] == 0)
                                                          data-type="main"
                                                          @endif
                                                          data-hash="read_{{ $read['pid'] }}">{{ @$threadDisplay->getFloorName($read['lou']) }}
                            <sup>#</sup></span></div>
                    @if (!empty($read['istopped']))
                        <div class="inside_digs_icon" title="帖内置顶"></div>
                    @endif
                    <?php
                    if ($read['lou'] == 0) {
                    $_urlDescArgs = $urlDescArgs ? '&' . http_build_query($urlDescArgs) : '';
                    ?>
                    <a href="javascript:;" class="more_down" id="J_read_moredown">更多</a>
                    <div id="J_read_moredown_list" class="core_menu" style="display:none;">
                        <ul class="core_menu_list">
                            <li><a rel="nofollow"
                                   href="{{ url('bbs/read/run?tid=' . $read['tid'] . '&fid=' . $read['fid'] . '&uid=' . $read['created_userid']) }}">只看楼主</a>
                            </li>
                            <li><a rel="nofollow"
                                   href="{{ url('bbs/read/run?tid=' . $read['tid'] . '&fid=' . $read['fid'] . '&desc=1') }}{{ $_urlDescArgs }}">倒序阅读</a>
                            </li>
                        </ul>
                    </div>
                    <?php } ?>
                    <span class="fl">发布于：{{ App\Core\Tool::time2str($read['created_time']) }}
                        @if (Core::getLoginUser()->getPermission('view_ip_address'))
                            ，<span title="IP: {{ $read['created_ip'] }}">来自：{{ $read['ipfrom'] }}</span>
                        @endif
                        @if (Core::getLoginUser()->uid && ($read['created_userid'] == Core::getLoginUser()->uid || $threadPermission['edit']))
                            <a href="{{ url('bbs/post/modify?tid=' . $tid . '&pid=' . $read['pid']) }}">[编辑]</a>
                        @endif
				</span>
                </div>

                @if ($read['disabled'] == 1)
                    <div class="inside_logs"><span class="red">该帖需要审核通过后才能显示</span></div>
                @endif
                @if (!empty($read['istopped']))
                    <div class="inside_logs"><span class="org">帖内置顶</span>&nbsp;&nbsp;&ndash;&nbsp;&nbsp;{$users[$read['topped_userid']]['username']}&nbsp;&nbsp;&ndash;&nbsp;&nbsp;{{ App\Core\Tool::time2str($read['topped_time']) }}
                    </div>
                @endif
                <div id="J_read_main">
                    {{-- <advertisement id='Read.Layer.TidUp' sys='1'/> --}}
                    <?php
                    if ($read['lou'] == 0){
                    $read['tags'] && $reaTags = explode(',', $read['tags']);
                    ?>
                    <div id="J_read_tag_wrap" class="read_tag_list">
                        @foreach ((array)$reaTags as $tag)
                            <a data-url="{{ url('tag/index/card?name=' . $tag) }}"
                               class="J_read_tag_item tag_item"
                               href="{{ url('tag/index/view?name=' . $tag) }}">{{ $tag }}</a>
                            <div class="tag_card J_tag_card" style="display:none;">
                                <div class="pop_loading"></div>
                            </div>
                        @endforeach

                        @if (($read['created_userid'] === Core::getLoginUser()->uid && Core::getLoginUser()->getPermission('tag_allow_add')) || Core::getLoginUser()->getPermission('tag_allow_edit'))
                            <a id="J_read_tag_edit_btn" href="javascript:;" class="edit">[编辑话题]</a>
                        @endif
                    </div>
                    <!--=========话题编辑=========-->
                    <div id="J_read_tag_edit" class="mb10 cc" style="display:none;">
                        <form id="J_read_tag_form"
                              action="{{ url('tag/index/editReadTag?tid=' . $tid) }}" method="post">
                            <div class="user_select_input J_user_tag_wrap fl mr10">
                                <ul class="fl J_user_tag_ul"></ul>
                                <input class="J_user_tag_input" data-name="tagnames[]" type="text"/>
                            </div>
                            <button id="J_read_tag_sub" class="btn btn_submit">保存</button>
                        </form>
                    </div>
                    <?php } ?>
                    @if ($read['lou'] == 0)
                    @endif
                    {{-- <hook class='$threadDisplay' name='createHtmlBeforeContent' args="array($read)" /> --}}
                    <div class="fr">
                        <!--开始右侧广告位-->
                        {{-- <advertisement  id='Read.Layer.TidRight' sys='1'/> --}}
                                <!--结束右侧广告位-->
                    </div>
                    <div class="editor_content">
                        @if ($read['lou'] != 0 && $read['subject'])
                            <div class="inside_title">{{ $read['subject'] }}</div>
                        @endif
                        {!! $read['content'] !!}
                    </div>

                    @if ($read['modified_time'])
                        <div class="edit_log">
                            [{$read['modified_username']}于{{ App\Core\Tool::time2str($read['modified_time']) }}
                            编辑了帖子]
                        </div>
                    @endif
                </div>
            </td>
        </tr>
        <tr>
            <td class="box_wrap floor_bottom" valign="bottom">

                @if ($threadDisplay->attach && $attach = $threadDisplay->attach->getList($read['pid']))
                    @if ($attach['pic'])
                        <?php $_isShowSmall = (count($attach['pic']) >= 5); ?>
                        <div class="read_attach_pic">
                            @if ($_isShowSmall)
                                <div class="hd">
                                    <div class="fr"><a href="javascript:;"
                                                       class="current J_big_images">大图</a><span>|</span><a
                                                href="javascript:;" class="J_small_images">小图</a></div>
                                    <h2>图片</h2>
                                </div>
                            @endif
                            <div class="ct">
                                <ul class="cc big_img J_gallery_list"
                                    style="display:{{ @$_isShowSmall ? 'none' : '' }}">
                                    @foreach ($attach['pic'] as $key => $value)
                                        <li class="J_gallery_items"><span class="J_attach_img_wrap">
                                                <div class="img_info J_img_info">
                                                    @if ($value['descrip'])
                                                        <p>描述：{{ $value['descrip'] }}</p>
                                                    @endif
                                                    <p>图片：{$value['name']}
                                                        @if ($threadPermission['deleteatt'])
                                                            <a class="J_read_img_del w"
                                                               href="{{ url('bbs/attach/delete') }}"
                                                               data-pdata="{'aid':{{ $value['aid'] }}}">[删除]</a>
                                                        @endif
                                                    </p>
                                                </div>
                                                <a data-big="{{ $value['url'] }}"
                                                   href="javascript:;">{!! $value['img'] !!}</a></span>
                                        </li>
                                    @endforeach
                                </ul>

                                @if ($_isShowSmall)
                                    <ul class="cc small_img J_gallery_list">
                                        @foreach ($attach['pic'] as $key => $value)
                                            <li class="J_gallery_items"><a data-big="{{ $value['url'] }}"
                                                                           href="{{ $value['url'] }}"
                                                                           target="_blank"><img
                                                            onerror="this.onerror=null;this.className='J_error';"
                                                            src="{{ $value['miniUrl'] }}" width="125" height="125"
                                                            alt=""></a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    @endif

                    @if ($attach['downattach'])
                        <div class="read_attach_downattach">
                            <dl>
                                <dt class="cc">
                                    <span class="name">附件名称/大小</span>
                                    <span class="cost">下载次数</span>
                                    <span class="time">最后更新</span>
                                    <span class="operate"></span>
                                </dt>
                                @foreach ($attach['downattach'] as $key => $value)
                                    <dd class="cc" id="J_att_{{ $value['aid'] }}">
						<span class="name" title="{{ $value['descrip'] }}"><span class="file_list_wrap"><span
                                        class="file_icon_{{ $value['ext'] }}"></span></span><a class="J_attach_post_buy"
                                                                                               data-cost="
@if ($value['cost'])
                                                                                                       true
                                                                                                        @endif
                                                                                                       "
                                                                                               href="{{ url('bbs/attach/download?aid=' . $value['aid']) }}"
                                                                                               data-credit="{{ Core::getLoginUser()->getCredit($value['ctype']) }}"
                                                                                               data-countrel="#J_attach_count_{{ $value['aid'] }}">{{ $value['name'] }}</a>&nbsp;({$value['size']}KB)&nbsp;</span>
                                    <span class="cost"><span class=""
                                                             id="J_attach_count_{{ $value['aid'] }}">{{ $value['hits'] }}</span></span>
                                        <span class="time">{{ App\Core\Tool::time2str($value['created_time'], 'auto') }}</span>
						<span class="operate">

@if ($value['cost'])

                                售价
                                <span class="org mr10">{{ $value['cost'] }}{{ $creditBo->cType[$value['ctype']] }}</span>
                                <a href="{{ url('bbs/attach/record?aid=' . $value['aid']) }}" title="查看记录"
                                   class="mr10 fn J_buy_record" data-aid="{{ $value['aid'] }}">[记录]</a>
                            @endif

                            @if ($threadPermission['deleteatt'])
                                <a class="J_attach_post_del" data-pdata="{'aid':{{ $value['aid'] }}}"
                                   data-rel="#J_att_{{ $value['aid'] }}"
                                   href="{{ url('bbs/attach/delete') }}">[删除]</a><
                            @endif
						</span>
                                    </dd>
                                @endforeach
                            </dl>
                        </div>
                    @endif
                @endif

                {{-- <hook class='$threadDisplay' name='createHtmlAfterContent' args="array($read)" /> --}}

                @if ($read['lou'] == 0)
                    <div class="read_appbtn_wrap">
                        @if (!$read['pid'])
                            <a role="button" rel="nofollow" href="{{ url('like/mylike/doLike') }}"
                               data-tid="{{ $tid }}" data-pid="{{ $read['pid'] }}" data-fid="{{ $fid }}"
                               class="icon_read_like J_like_btn J_qlogin_trigger" data-role="main" data-typeid="1"
                               data-fromid="{{ $read['tid'] }}">
                                <span>喜欢</span><em class="J_like_count">{{ $read['like_count'] }}</em>
                            </a>
                        @endif
                        {{-- <hook class='$threadDisplay' name='createHtmlContentBottom' args="array($read)" /> --}}
                    </div>
                @endif

                @if (!$read['pid'])
                    <div style="{{ @empty($read['lastLikeUsers']) ? 'display:none' : '' }}"
                         id="J_read_like_list" class="read_like_list cc">
                        <h4 class="J_read_like_tit">最新喜欢：</h4>
                        @if ($read['lastLikeUsers'])
                            @foreach ($read['lastLikeUsers'] as $likeuser)
                                <a class="J_user_card_show" data-uid="{{ $likeuser['uid'] }}"
                                   href="{{ url('space/index/run?uid=' . $likeuser['uid']) }}"><img
                                            class="J_avatar" src="{{ App\Core\Tool::getAvatar($likeuser['uid']) }}"
                                            data-type="small" width="50" height="50"
                                            alt="{{ $likeuser['username'] }}"/><span
                                            title="{{ $likeuser['username'] }}">{{ App\Core\Tool::substrs($likeuser['username'],6) }}</span></a>
                            @endforeach
                        @endif
                    </div>
                @endif
                <div id="app_read_floor_{{ $read['lou'] }}"></div>

                @if ($read['lou'] == 0)
                    <div id="cloudwind_read_content"></div>
                @endif


                @if ($users[$read['created_userid']]['bbs_sign'])
                    <?php
                    $_signheight = (isset($groupRight[$users[$read['created_userid']]['groupid']]['sign_max_height']) && $groupRight[$users[$read['created_userid']]['groupid']]['sign_max_height']) ? $groupRight[$users[$read['created_userid']]['groupid']]['sign_max_height'] : 200;
                    ?>
                    <div class="signature" style="max-height:{{$_signheight}}px;maxHeight:{{$_signheight}}px;">
                        <table width="100%">
                            <tr>
                                <td>{!! $users[$read['created_userid']]['bbs_sign'] !!}</td>
                            </tr>
                        </table>
                    </div>
                @endif
                {{-- <advertisement id='Read.Layer.TidDown' sys='1'/> --}}

                @if ($read['lou'] == 0)
                @endif
                <div class="floor_bottom_tips cc">
                    <?php $type = !$read['pid'] ? 'thread' : 'post'; $type_id = !$read['pid'] ? $read['tid'] : $read['pid']; ?>
                    <span class="fr">

@if ($read['lou'] == 0 && $canLook && App\Core\Tool::getstatus($read['tpcstatus'], PwThread::STATUS_OPERATORLOG))
                            <a href="{{ url('bbs/read/log?tid=' . $read['tid'] . '&fid=' . $read['fid']) }}"
                               class="mr10 J_qlogin_trigger" id="J_inside_logs">查看操作记录</a>
                        @endif

                        @if ($operateReply['toppedreply'] && $read['lou'])
                            @if (!$read['topped'])
                                <a href="#" data-uri="{{ url('bbs/masingle/dotoppedreply?topped=1') }}"
                                   data-pdata="{'tid':{{ $read['tid'] }}, 'lou':{{ $read['lou'] }}, 'pid':{{ $read['pid'] }}}"
                                   class="mr10 J_post_top J_qlogin_trigger">帖内置顶</a>

                            @else
                                <a href="#" data-uri="{{ url('bbs/masingle/dotoppedreply?topped=0') }}"
                                   data-pdata="{'tid':{{ $read['tid'] }}, 'lou':{{ $read['lou'] }}, 'pids':{{ $read['pid'] }}}"
                                   class="mr10 J_post_top J_qlogin_trigger">取消置顶</a>
                            @endif
                        @endif

                        @if ($operateReply['read'])
                            <a href="#" data-uri="{{ url('bbs/masingle/doinspect') }}"
                               data-pdata="{'tid':{{ $read['tid'] }}, 'lou':{{ $read['lou'] }},'pids[]':{{ $read['pid'] }}}"
                               class="mr10 J_read_mark J_qlogin_trigger">已阅</a>
                        @endif

                        @if (Core::getLoginUser()->getPermission('allow_report'))
                            <a rel="nofollow"
                               href="{{ url('report/index/report?type=' . $type . '&type_id=' . $type_id) }}"
                               data-pid="{{ $read['pid'] }}" class="mr10 J_report J_qlogin_trigger">举报</a>
                        @endif

                        @if ($operateReply)
                            <label for="label_{{ $read['pid'] }}"><input name="pids[]"
                                                                         id="label_{{ $read['pid'] }}"
                                                                         type="checkbox"
                                                                         value="{{ $read['pid'] }}"
                                                                         class="J_check checkbox">管理</label>
                        @endif
				</span>

                    @if ($read['lou'] != 0 && (!$pwforum->forumset['locktime'] || ($read['created_time'] + $pwforum->forumset['locktime'] * 86400) > App\Core\Tool::getTime()))
                        <a rel="nofollow"
                           href="{{ url('bbs/post/fastreply?tid=' . $tid . '&pid=' . $read['pid']) }}"
                           data-pid="{{ $read['pid'] }}" class="a_reply J_read_reply"
                           data-topped="{{ @empty($read['istopped']) ? 'false' : 'true' }}">回复<span
                                    style="{{ @$read['replies'] > 0 ? '' : 'display:none' }}">({$read['replies']})</span></a>
                    @else
                        <a rel="nofollow" href="#floor_reply" data-hash="floor_reply" class="a_reply"
                           id="J_readreply_main">回复</a>
                    @endif

                    @if ($read['pid'])
                        <a rel="nofollow" href="{{ url('like/mylike/doLike') }}"
                           data-tid="{{ $tid }}" data-pid="{{ $read['pid'] }}" data-fid="{{ $fid }}"
                           class="a_like J_like_btn J_qlogin_trigger" data-typeid="2"
                           data-fromid="{{ $read['pid'] }}">喜欢</a><span
                                style="{{ @$read['like_count'] ? '' : 'display:none' }}">(<a
                                    class="J_like_user_btn a_like_num" data-pid="{{ $read['pid'] }}"
                                    href="{{ url('like/like/getLast?typeid=2&fromid=' . $read['pid']) }}">{{ $read['like_count'] }}</a>)</span>
                    @endif

                    {{-- <hook class='$threadDisplay' name='createHtmlForThreadButton' args="array($read)" /> --}}

                </div>
                <div style="display:none;" class="J_reply_wrap"
                     id="J_reply_wrap_{$read['pid']}{{ @empty($read['istopped']) ? '' : '_topped' }}">
                    <div class="pop_loading"></div>
                </div>
            </td>
        </tr>
    </table>
</div>

@if ($read['lou'] == 0)
@endif
