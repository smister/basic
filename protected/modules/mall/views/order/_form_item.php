<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 14-1-13
 * Time: 下午2:05
 * To change this template use File | Settings | File Templates.
 */
?>
<div class="input-group space">
    <div class="input-group-addon">添加物品</div>
    <?php $item_data=Item::model()->findAll();
    $item=CHtml::listData($item_data, "item_id", "title");
    echo CHtml::dropDownList("selectItem",'',$item,
        array(
            'class' => 'form-control form-control1',
            'empty'=>'请选择',
            'ajax' => array(
                'type' => 'GET', //request type
                'url' =>CController::createUrl('selectProp'), //url to call
                'update' => '#prop-values', //selector to update
                'data' => 'js:"selectItem="+jQuery(this).val()',
            )
        ))?>
</div>
<div id="prop-values"></div>
<div class="btn btn-primary" style="float: right">Add</div>
<div style="clear: both"></div>



