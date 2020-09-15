<?php

return [
'fid.empty' => "fid不能为空",
'fid.select' => "请选择版块",
'forumname.empty' => "版块名称不能为空",
'back.manager' => ":back，不能设为版主",

'TOPIC_TYPE_NAME_EMPTY' => "主题分类名称不能为空",
'TOPIC_TYPE_NAME_LENGTH_LIMIT' => "主题分类名称超过限制",
'TOPIC_TYPE_FID_ERROR' => "主题分类对应版块选择有误",
'TOPIC_TYPE_DATA_IS_EMPTY' => "主题分类数据有误",

'exists.not' => "您访问的版块不存在",
'join.already' => "您已经加入该版块",
'join.not' => "您还没有加入该版块",
'password.error' => "密码错误",

'parentid.same' => "不能选取本版作为上级版块",
'parentid.exists.not' => "上级版块不存在",
'parentid.issub2' => "不能选取二级子版作为上级版块",

'operate.error.exists.not' => "该版块不存在",
'delete.error.hassub' => "该版块含有子版块，请先删除(或转移)子版内容，再行删除",

'unite.error.same' => "相同版块不能合并",
'unite.error.fid.exists.not' => "源版块不存在",
'unite.error.hassub' => "源版块含有子版，请先删除(或转移)子版内容，再行合并",
'unite.error.fid.category' => "分类不能合并",
'unite.error.tofid.exists.not' => "目标版块不存在",
'unite.error.tofid.category' => "不能合并到分类",

'thread.disabled' => "该帖子已被删除或没有通过审核",
'thread.ischeck' => "该帖子没有通过审核，无法查看",
'thread.deleted' => "该帖子已被删除",
'thread.closed' => "该帖子已被关闭",
'thread.exists.not' => "该帖子不存在或已被删除",
'thread.locked.not' => "不能回复已被锁定的帖子",
'thread.right.error' => "该帖子您暂时无法查看",

'permissions.visit.allow' => "您所在的用户组 (:grouptitle) 没有访问该版块的权限",
'permissions.read.allow' => "您所在的用户组 (:grouptitle) 没有在该版块阅读帖子的权限",
'permissions.post.allow' => "您所属的用户组 (:grouptitle) 没有在该版块发布主题的权限",
'permissions.reply.allow' => "您所属的用户组 (:grouptitle) 没有在该版块发布回复的权限",
'permissions.upload.allow' => "您所属的用户组 (:grouptitle) 没有在该版块上传附件的权限",
'permissions.download.allow' => "您所属的用户组 (:grouptitle) 没有在该版块下载附件的权限"
];