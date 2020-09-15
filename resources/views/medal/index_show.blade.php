
		<form action="#" method="post" class="J_medal_pop_form">
			<dl class="cc">
				<dt id="J_medal_pop_img"><img src="{{ $medal['image'] }}" width="96" height="96"></dt>
					<dd>
						<p><span class="name mr5" id="J_medal_pop_name">{{ $medal['name'] }}</span>

@if($log['award_status'] < 3)


@if (!$isAward)
<span class="tips_icon_error f12">您当前的用户组不支持领取该勋章。</span><!--# } #-->
						<!--# } #-->
						</p>
						<p class="type">勋章类型：
@if($medal['receive_type'] == 1)
自动勋章
@else
手动勋章<!--# }#--></p>
						<p style="" id="J_medal_pop_time_row">有效时长： {{ $medal['expired'] }}</p>
						<p class="descrip">勋章描述： {{ $medal['descrip'] }}</p>

@if($pop == 'wei' && $medal['award_condition'] && $log['award_status'] < 2)
$_show = $medal['behavior'] >= $medal['award_condition'] ? $medal['award_condition'] - 1 : $medal['behavior'];
						#-->
						<p>当前进度： {$_show}/{{ $medal['award_condition'] }}</p>
						<!--#  }#-->

@if ($groupName)

						<p>可领取勋章用户组： {{ $groupName }}</p>
						<!--# } #-->
					</dd>
			</dl>

@if($log['award_status'] == 3)

			<textarea name="content">我获得了“{$medal['name']}”勋章。现在有{$count}个勋章啦，赶紧去领勋章，比比谁的多！[url={{ url('medal/index/run/') }}]查看[/url]</textarea>
			
			<div class="operate">
				<button data-action="{{ url('medal/index/doAward') }}" class="btn btn_success btn_big" type="submit">领取勋章</button><label>
				<input type="checkbox" value="1" checked="checked" name="isfresh">告诉我的粉丝</label>
			</div>

@elseif($log['award_status'] < 2 && $medal['receive_type'] == 1)

			<div class="tac">
				<button class="btn btn_big J_close" type="button">关闭</button>
			</div>

@elseif($log['award_status'] == 2)

			<div class="tac">
				<button disabled class="btn btn_big disabled" type="button">已申请</button>
			</div>

@elseif($isAward && $log['award_status'] < 2 && $medal['receive_type'] == 2)

			<div class="tac" >
				<button data-action="{{ url('medal/index/doApply') }}" class="btn btn_big btn_success" type="submit">申请</button>
			</div>

@else

			<div class="tac">
				<button class="btn btn_big J_close" type="button">关闭</button>
			</div>
			<!--# } #-->
				<input type="hidden" value="{{ $medal['medal_id'] }}" name="medalid">
				<input type="hidden" value="{{ $log['log_id'] }}" name="logid">
		</form>
