<!--帖子管理记录-->
<div style="width:500px;">
    <div class="pop_cont">
        <div class="pop_design_tablelist" style="max-height:260px;overflow-y:auto;">
            <table width="100%">
                <thead>
                <tr>
                    <td width="110">操作者</td>
                    <td width="80">操作类型</td>
                    <td>有效期</td>
                    <td>操作时间</td>
                </tr>
                </thead>

                <?php
                foreach ($list as $_item){
                $end_time = $_item['extends'] ? (is_numeric($_item['extends']) ? App\Core\Tool::time2str($_item['extends'],
                        'Y-m-d H:i') : $_item['extends']) : '-- --';
                ?>
                <tr>
                    <td><a href="{{ url('space/index/run?uid=' . $_item['created_userid']) }}"
                           target="_blank">{{ $_item['created_username'] }}</a></td>
                    <td>{{ $_item['type'] }}</td>
                    <td>{{ $end_time }}</td>
                    <td>{{ App\Core\Tool::time2str($_item['created_time'], 'Y-m-d H:i:s') }}</td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
    <div class="pop_bottom">
        <button type="button" class="btn" id="J_log_close">关闭</button>
    </div>
</div>
<!--结束-->