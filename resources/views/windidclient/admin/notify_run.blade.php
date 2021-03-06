<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">
	<!-- <div class="nav">
		<ul class="cc">
			<li class="current"><a href="{{ url('admin/windidclient/notify/run') }}">通知管理</a></li>
		</ul>
	</div> -->
	<div class="h_a">提示信息</div>
	<div class="mb10 prompt_text">
		<ol>
			<li>用于管理客户端信息同步通知。</li>
			<li>过期通知指的是所有客户端都已执行成功的通知，定期删除可提高系统性能。</li>
			<li>一些总是失败的通知，可以删除掉，可提高系统性能</li>
		</ol>
	</div>
	
	<div class="h_a">搜索</div>
	<div class="search_type cc mb10">
		<form action="{{ url('admin/windidclient/notify/run') }}" method="post">
		<label>执行状态：</label>
			<select name="complete" class="select_2">
				<option value="">不限</option>
				<option value="1" {{ App\Core\Tool::isSelected($args['complete']) }}>成功</option>
				<option value="0" {{ App\Core\Tool::isSelected($args['complete'] === '0') }}>失败</option>
			</select>
			
			
		<label>客户端：</label>
			<select name="clientid" class="select_2">
				<option value="">不限</option>

@foreach ($apps as $v)

				<option value="{{ $v['id'] }}">{{ $v['name'] }}</option>
			<!--#}#-->
			</select>
		<button type="submit" class="btn">搜索</button>
		</form>
	</div>
	<div class="table_list">
		<table width="100%">
			<thead>
				<tr>
					<td width="60">通知ID</td>
					<td>通知对象</td>
					<td>通知内容</td>
					<td>通知时间</td>
					<td>执行次数</td>
					<td>当前状态</td>
					<td>操作</td>
				</tr>
			</thead>

@foreach ($list as $key => $v)

			<tr>
				<td>{{ $v['logid'] }}</td>
				<td>{{ $v['fromclient'] }} -> {{ $v['client'] }}</td>
				<td>{{ $v['operation'] }}</td>
				<td>{{ App\Core\Tool::time2str($v['time'], 'Y-m-d H:i:s') }}</td>
				<td>{{ $v['send_num'] }}</td>
				<td>
@if($v['complete'])
成功
@else
<span style="color:#ff0000">失败</span><!--#}#--></td>
				<td>
@if(!$v['complete'])
<a href="{{ url('windidclient/notify/resend?logid=' . $v['logid']) }}" class="mr10" title="重新发送">[重新发送]</a><!--#}#--><a href="{{ url('windidclient/notify/delete') }}" class="mr10 J_ajax_del" class="mr10 J_ajax_del" data-msg="确定要删除选中内容?" data-pdata="{'logid': {{ $v['logid'] }}}">[删除]</a></td>
			</tr>
		<!--#}#-->
		</table>
	</div>
	<page tpl='TPL:common.page' page='$page' count='$count' per='$perPage' url='windidclient/notify/run' args='$args'/>
	<div class="btn_wrap">
		<div class="btn_wrap_pd" id="J_sub_wrap">
			<a class="btn" href="{{ url('admin/windidclient/notify/clear') }}" title="清理过期通知">清理过期通知</a>
		</div>
	</div>
</div>
@include('admin.common.footer')
</body>
</html>