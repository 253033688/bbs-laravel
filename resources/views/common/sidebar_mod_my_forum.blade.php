<?php
if (Core::getLoginUser()->info['join_forum']){
Wind::import('APPS:bbs.controller.ForumController');
$myJoinForum = ForumController::splitStringToArray(Core::getLoginUser()->info['join_forum']);
$myJoinForumCount = count($myJoinForum);
?>
<div class="box_wrap my_forum_list"><!--切换样式 my_forum_list_cur-->
    <h2 class="box_title J_sidebar_box_toggle"> 我的版块<span class="num">{{ $myJoinForumCount }}</span></h2>
    <ul>

        @foreach ($myJoinForum as $v => $k)

            <li><a href="{{ url('bbs/thread/run?fid=' . $v) }}">{{ $k }}</a></li>
        @endforeach
    </ul>
</div>
<?php } ?>
        <!--advertisement id='Site.Sider.User' sys='1'/-->