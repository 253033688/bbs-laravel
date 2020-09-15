<?php

namespace App\Services\tag\bs;

use App\Services\tag\ds\dao\PwTagSearchDao;
use App\Services\tag\vo\PwTagSo;

class PwTagSearch
{

    /**
     * 根据条件搜索用户
     *
     * @param PwUserSo $vo
     * @param int $limit 查询条数
     * @param int $start 开始查询的位置
     * @return array
     */
    public function searchTag(PwTagSo $vo, $limit = 10, $start = 0)
    {
        return $this->_getDao()->searchTag($vo->getData(), $vo->getOrderby(), $limit, $start);
    }

    /**
     * 根据条件统计用户
     *
     * @param PwUserSo $vo
     * @return array
     */
    public function countSearchTag(PwTagSo $vo)
    {
        return $this->_getDao()->countSearchTag($vo->getData());
    }

    /**
     * 获取搜索的DAO
     *
     * @return PwTagSearchDao
     */
    private function _getDao()
    {
        return app(PwTagSearchDao::class);
    }
}