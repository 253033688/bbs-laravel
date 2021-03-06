<?php

return [
'app.no.open' => "任务系统没有开启",
'datamodel.illegal' => "数据模型dm不合法",
'addtask.fail' => "添加任务失败",
'title.empty' => "名称不可为空",
'description.empty' => "描述不可为空",

'updatetask.fail' => "更新任务失败",
'updatetask.success' => "操作成功",
'id.illegal' => "任务id无效",
'param.illegal' => "任务参数无效",
'usertask.replace.fail' => "更新用户任务状态失败",
'request.illegal' => "非法请求",
'edittask.success' => "更新任务成功",
'del.success' => "任务删除成功",
'add.task.success' => "添加任务成功",
'gain.task.reward.success' => "恭喜您，奖励领取成功",
'task.no.complete' => "请先完成该任务",
'already.gain.reward' => "奖励已经领取",

'overtime' => "任务已经过期",
'close' => "任务已经关闭",
'no.open' => "任务没有开始",
'no.right' => "你所在的用户组暂不能领取",
'already.apply' => "用户已经申请",
'pre_task.require' => "申请该任务之前，需要申请完成其前置任务：:title",
'pre_task.no.complete' => "暂不能领取哦，请先完成前置任务【:title】!",
'already.apply.no.complete' => "已申请过该任务，请先完成",
'apply.period.no.complete' => "该任务再次可申领时间为：:time",
'apply.success' => "任务申领成功",
'user.not.login' => "请您先登录",

'delete.error.has.next.task' => "该任务被设置为“:title”的前置任务，删除后将影响“:title”的使用，确定要删除吗？",

'condition.reward.format.error' => "奖励的格式错误",
'condition.require' => "任务完成条件不能为空",

'condition.like.fid.require' => ''请指定版块
'condition.like.num.require' => ''喜欢帖子数不能为空
'condition.like.num.isNonNegative' => '喜欢帖子数非法',

'condition.reply.tid.require' => ''请指定主题ID
'condition.reply.tid.isNonNegative' => '指定的主题ID非法',
'condition.reply.num.require' => ''回帖数不能为空
'condition.reply.num.isNonNegative' => '回帖数非法',

'condition.pos.fid.require' => '发帖指定版块不能为空',
'condition.post.num.require' => ''发帖数不能为空
'condition.post.num.isNonNegative' => '发帖数非法',

'condition.msg.name.require' => ''请指定收消息会员

'condition.fans.num.require' => ''请指定粉丝个数
'condition.fans.num.isNonNegative' => '非法的粉丝个数',

'reward.group.num.require' => '任务奖励用户组有效时间不能为空',
'reward.group.num.isNonNegative' => "任务奖励用户组有效时间非法，请填写正确数字",

'reward.credit.num.require' => '任务奖励积分数量不能为空',
'reward.credit.num.isNonNegative' => '任务奖励积分数量非法',
];