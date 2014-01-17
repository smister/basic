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
    <?php $item_data = Item::model()->findAll();
    $item = CHtml::listData($item_data, "item_id", "title");
    echo CHtml::dropDownList("selectItem", '', $item,
        array(
            'class' => 'form-control form-control1',
            'empty' => '请选择',
            'ajax' => array(
                'type' => 'GET', //request type
                'url' => CController::createUrl('selectProp'), //url to call
                'update' => '#Sku_item', //selector to update
                'data' => 'js:"selectItem="+jQuery(this).val()',
            )
        ))?>
</div>
<div class="input-group space">
    <div class="input-group-addon">请输入商品数量</div>
    <input class="form-control form-control1" id="item-number" type="text"
           data-url='<?php echo CController::createUrl("checkStock") ?>'/>

</div>
<div id="StockError"></div>
<div class="input-group space">
    <div class="input-group-addon">添加物品</div>
    <?php echo CHtml::dropDownList('Sku_item', '', array('' => '请选择'), array('class' => 'form-control form-control1')); ?>
</div>
<div id="prop-values" style="float: left"></div>
<div style="clear: both"></div>
<div id="ItemList" style="float: left">


<?php if (isset($Item)) {
    foreach ($Item as $key1=>$item) {
        foreach ($item->orderItems as $key2=>$orderItem) {
            ?>
            <div>
            <input id="Sku_item_id" name="Sku[item_id][]" type="hidden" value="<?php echo $item->item_id ?>"/>
            <input id="Sku_sku_id" name="Sku[sku_id][]" type="hidden" value="<?php echo $ItemSku[$key1][$key2]->sku_id ?>"/>
            <input id="Item-number" name="Item-number[]" type="hidden" value="<?php echo $orderItem->quantity ?>"/>
            <div>商品标题：<?php echo $item->title ?></div>
            <div>商品属性：<?php  foreach (json_decode($orderItem->props_name, true) as $props) {
                    echo $props.' ';
                }?></div>
            <div>商品数量：<?php echo $orderItem->quantity ?></div>
                <div class="btn btn-danger" id="delete">Delete</div>
            </div>
        <?php }
    }
} ?></div>
<div style="clear: both"></div>
<div id="add-button" class="btn btn-primary" style="float: right">Add</div>
<div style="clear: both"></div>

