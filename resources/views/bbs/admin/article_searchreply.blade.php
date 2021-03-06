<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap J_check_wrap">
	<div class="nav">
		<ul class="cc">
			<li><a href="{{ url('bbs/article/run') }}">帖子管理</a></li>
			<li class="current"><a href="{{ url('bbs/article/replylist') }}">回复管理</a></li>
		</ul>
	</div>
	
	<div class="h_a">功能说明</div>
	<div class="prompt_text">
		<ol>
			<li>删除符合条件的帖子用于清理站点冗余数据，此操作不可恢复，请谨慎使用。</li>
			<li>删除主题功能可删除某个会员发布的所有主题(包括回复)，删除回复功能可删除某个会员发表的所有回复。</li>
			<li>搜索支持通配符“*”，多个用户名之间用英文半角逗号","分割。</li>
		</ol>
	</div>
	<div class="h_a">搜索</div>
	<form method="post" action="{{ url('bbs/article/searchreply') }}">
	<div class="search_type cc mb10">
		<label>关键字：</label><input type="text" name="keyword" value="{{ $args['keyword'] }}" class="input length_3 mr10" placeholder="支持帖子标题和正文搜索">
		<label>作者：</label><input type="text" name="created_username" value="{{ $args['created_username'] }}" class="input length_2 mr10">
		<label>所属版块：</label><select name="fid" class="select_3 mr10"><option value="0">所有版块</option>{!! $option_html !!}</select>
		<button class="btn mr20" type="submit">搜索</button><a class="w J_dialog" href="{{ url('bbs/article/replyadvanced') }}" title="高级搜索">高级搜索</a>
	</div>
	</form>
	
	<form class="J_ajaxForm" action="{{ url('bbs/article/deletereply') }}" method="post">

@if ($posts)

	<div class="table_list">
		<table width="100%">
			<colgroup>
				<col width="60">
				<col width="300">
			</colgroup>
			<thead>
				<tr>
					<td><label><input type="checkbox" class="J_check_all" data-direction="x" data-checklist="J_check_x">全选</label></td>
					<td>内容</td>
					<td>作者</td>
					<td>IP</td>
					<td>版块</td>
					<td><span>发帖时间</span></td>
				</tr>
			</thead>

@foreach ($posts as $v)
$v['created_time'] = App\Core\Tool::time2str($v['created_time']);
			$v['content'] = App\Core\Tool::substrs($v['content'], 20);
			$_forumSubject = strip_tags($forumList[$v['fid']]['name']);
			#-->
			<tr>
				<td><input type="checkbox" class="J_check" data-yid="J_check_y" data-xid="J_check_x" name="pids[]" value="{{ $v['pid'] }}"></td>
				<td><a href="{{ url('bbs/read/run?tid=' . $v['tid'] . '&fid=' . $v['fid']|pw) }}#{{ $v['pid'] }}" target="_blank">{{ $v['content'] }}</a></td>
				<td><a href="{{ url('space/index/run?uid=' . $v['created_userid']|pw) }}" target="_blank">{{ $v['created_username'] }}</a></td>
				<td>{{ $v['created_ip'] }}</td>
				<td><a href="{{ url('bbs/thread/run?fid=' . $v['fid']|pw) }}" target="_blank">{{ $_forumSubject }}</a></td>
				<td>{{ $v['created_time'] }}</td>
			</tr>
			<!--# } #-->
		</table>
		<div class="p10">
			<page tpl='TPL:common.page' page='$page' count='$count' per='$perpage' url='bbs/article/searchreply' args='$args'/>
		</div>
	</div>

@else

				<div class="not_content_mini"><i></i>啊哦，没有符合条件的内容！</div>
			<!--# } #-->

@if ($posts)

	<div class="btn_wrap">
		<div class="btn_wrap_pd">
			<div class="select_pages">
				<a href="{{ url('bbs/article/searchreply?perpage=20', $args) }}">20</a><span>|</span>
				<a href="{{ url('bbs/article/searchreply?perpage=50', $args) }}">50</a><span>|</span>
				<a href="{{ url('bbs/article/searchreply?perpage=100', $args) }}">100</a>
			</div>
			<label class="mr20"><input type="checkbox" class="J_check_all" data-direction="y" data-checklist="J_check_y">全选</label>
			<button class="btn J_ajax_submit_btn" type="submit">删除</button>
			<button class="btn btn_submit J_ajax_submit_btn" type="submit" data-action="{{ url('bbs/article/deletereply?isDeductCredit=1') }}">删除并扣除积分</button>
		</div>
	</div>
	<!--# } #-->
	</form>
</div>
@include('admin.common.footer')
</body>
</html>