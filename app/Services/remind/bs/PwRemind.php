<?php

namespace App\Services\remind\bs;

use App\Services\remind\ds\dao\PwRemindDao;

class PwRemind
{

    /**
     * 根据uid获取最近@数据
     *
     * @param int $uid
     * @return array
     */
    public function getByUid($uid)
    {
        $uid = intval($uid);
        if ($uid < 1) return array();
        return $this->_getRemindDao()->get($uid);
    }

    /**
     * 更新数据
     *
     * @param int $uid
     * @param array $touid
     * @return bool
     */
    public function replaceRemind($uid, $touid)
    {
        $uid = intval($uid);
        if ($uid < 1) return false;
        return $this->_getRemindDao()->replace(array('uid' => $uid, 'touid' => $touid));
    }

    /**
     * 删除
     *
     * @param int $uid
     * @return bool
     */
    public function deleteByUid($uid)
    {
        $uid = intval($uid);
        if ($uid < 1) return false;
        return $this->_getRemindDao()->delete($uid);
    }

    /**
     * @return PwRemindDao
     */
    protected function _getRemindDao()
    {
        return app(PwRemindDao::class);
    }
}