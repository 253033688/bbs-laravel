<!-- 数据格式定义：$__tpl_data = array('name' => '' , 'value' => '')  -->
<!-- name:textarea名称,默认值为timezone；value:textarea当前值,默认值为8  -->
<!--# isset($__tpl_data['name']) || $__tpl_data['name'] = 'content';  
isset($__tpl_data['value']) || $__tpl_data['value'] = '请填写内容';  #-->
<textarea class="length_4 mr10" name="{{ $__tpl_data['name'] }}">{{ $__tpl_data['value'] }}</textarea>