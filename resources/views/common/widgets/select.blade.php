<!-- 数据格式定义：$__tpl_data = array('name' => '' , 'value' => '' , 'options' => '')  -->
<!-- name:select名称,默认值为select；value:select当前值,默认值为0；options:为select的options项,默认一个空项 -->
<!--# isset($__tpl_data['name']) || $__tpl_data['name'] = 'select';
isset($__tpl_data['options']) || $__tpl_data['options'] = array( array('value' => '0', 'text' => ''));  
isset($__tpl_data['value']) || $__tpl_data['value'] = '0';  #-->
<select class="select_2" name="{{ $__tpl_data['name'] }}">
    @foreach($__tpl_data['options'] as $__v)
        <option value="{{ $__v['value'] }}" {{ App\Core\Tool::isSelected($__v['value'] == $__tpl_data['value']) }}>{{ $__v['text'] }}</option>
    @endforeach
</select>