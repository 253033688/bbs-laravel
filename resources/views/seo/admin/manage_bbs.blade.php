<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">

<!-- start -->
@include('seoTab')
<div class="h_a">功能说明</div>
<div class="prompt_text">
SEO信息中可以直接输入文字，也可以使用代码。
<p>可以使用的代码包括：</p>
<ol>
<li>全站名称:{sitename}（应用范围：所有位置）</li>
<li>版块名称:{forumname}（应用范围：帖子列表页和帖子阅读页）</li>
<li>版块简介:{forumdescription}（应用范围：帖子列表页）</li>
<li>帖子主题分类名称:{classification}（应用范围：帖子列表页）</li>
<li>帖子标题:{title}（应用范围：帖子阅读页）</li>
<li>帖子摘要:{description}（应用范围：帖子阅读页）</li>
<li>tag名称:{tags}（应用范围：帖子阅读页）</li>
<li>翻页:{page}（应用范围：所有有翻页功能页面）</li>
</ol>

以上标签（必须包含大括号"{{  }}"）可以通过添加在下面来优化页面SEO设置，多个标签之间可以用半角连字符"-"、半角","或半角空格隔开。留空为默认SEO设置

</div>
<form action="{{ url('/seo/manage/doRun?mod=bbs') }}" method="post" class="J_ajaxForm">

@foreach($pages as $alias => $title)

<div class="h_a">
@if($alias == 'thread')
<span class="away_icon mr5 J_toggle_row" title="展开全部版块"></span><!--# } #--> {{ $title }}
</div>

	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>title [标题]</th>
				<td>
					<input data-id="{{ $alias }}" name="seo[{{ $alias }}][0][title]" type="text" class="input length_5 J_seo_input" value="{{ $seo[$alias][0]['title'] }}">
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>description [描述]</th>
				<td>
					<input data-id="{{ $alias }}" name="seo[{{ $alias }}][0][description]" type="text" class="input length_5 J_seo_input" value="{{ $seo[$alias][0]['description'] }}">
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>keywords [关键字]</th>
				<td>
					<input data-id="{{ $alias }}" name="seo[{{ $alias }}][0][keywords]" type="text" class="input length_5 J_seo_input" value="{{ $seo[$alias][0]['keywords'] }}">
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
		</table>
	</div>
	<div class="J_child_wrap" style="display: none;">

@if($alias == 'thread')

	<!--展开后的具体版块页 start-->
	<!--#$type = array('forum' => '60px', 'sub' => '90px', 'sub2' => '120px');#-->

@foreach($cateList as $cate)

	<div class="table_full" style="padding-left:30px;">
		<div class="h_a">&raquo; {{ @strip_tags($cate['name']) }}</div>
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>title [标题]</th>
				<td>
					<input data-id="thread" name="seo[thread][{{ $cate['fid'] }}][title]" type="text" class="input length_5 J_seo_input" value="{{ $seo['thread'][$cate['fid']]['title'] }}">
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>description [描述]</th>
				<td>
					<input data-id="thread" name="seo[thread][{{ $cate['fid'] }}][description]" type="text" class="input length_5 J_seo_input" value="{{ $seo['thread'][$cate['fid']]['description'] }}">
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>keywords [关键字]</th>
				<td>
					<input data-id="thread" name="seo[thread][{{ $cate['fid'] }}][keywords]" type="text" class="input length_5 J_seo_input" value="{{ $seo['thread'][$cate['fid']]['keywords'] }}">
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
		</table>
		</div>

@foreach($forumList[$cate['fid']] as $forum)

	<div class="table_full" style="padding-left:{$type[$forum['type']]};">
		<div class="h_a">&raquo; {{ @strip_tags($forum['name']) }}</div>
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>title [标题]</th>
				<td>
					<input data-id="thread" name="seo[thread][{{ $forum['fid'] }}][title]" type="text" class="input length_5 J_seo_input" value="{{ $seo['thread'][$forum['fid']]['title'] }}">
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>description [描述]</th>
				<td>
					<input data-id="thread" name="seo[thread][{{ $forum['fid'] }}][description]" type="text" class="input length_5 J_seo_input" value="{{ $seo['thread'][$forum['fid']]['description'] }}">
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>keywords [关键字]</th>
				<td>
					<input data-id="thread" name="seo[thread][{{ $forum['fid'] }}][keywords]" type="text" class="input length_5 J_seo_input" value="{{ $seo['thread'][$forum['fid']]['keywords'] }}">
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
		</table>
	</div>
	<!--# } } } #-->
</div>
	<!--展开后的具体版块页 end-->

	<!--# } #-->
	
<div class="btn_wrap">
	<div class="btn_wrap_pd">
		<button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
	</div>
</div>
</form>

</div>
@include('seofooter')
</body>
</html>