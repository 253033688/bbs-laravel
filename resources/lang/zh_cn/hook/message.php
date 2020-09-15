<?php

return [
'fail' => "操作 {:error} 失败",

'verify.required' => "验证失败，你好像忘记填写 {:error}",
'verify.depulicate' => "验证失败，重复的 {:error}",
'verify.fail' => "字段{:error}验证失败",


'add.fail.struct' => "添加操作失败，数据结构错误",

'hook.not.exit' => "钩子定义 {:error} 不存在",
'hook.exit' => "已存在的hook定义 {:error}, 不能重复注册相同名称的hook",
'inject.exit' => "inject的别名重复了 {:error}",

'hook.add.fail' => '添加钩子定义失败',
'hook.update.fail' => '更新钩子定义失败',
'hook.del.fail' => '删除钩子定义失败',
'hook.fetch.fail' => '查找钩子定义失败',

'inject.add.fail' => '添加钩子扩展失败',
'inject.update.fail' => '更新钩子扩展失败',
'inject.del.fail' => '删除钩子扩展失败',
'inject.fetch.fail' => '查找钩子扩展失败',


'component.set.verify.fail' => "设置组建失败，组建定义错误，组建别名和组建路径是必须的",

];