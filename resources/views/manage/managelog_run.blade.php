<div class="content">
	<div class="profile_nav">
		<ul>
			<li class="current"><a href="{{ url('manage/manageLog/run') }}">管理日志</a></li>
		</ul>
	</div>
	<div class="profile_search">
		<form method="post" action="{{ url('manage/manageLog/run') }}">
		<h2>搜索</h2>
		<table width="100%">
			<colgroup>
				<col>
				<col width="200">
			</colgroup>
			<tr>
				<th>操作对象：</th>
				<td><input type="text" class="input length_3" value="{{ $searchData['operated_user'] }}" name="operated_user"></td>
				<th>操作者：</th>
				<td><input type="text" class="input length_3" value="{{ $searchData['created_user'] }}" name="created_user"></td>
			</tr>
			<tr>
				<th>操作描述：</th>
				<td><input type="text" class="input length_3" value="{{ $searchData['keywords'] }}" name="keywords"></td>
				<th>操作类型：</th>
				<td><select name="typeid" class="select_3">
						<option value="" {{ App\Core\Tool::isSelected(!$searchData['typeid']) }}>全部</option>

@foreach ($typeids as $_type => $_typeid)

						<option value="{{ $_typeid }}" {{ App\Core\Tool::isSelected($_typeid == $searchData['typeid']) }}>{{ $typeTitles[$_type] }}</option>
					<!--#}#-->
					</select></td>
			</tr>
			<tr>
				<th>所属版块：</th>
				<td><select name="fid" class="select_3">
						<option value="">所有版块</option>

@foreach($catedb as $cate)

						<optgroup label=">>{{ $cate['name'] }}">

@if ($forumList[$cate['fid']])
foreach ($forumList[$cate['fid']] as $forum) { #-->
									<option value="{{ $forum['fid'] }}" {{ App\Core\Tool::isSelected($forum['fid'] == $searchData['fid']) }}>{!! $forum['level'] !!}|--{{ $forum['name'] }}</option>						<!--#}}#-->
						</optgroup>
					<!--#}#-->
					</select></td>
				<th>IP地址：</th>
				<td><input type="text" class="input length_3" name="ip" value="{{ $searchData['ip'] }}"></td>
			</tr>
			<tr>
				<th>操作时间：</th>
				<td colspan="3"><input class="input length_2 mr5 J_date" type="text" name="start_time" value="{{ $searchData['start_time'] }}"><span class="mr5">至</span><input class="input length_2 J_date" type="text" name="end_time" value="{{ $searchData['end_time'] }}"></td>
			</tr>
		</table>
		<div class="tac"><button type="submit" class="btn">搜索</button></div>
		</form>
	</div>
	
	<div class="profile_table">

@if ($list)

		<table width="100%">
			<thead>
				<tr>
					<td width="80">操作类型</td>
					<td width="90">操作者</td>
					<td width="90">操作对象</td>
					<td width="90">所属版块</td>
					<td>操作描述</td>
					<td width="120">操作时间</td>
					<td width="80">IP</td>
				</tr>
			</thead>

@foreach ($list as $key => $_item)
$forumN = ($_item['fid']) ? $allForumList[$_item['fid']]['name'] : '----------';
	#-->
			<tr>
				<td>{{ $_item['type'] }}</td>
				<td><a href="{{ url('space/index/run?uid=' . $_item['created_userid']|pw) }}" target="_blank">{{ $_item['created_username'] }}</a></td>
				<td><a href="{{ url('space/index/run?uid=' . $_item['operated_uid']|pw) }}" target="_blank">{{ $_item['operated_username'] }}</a></td>
				<td>{{ $forumN|text }}</td>
				<td>{!! $_item['content'] !!}</td>
				<td>{{ App\Core\Tool::time2str($_item['created_time'], 'Y-m-d H:i:s') }}</td>
				<td>{{ $_item['ip'] }}</td>
			</tr>
	<!--#}#-->
		</table>
		<div class="p10">
			<page tpl='TPL:common.page' page='$page' count='$count' per='$perpage' url='manage/manageLog/run' args='$searchData'/>
		</div>

@else

		<div class="not_content">啊哦，没有符合条件的内容！</div>
<!--# } #-->
	</div>
</div>
<script>
Wind.use('ajaxForm', 'dialog', function(){
	var clear = $('#J_clear');
	clear.on('click', function(e){
		e.preventDefault();

		Wind.dialog({
			type : 'confirm',
			isMask	: false,
			message : '确认删除？',
			follow	: clear,
			onOk	: function() {
				clear.parent().find('span').remove();

				$.post(clear.attr('href'), {
					step : '2'
				}, function(data){
					if(data.state == 'success') {
						$( '<span class="tips_success">' + data.message + '</span>' ).appendTo(clear.parent()).fadeIn('slow').delay( 1000 ).fadeOut(function(){
							reloadPage(window);
						});
					}else if(data.state == 'fail'){
						$( '<span class="tips_error">' + data.message + '</span>' ).appendTo(clear.parent()).fadeIn( 'fast' );
					}
				}, 'json');
			}
		});
	});
});
</script>