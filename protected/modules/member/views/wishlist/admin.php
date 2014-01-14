<?php

$this->breadcrumbs = array(
    '我的收藏' => array('admin'),
    '管理',
);
?>

<div class="box">
    <div class="box-title">我的收藏</div>
    <div class="box-content">
        <?php
$url=Yii::app()->baseUrl.'/item/';
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'wishlist-grid',
    'dataProvider' => $model->search(),
//    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'item.title',
            'value' => 'CHtml::link($data->item->title,$url)',
        ),
       array(
            'name' => 'item.price',
            'value' => '$data->item->price',
        ),
        array(
            'name' => 'item.stock',
            'value' => '$data->item->stock',
        ),
        array(
            'name' => 'create_time',
            'value' => 'date("Y-m-d", $data->create_time)',
            'htmlOptions' => array('style'=>'width:100px')
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{view}{update}{delete}',
            'viewButtonUrl' => 'Yii::app()->createUrl("/item/view",
array("id" => $data->item_id))',
        ),
    ),
));
?>
    </div>
</div>

