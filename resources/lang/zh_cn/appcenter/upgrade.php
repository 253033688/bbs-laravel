<?php

return [
'write.fail' => '#0文件不可写，请提供一个ftp/sftp信息',
'illegal.request' => '非法的升级步骤，返回重新检测',
'site.close' => '升级前请先关闭站点，并对文件及数据备份',
'backup.fail' => '备份文件失败，检查data目录是否可写',
'gzinflate' => '目前升级需要服务器支持解压缩gzinflate函数',
'curl' => '目前升级需要curl扩展',
'file.lost' => '升级文件丢失，请返回重新检测',
'copy.fail' => '覆盖文件失败，请检查#0可写权限',
'db.update' => '正在更新数据库, #0/#1',
'db.error' => '数据库更新失败！请手动执行以下sql语句:#0，并点击继续升级。',
'ftp.fail' => 'ftp连接失败：#0',
'upload.fail' => 'ftp上传失败, #0',
'download.success' => '文件下载成功',
'check.file.fail' => '文件下载失败，尝试重新下载',
'directory.fail' => '下载的升级包没有目录结构directory文件，请尝试返回重新下载',
'version.hash.fail' => '获取当前版本的文件哈希失败, #0',
'hash.fail' => '当前版本的文件哈希md5sum丢失',
'target.hash.fail' => '更新包缺少md5sum文件',
'patch.fail' => '找不到该补丁',
'patch.update.fail' => '补丁#0不支持自动修复或者已做过修复处理',
'choose.one' => '请至少选择一个操作对象',
'founder' => '只有创始人才能进行在线升级操作'
];