<!doctype html>
<html>
<head>
@include('common.head')
<link href="{{ asset('assets/themes/site/default/css/dev/style.css') }} "rel="stylesheet" />
</head>
<body {!! $space->space['backbround'] !!}>
<div class="wrap">
{{-- @include('common.header') --}}
<div class="space_page">
	@include('space.common.nav')
	<div class="cc">
		<div class="space_content">
			<div class="box">
				<div class="space_fresh">
					<dl class="cc">
						<dd>

@if ($fresh['title'])

								<div class="title"><a href="{{ url('bbs/read/run?tid=' . $fresh['src_id']) }}" class="subject">{{ $fresh['title'] }}</a></div>
								<div id="J_feed_content_{{ $fresh['id'] }}" class="descrip">{!! $fresh['content'] !!}</div>

@else

								<div id="J_feed_content_{{ $fresh['id'] }}" class="f14">{!! $fresh['content'] !!}</div>
							<!--# } #-->
							<div class="J_content_all" style="display:none;"></div>

@if ($fresh['pic'])

							<div class="photo">
								<ul class="cc J_gallery_list">

@foreach ($fresh['pic'] as $k => $v)

									<li class="fl J_gallery_items"><a href="javascript:;" data-big="{{ App\Core\Tool::getPath($v['path']) }}"><img onerror="this.onerror=null;this.className='J_error';" src="{{ App\Core\Tool::getPath($v['path'], $v['ifthumb']) }}" /></a></li>
									<!--# } #-->
								</ul>
							</div>
							<!--# } #-->

@if ($fresh['quote'])

							<div class="feed_repeat feed_quote">
								<div class="feed_repeat_arrow">
									<em>◆</em>
									<span>◆</span>
								</div>

@if ($fresh['quote']['subject'])

								<div class="title"><a href="{{ url('space/index/run?uid=' . $fresh['quote']['created_userid']) }}" class="name" target="_blank">{{ $fresh['quote']['created_username'] }}</a>：
								<a href="{{ url('bbs/read/run?tid=' . $fresh['quote']['tid']) }}" class="subject" target="_blank">{{ $fresh['quote']['subject'] }}</a>
								</div>
								<div class="descrip">{!! $fresh['quote']['content'] !!}</div>

@else

								<div class="title"><a href="{{ url('u/index/run?uid=' . $fresh['quote']['created_userid']) }}" class="name" target="_blank">{{ $value['quote']['created_username'] }}</a>：
									<span class="descrip">{!! $fresh['quote']['content'] !!}</span>
								</div>
								<!--# } #-->
								<div class="info">
									<span class="right"><!-- <a href="#">喜欢(135)</a><i>|</i> --><a href="{{ url('bbs/read/run?tid=' . $fresh['quote']['tid']) }}">回复({$fresh['quote']['replies']})</a></span>
									<span class="time">{{ App\Core\Tool::time2str($fresh['quote']['created_time'], 'auto') }}</span>&nbsp;来自{!! $fresh['quote']['from'] !!}
								</div>
							</div>
							<!--# } #-->

@if ($fresh['is_read_all'])

							<a id="J_read_all_none" data-dir="down" data-id="J_feed_content_{{ $fresh['id'] }}" href="{{ url('bbs/read/run?tid=' . $fresh['src_id']) }}" class="more w">全文</a>
							<!--# } #-->
						</dd>
					</dl>
					<div class="info_alone">
						<span class="right"><a data-id="{{ $fresh['id'] }}" class="J_fresh_reply" href="{{ url('space/index/reply?id=' . $fresh['id']) }}">回复<span style="
@if (!$fresh['replies'])
display:none;<!--# } #-->">(<em id="J_reply_count">{{ $fresh['replies'] }}</em>)</span></a></span>
						<span class="time">{{ App\Core\Tool::time2str($fresh['created_time'], 'auto') }}</span>&nbsp;来自{!! $fresh['from'] !!}
					</div>
					<div class="feed_repeat_alone J_feed_list" id="J_feed_list_185">
						<div class="feed_repeat_arrow">
							<em>◆</em>
							<span>◆</span>
						</div>
						<form id="J_reply_form" method="post" action="{{ url('space/myspace/doreply') }}">
							<input type="hidden" value="{{ $id }}" name="id"><div class="feed_repeat_textarea">
							<div class="input_area">
								<textarea id="J_reply_textarea" name="content"></textarea>
							</div>
							<div class="addition">
								<a class="icon_face J_insert_emotions" data-emotiontarget="#J_reply_textarea" href="#">表情</a>
								<label><input type="checkbox" name="transmit" value="1">告诉我的粉丝</label>
							</div>
							<div class="enter"><button class="btn btn_submit disabled" id="J_reply_sub" disabled="disabled">提 交</button></div>		</div>
						</form>
						<div class="feed_repeat_list" id="J_reply_wrap">

@if ($replies)


@foreach ($replies as $key => $value)

							<dl class="cc">
								<dt><a class="J_user_card_show" data-uid="{{ $value['created_userid'] }}" href="{{ url('space/index/run?uid=' . $value['created_userid']) }}"><img class="J_avatar" height="30" width="30" src="{{ App\Core\Tool::getAvatar($value['created_userid'], 'small') }}" data-type="small"></a></dt>
								<dd>
									<div class="content"><a class="J_user_card_show" data-uid="{{ $value['created_userid'] }}" href="{{ url('space/index/run?uid=' . $value['created_userid']) }}">{{ $value['created_username'] }}</a>：<em>{!! $value['content'] !!}</em><span>({{ App\Core\Tool::time2str($value['created_time'], 'auto') }})</span></div>
									<div class="repeat_btn"><a class="J_reply_single" href="" data-user="{{ $value['created_username'] }}">回复</a></div>
								</dd>
							</dl>
							<!--# } #-->
							<page tpl="TPL:common.page" page="$page" per="$perpage" count="$count" total="$totalpage" url="space/index/fresh?uid=$uid&id=$fresh[id]"/>

@else

							<div class="tips mb10" id="J_feed_none">啊哦，还没有人评论哦，赶快抢个沙发！</div>
						<!--# } #-->
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="space_sidebar">
			@include('space.common.sidebar')
		</div>
	</div>
</div>
{{--  @include('common.footer') --}}
</div>
<script>
//引入js组件
Wind.use('jquery', 'global', 'dialog', 'ajaxForm', 'tabs', 'draggable', 'uploadPreview', function(){
	Wind.js(GV.JS_ROOT +'pages/space/space_index.js?v='+ GV.JS_VERSION);

	var reply_wrap = $('#J_reply_wrap'),
		reply_sub = $('#J_reply_sub'),
		reply_textarea = $('#J_reply_textarea');

	//重置
	reply_textarea.val('');

	//按钮状态&ctrl+enter提交方法
	Wind.Util.buttonStatus(reply_textarea, reply_sub);
	Wind.Util.ctrlEnterSub(reply_textarea, reply_sub);

	//回复
	$('a.J_fresh_reply').on('click', function(e){
		e.preventDefault();
		reply_textarea.focus();
	});

	//回复单条
	reply_wrap.on('click', 'a.J_reply_single', function(e){
		e.preventDefault();
		var $this = $(this), user = $this.data('user');
		reply_textarea.val('@'+ user +'：').focus();
		
	});

	reply_textarea.on('focus', function(){
		//回复框聚焦后高度自适应
		var $this = $(this), _this = this;
		
		$this.on('keydown keyup', function(){
			var height,
				sc_height = $.browser.msie ? _this.scrollHeight -8 : _this.scrollHeight,		//ie 减去padding值
				this_style=_this.style;

				//每次都先重置高度, ff & chrome
				this_style.height =  18 + 'px';

			if (sc_height > 18) {
				//暂定200为最大高度
				if (sc_height > 180) {
					height = 180;
					this_style.overflowY = 'scroll';
				} else {
					height = $.browser.msie ? _this.scrollHeight -8 : _this.scrollHeight;	//重新获取
					this_style.overflowY = 'hidden';
				}

				this_style.height = height  + 'px';
		
			}

		});
	});

	//提交
	$('#J_reply_form').ajaxForm({
		dataType : 'html',
		beforeSubmit : function(){
			Wind.Util.ajaxBtnDisable(reply_sub);
		},
		data : {
			csrf_token : GV.TOKEN
		},
		success : function(data){
			Wind.Util.ajaxBtnEnable(reply_sub, 'disabled');

			if(Wind.Util.ajaxTempError(data)) {
				return;
			}

				var reply_list = reply_wrap.children();

				if(reply_list.length >= 10) {
					//超过十条则删除最底下的一条
					reply_list.last().remove();
				}
				
				//写入最新回复到顶部
				reply_wrap.prepend(data);
				reply_textarea.val('');
				
				//统计+1
				var reply_count = $('#J_reply_count'),
						c = parseInt(reply_count.text());
				reply_count.text(c+1).parent().show();

				$('#J_feed_none').remove();
		}
	});

	//阅读&收起 全部
	var lock = false;
	$('#J_read_all').on('click', function(e){
		e.preventDefault();
		var $this = $(this),
			content = $('#'+ $this.data('id'));
		
		if($this.data('dir') === 'down') {
			if(lock) {
				return false;
			}
			lock = true;
			//阅读全部
			Wind.Util.ajaxMaskShow();
			$.ajax({
				url : $this.prop('href'),
				dataType : 'html',
				type : 'post',
				success : function(data){
					Wind.Util.ajaxMaskRemove();
					lock = false;
					//global.js
					if(Wind.Util.ajaxTempError(data)) {
						return false;
					}
					content.hide().siblings('.J_content_all').html(data).show();
					$this.text('收起↑').data('dir', 'up');
				}
			});
		}else{
			//收起
			content.show().siblings('.J_content_all').hide().empty();
			$this.text('阅读全部↓').data('dir', 'down');
		}
		
	});

});
</script>
</body>
</html>