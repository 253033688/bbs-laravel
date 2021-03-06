<?php

namespace App\Services\recycle\bs;

use App\Services\recycle\dm\PwReplyRecycleDm;
use App\Services\recycle\ds\dao\PwReplyRecycleDao;
use App\Services\recycle\vo\PwRecycleReplySo;

class PwReplyRecycle
{

    /**
     * 获取多条回收站记录
     *
     * @param array $pids
     * @return array
     */
    public function fetchRecord($pids)
    {
        if (!$pids || !is_array($pids)) return array();
        return $this->_getDao()->fetchRecord($pids);
    }

    /**
     * 添加一条回收站记录(帖子)
     *
     * @param PwReplyRecycleDm $dm
     * return bool
     */
    public function add(PwReplyRecycleDm $dm)
    {
        if (($result = $dm->beforeAdd()) !== true) {
            return $result;
        }
        return $this->_getDao()->add($dm->getData());
    }

    /**
     * 批量添加回收站记录(帖子)
     *
     * @param array $dms PwReplyRecycleDm的对象集合
     * @return bool
     */
    public function batchAdd($dms)
    {
        if (empty($dms) || !is_array($dms)) return false;
        $data = array();
        foreach ($dms as $key => $dm) {
            if ($dm instanceof PwReplyRecycleDm && $dm->beforeAdd() === true) {
                $data[] = $dm->getData();
            }
        }
        if (!$data) return false;
        return $this->_getDao()->batchAdd($data);
    }

    /**
     * 批量删除回收站记录
     *
     * @param array $pids
     * @return bool
     */
    public function batchDelete($pids)
    {
        if (empty($pids)) return false;
        return $this->_getDao()->batchDelete($pids);
    }

    /**
     * 统计回收站帖子数(搜索)
     *
     * @param object $so
     * @return int
     */
    public function countSearchRecord(PwRecycleReplySo $so)
    {
        return $this->_getDao()->countSearchRecord($so->getData());
    }

    /**
     * 搜索回收站的帖子
     *
     * @param array $param
     * @return array
     */
    public function searchRecord(PwRecycleReplySo $so, $limit = 20, $offset = 0)
    {
        return $this->_getDao()->searchRecord($so->getData(), $so->getOrderby(), $limit, $offset);
    }

    protected function _getDao()
    {
        return app(PwReplyRecycleDao::class);
    }
}