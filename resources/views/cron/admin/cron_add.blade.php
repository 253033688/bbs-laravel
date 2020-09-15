<!doctype html>
<html>
<head>
@include('admin.common.head')
</head>
<body>
<div class="wrap">	
	<div class="nav">
		<div class="return"><a href="{{ url('cron/cron/run') }}">返回上一级</a></div>
	</div>
<!--添加计划任务-->
	<div class="h_a">功能说明</div>
	<div class="prompt_text">
		<ol>
			<li>计划任务是一项使系统在规定时间自动执行某些特定任务的功能。</li>
			<li>计划任务与系统核心紧密关联，上传不当的文件可能造成站点无法正常运行。</li>
			<li>关于计划任务的添加，您需要上传相应执行文件到 service/cron/srv/do/目录下,文件名必须为PwCronDoXxx.php形式</li>
		</ol>
	</div>
	<div class="h_a">添加计划任务</div>
	<form class="J_ajaxForm"  action="{{ url('cron/cron/doadd') }}" method="post">
	<div class="table_full">
		<table width="100%">
			<col class="th" />
			<col width="400" />
			<col />
			<tr>
				<th>任务标题</th>
				<td>
					<input type="text" class="input length_5 mr5" name="subject" value="">
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>执行时间</th>
				<td>
					<select id="J_time_select" name="looptype" class="mr10">

@foreach ($loopType as $k=>$v)

						<option value="{{ $k }}">{{ $v }}</option>
					<!--# 
					}
					#-->
					</select>

					<span class="J_time_item" id="J_time_month"  style="">
						<select class="select_2 mr10" name="month_day">
							<option value="1">1日</option>
							<option value="2">2日</option>
							<option value="3">3日</option>
							<option value="4">4日</option>
							<option value="5">5日</option>
							<option value="6">6日</option>
							<option value="7">7日</option>
							<option value="8">8日</option>
							<option value="9">9日</option>
							<option value="10">10日</option>
							<option value="11">11日</option>
							<option value="12">12日</option>
							<option value="13">13日</option>
							<option value="14">14日</option>
							<option value="15">15日</option>
							<option value="16">16日</option>
							<option value="17">17日</option>
							<option value="18">18日</option>
							<option value="19">19日</option>
							<option value="20">20日</option>
							<option value="21">21日</option>
							<option value="22">22日</option>
							<option value="23">23日</option>
							<option value="24">24日</option>
							<option value="25">25日</option>
							<option value="26">26日</option>
							<option value="27">27日</option>
							<option value="28">28日</option>
							<option value="29">29日</option>
							<option value="30">30日</option>
							<option value="31">31日</option>
							<option value="99">最后一天</option>
						</select>
						<select class="select_2"  name="month_hour">
							<option value="0">0点</option>
							<option value="1">1点</option>
							<option value="2">2点</option>
							<option value="3">3点</option>
							<option value="4">4点</option>
							<option value="5">5点</option>
							<option value="6">6点</option>
							<option value="7">7点</option>
							<option value="8">8点</option>
							<option value="9">9点</option>
							<option value="10">10点</option>
							<option value="11">11点</option>
							<option value="12">12点</option>
							<option value="13">13点</option>
							<option value="14">14点</option>
							<option value="15">15点</option>
							<option value="16">16点</option>
							<option value="17">17点</option>
							<option value="18">18点</option>
							<option value="19">19点</option>
							<option value="20">20点</option>
							<option value="21">21点</option>
							<option value="22">22点</option>
							<option value="23">23点</option>
						</select>
					</span>

					<span class="J_time_item" id="J_time_week" style="display:none;">
						<select class="select_2 mr10" name="week_day">
							<option value="1">周一</option>
							<option value="2">周二</option>
							<option value="3">周三</option>
							<option value="4">周四</option>
							<option value="5">周五</option>
							<option value="6">周六</option>
							<option value="0">周日</option>
						</select>
						<select class="select_2" name="week_hour">
							<option value="0">0点</option>
							<option value="1">1点</option>
							<option value="2">2点</option>
							<option value="3">3点</option>
							<option value="4">4点</option>
							<option value="5">5点</option>
							<option value="6">6点</option>
							<option value="7">7点</option>
							<option value="8">8点</option>
							<option value="9">9点</option>
							<option value="10">10点</option>
							<option value="11">11点</option>
							<option value="12">12点</option>
							<option value="13">13点</option>
							<option value="14">14点</option>
							<option value="15">15点</option>
							<option value="16">16点</option>
							<option value="17">17点</option>
							<option value="18">18点</option>
							<option value="19">19点</option>
							<option value="20">20点</option>
							<option value="21">21点</option>
							<option value="22">22点</option>
							<option value="23">23点</option>
						</select>
					</span>

					<span class="J_time_item" id="J_time_day" style="display:none;">
						<select class="select_2 mr10"  name="day_hour">
							<option value="0">0点</option>
							<option value="1">1点</option>
							<option value="2">2点</option>
							<option value="3">3点</option>
							<option value="4">4点</option>
							<option value="5">5点</option>
							<option value="6">6点</option>
							<option value="7">7点</option>
							<option value="8">8点</option>
							<option value="9">9点</option>
							<option value="10">10点</option>
							<option value="11">11点</option>
							<option value="12">12点</option>
							<option value="13">13点</option>
							<option value="14">14点</option>
							<option value="15">15点</option>
							<option value="16">16点</option>
							<option value="17">17点</option>
							<option value="18">18点</option>
							<option value="19">19点</option>
							<option value="20">20点</option>
							<option value="21">21点</option>
							<option value="22">22点</option>
							<option value="23">23点</option>
						</select>
					</span>

					<span class="J_time_item" id="J_time_hour" style="display:none;">
						<select class="select_2" name="hour_minute">
							<option value="0">00分</option>
							<option value="10">10分</option>
							<option value="20">20分</option>
							<option value="30">30分</option>
							<option value="40">40分</option>
							<option value="50">50分</option>
						</select>
					</span>

					<span class="J_time_item" id="J_time_now" style="display:none;">
						<input type="text" class="input length_2 mr5" name="now_time" value="0">
						<select class="select_2" name="now_type">
							<option value="minute">分钟</option>
							<option value="hour">小时</option>
							<option value="day">天</option>
						</select>
					</span>
					
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>开启计划</th>
				<td>
					<ul class="switch_list cc">
						<li><label><input type="radio" name="isopen" value="1" checked><span>开启</span></label></li>
						<li><label><input type="radio" name="isopen" value="0"><span>关闭</span></label></li>
					</ul>
				</td>
				<td><div class="fun_tips"></div></td>
			</tr>
			<tr>
				<th>执行文件</th>
				<td>
					<select class="select_4 mr5" name="filename">

@foreach ($fileList as $file)
$basename = basename($file,".php");
						#-->
							<option value="{{ $basename }}">{{ $file }}</option>
						<!--# 
							}
						#-->
					</select>
				</td>
				<td><div class="fun_tips">请选择任务php文件名称</div></td>
			</tr>
		</table>
	</div>
	<div class="btn_wrap">
		<div class="btn_wrap_pd">
		<button class="btn btn_submit J_ajax_submit_btn" type="submit">提交</button>
		</div>
	</div>
	</form>
<!--结束-->

	
</div>
@include('admin.common.footer')
<script>
$(function(){
	$('#J_time_select').on('change', function(){
		$('#J_time_'+ $(this).val()).show().siblings('.J_time_item').hide();
	});
});
</script>
</body>
</html>