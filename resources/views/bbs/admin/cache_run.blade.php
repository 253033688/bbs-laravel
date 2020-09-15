<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">
	<form method="post" class="J_ajaxForm" action="{{ url('bbs/cache/dorun') }}">
	<div class="h_a">缓存更新</div>
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="100" />
			<col />
			<tr>
				<th>更新站点缓存</th>
				<td>
					<a class="btn" href="{{ url('bbs/cache/dorun') }}">提交</a>
				</td>
				<td><div class="fun_tips">数据转换后或前台不能正常访问时，可以使用此功能更新所有缓存</div></td>
			</tr>
			<tr>
				<th>重新统计版块帖子数</th>
				<td>
					<a class="btn" href="{{ url('bbs/cache/doforum') }}">提交</a>
				</td>
				<td><div class="fun_tips">当版块帖子数统计不准确时，可以使用此功能重新统计</div></td>
			</tr>
			<tr>
				<th>开启css压缩</th>
				<td>

@if(Core::C('site','css.compress'))
$text='关闭';$tip='已开启';
					}else{ 
					$text='开启';$tip='已关闭';
					} #-->
					<a class="btn J_ajax_refresh" href="{{ url('bbs/cache/buildCss') }}"> {{ $text }}
					</a>
				</td>
				<td><div class="fun_tips">当前状态：<span class="red">{{ $tip }}</span>。开启后，可使css大小减少20%-30%，新装模板需要更新css缓存。</div></td>
			</tr>
			<tr>
				<th>更新css缓存</th>
				<td>
					<a class="btn" href="{{ url('bbs/cache/doCss') }}">提交</a>
				</td>
				<td><div class="fun_tips">在开启css压缩情况下，可以重新压缩css</div></td>
			</tr>
			<tr>
				<th>清除模板缓存</th>
				<td>
					<a class="btn" href="{{ url('bbs/cache/doTpl') }}">提交</a>
				</td>
				<td><div class="fun_tips">当页面显示不正常，可尝试使用此功能修复</div></td>
			</tr>
		</table>
	</div>
	</form>
</div>
@include('admin.common.footer')
</body>
</html>