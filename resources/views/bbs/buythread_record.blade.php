<div class="ct">
    <h3>本帖购买记录</h3>
    <table>
        <tr>
            <td>序号</td>
            <td>用户名</td>
            <td>花费</td>
            <td>购买时间</td>
        </tr>
        <?php
        $i = 0;
        ?>
        @foreach ($record as $key => $value)
            <tr>
                <td>{{ @++$i }}</td>
                <td>
                    <a href="{{ url('space/index/run?uid=' . $value['created_userid']) }}">{{ $users[$value['created_userid']]['username'] }}</a>
                </td>
                <td>{{ $value['cost'] }} {{ $cType[$value['ctype']] }}</td>
                <td>{{ App\Core\Tool::time2str($value['created_time']) }}</td>
            </tr>
        @endforeach
    </table>
</div>