<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">

<!-- start -->
<div class="nav">
	<ul class="cc">
		<li class="current"><a href="">论坛</a></li>
		<li><a href="">门户</a></li>
		<li><a href="">其他</a></li>
	</ul>
</div>
<div class="h_a">功能说明</div>
<div class="prompt_text">
SEO信息中可以直接输入文字，也可以使用代码。
<p>可以使用的代码包括：</p>
<ol>
<li>论坛名称:{sitename}（应用范围：所有位置）</li>
<li>版块名称:{forumname}（应用范围：帖子列表页和帖子阅读页）</li>
<li>帖子主题分类名称:{classification}（应用范围：帖子列表页）</li>
<li>帖子标题:{title}（应用范围：帖子阅读页）</li>
<li>帖子摘要:{description}（应用范围：帖子阅读页）</li>
<li>tag名称:{tags}（应用范围：帖子阅读页）</li>
</ol>

以上标签（必须包含大括号"{{  }}"）可以通过添加在下面来优化页面SEO设置，多个标签之间可以用半角连字符"-"、半角","或半角空格隔开。留空为默认SEO设置

</div>
<form method="post" class="J_ajaxForm">
<div class="h_a">论坛首页</div>
<div class="table_full">
	<table width="100%">
		<col class="th" />
		<col width="400" />
		<col />
		<tr>
			<th>title [标题]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
				<div class="pop_seo">
					<div class="hd">
						<a href="#" class="close">关闭</a>
						<strong>可以使用的代码（点击插入）：</strong>
					</div>
					<div class="ct">
						<a href="">{{ sitename }}</a>
						<a href="">{{ forumname }}</a>
					</div>
				</div>
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>description [描述]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>keywords [关键字]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
	</table>
</div>

<div class="h_a">本站新帖</div>
<div class="table_full">
	<table width="100%">
		<col class="th" />
		<col width="400" />
		<col />
		<tr>
			<th>title [标题]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>description [描述]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>keywords [关键字]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
	</table>
</div>

<div class="h_a"><span class="start_icon mr5" title="展开全部版块"></span><!--span class="away_icon"></span-->帖子列表页</div>
<div class="table_full">
	<table width="100%">
		<col class="th" />
		<col width="400" />
		<col />
		<tr>
			<th>title [标题]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>description [描述]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>keywords [关键字]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
	</table>
</div>

<div class="table_full" style="padding-left:30px;">
	<div class="h_a">&raquo; 子版块</div>
	<table width="100%">
		<col class="th" />
		<col width="400" />
		<col />
		<tr>
			<th>title [标题]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>description [描述]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>keywords [关键字]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
	</table>
	<div class="h_a">&raquo; 子版块</div>
	<table width="100%">
		<col class="th" />
		<col width="400" />
		<col />
		<tr>
			<th>title [标题]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>description [描述]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>keywords [关键字]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
	</table>
</div>

<div class="h_a">帖子阅读页</div>
<div class="table_full">
	<table width="100%">
		<col class="th" />
		<col width="400" />
		<col />
		<tr>
			<th>title [标题]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>description [描述]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
		<tr>
			<th>keywords [关键字]</th>
			<td>
				<input name="infoName" type="text" class="input length_5" value="">
			</td>
			<td><div class="fun_tips"></div></td>
		</tr>
	</table>
</div>
<div class="btn_wrap">
	<div class="btn_wrap_pd">
		<button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
	</div>
</div>
</form>

</div>
@include('admin.common.footer')
</body>
</html>