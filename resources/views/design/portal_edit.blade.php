<!doctype html>
<html>
<head>
@include('common.head')
<link href="{{ asset('assets/themes/site/default/css/dev') }}/portal.css" rel="stylesheet" />
</head>
<body>
<div class="wrap">
{{-- @include('common.header') --}}
	<div class="main_wrap">
		<div class="bread_crumb"> {!! $headguide !!}
		</div>
		<div class="cc">
			<div class="create_page">
				<h1>编辑页面</h1>
				<h2>基本设置</h2>
				<form id="J_protal_form" action="{{ url('design/portal/doedit?_json=1') }}" method="post">
				<div class="box">
					<dl class="cc">
						<dt>页面标题：</dt>
						<dd><span class="must_red">*</span><input type="text" class="input length_5" name="title" value="{{ $portal['title'] }}"></dd>
					</dl>
					<dl class="cc">
						<dt>静态化名称：</dt>
						<dd><span class="must_red">*</span><input type="text" class="input length_5" name="pagename" value="{{ $portal['pagename'] }}"></dd>
						<dd class="dd_r">不能重复，用于专题静态化时显示在链接中的个性化名称，只能为字母，数字和下划线。</dd>
					</dl>
					<dl class="cc">
						<dt>二级域名：</dt>
						<dd>

@if (isset($root))

						<input type="text" class="input length_2" name="domain" value="{{ $domain }}">.{$root}
						<input type="hidden" name="root" value="{{ $root }}">

@else

						<input type="text" class="input length_5 disabled" disabled="" value="" name="domain">
						<!--# } #-->
						</dd>
						<dd class="dd_r">新增页面的根域名设置后，此处域名设置才会生效。新增页面的二级域名，不能重复。</dd>
					</dl>
					<dl class="cc">
						<dt>封面：</dt>
						<dd>
							<div class="mb10"><label class="mr20"><input class="J_coverfrom" data-role="web" type="radio" name="coverfrom" value="1" checked>网络图片</label><label class="mr20"><input class="J_coverfrom" data-role="local" type="radio" name="coverfrom" value="2">本地上传</label></div>
							<div id="J_coverfrom_web" class="J_coverfrom_items"><input type="text" class="input length_5" name="webcover" value="{{ $portal['cover'] }}"><p class="gray">以http://开头</p></div>
							<div id="J_coverfrom_local" class="J_coverfrom_items" style="display:none;">
								<div class="single_image_up">
									<a href="">上传图片</a>
									<input class="J_upload_preview" data-preview="#J_protal_cover" name="uploadcover" type="file">
								</div>
								<img src="" id="J_protal_cover" style="max-width:300px;" >
							</div>
						</dd>
					</dl>
					<dl class="cc">
						<dt>是否开启：</dt>
						<dd><div><label class="mr20"><input type="radio" name="isopen" value="1" {{ App\Core\Tool::ifcheck($portal['isopen']) }}>开启</label><label class="mr20"><input type="radio" name="isopen" value="0" {{ App\Core\Tool::ifcheck(!$portal['isopen']) }}>关闭</label></div></dd>
					</dl>
					<dl class="cc">
						<dt>附加内容：</dt>
						<dd><div><label class="mr20"><input type="checkbox" name="isheader" value="1" {{ App\Core\Tool::ifcheck($portal['header']) }}>站点头部</label><label class="mr20"><input type="checkbox" name="isfooter" value="1" {{ App\Core\Tool::ifcheck($portal['footer']) }}>底部页脚</label><label class="mr20"><input type="checkbox" name="isnavigate" value="1" {{ App\Core\Tool::ifcheck($portal['navigate']) }}>面包屑导航</label></div></dd>
					</dl>
				</div>
				<h2>SEO优化</h2>
				<div class="box">
					<dl class="cc">
						<dt>description [描述]：</dt>
						<dd><input type="text" class="input length_5" name="description" value="{{ $portal['description'] }}"></dd>
						<dd class="dd_r">页面介绍,此描述内容用于搜索引擎优化，放在meta的description标签中。</dd>
					</dl>
					<dl class="cc">
						<dt>keywords [关键字]：</dt>
						<dd><input type="text" class="input length_5" name="keywords" value="{{ $portal['keywords'] }}"></dd>
						<dd class="dd_r">关键字用于搜索引擎优化，放在 meta 的 keywords 标签中，多个关键字间请用半角逗号 "," 隔开。</dd>
					</dl>
					<dl class="cc">
						<dt>&nbsp;</dt>
						<dd><input type="hidden"  name="portalid" value="{{ $portal['id'] }}"><button type="submit" class="btn btn_submit btn_big mr10" id="J_protal_btn">提交</button></dd>
					</dl>
				</div>
				</form>
			</div>
		</div>
	</div>
{{--  @include('common.footer') --}}
</div>
<script>
Wind.use('jquery', 'global', 'ajaxForm', function(){
/*
 * 切换封面
*/
	$('input.J_coverfrom').on('change', function(){
		var role = $(this).data('role');

		if(this.checked) {
			coverfrom(role);
		}
	});

	//载入判断项
	coverfrom($('input.J_coverfrom:checked').data('role'));

	function coverfrom(role){
		if(role) {
			$('#J_coverfrom_'+ role).show().siblings('.J_coverfrom_items').hide();
		}
	}

/*
 * 提交
*/
	var protal_add_btn = $('#J_protal_btn');
	$('#J_protal_form').ajaxForm({
		dataType : 'json',
		beforeSubmit : function(){
			//global.js
			Wind.Util.ajaxBtnDisable(protal_add_btn);

			protal_add_btn.next().remove();
		},
		success : function(data){
			//global.js
			Wind.Util.ajaxBtnEnable(protal_add_btn);

			if(data.state == 'success') {
				$('<span class="tips_icon_success">' + data.message + '</span>' ).insertAfter(protal_add_btn).fadeIn('slow').delay(1000).fadeOut(function() {
					$(this).remove();

					if(data.referer) {
						location.href = decodeURIComponent(data.referer);
					}
				});
			}else if(data.state == 'fail'){
				$('<span class="tips_icon_error">' + data.message + '</span>').insertAfter(protal_add_btn).fadeIn('slow');
			}
		}
	});

});
</script>
</body>
</html>