<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Manage',
);

?>
<h1>Manage Orders</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<?php echo CHtml::link('<div class="btn btn-primary">Create Order</div>','#',array('class'=>'search-button',)); ?>
<div class="search-form" style="display:none">

    <?php $this->renderPartial('select_user',array(
        'users'=>$users,
    )); ?>
</div>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

		'order_id',
        array(
            'name' => 'user_id',
            'value' =>'Tbfunction::getUser($data->user_id)',
            'filter' => Tbfunction::getUser($data->user_id),
        ),
        array(
            'name' => 'pay_status',
            'value' => '$data->showPayStatus()',
            'filter' => Tbfunction::ReturnPayStatus(),
        ),
        array(
            'name' => 'ship_status',
            'value' => '$data->showShipStatus()',
            'filter' => Tbfunction::ReturnShipStatus(),
        ),
        array(
            'name' => 'refund_status',
            'value' => '$data->showRefundStatus()',
            'filter' => Tbfunction::ReturnRefundStatus(),
        ),
        array(
            'name' => 'payment_method_id',
            'value' => '$data->showPayMethod()',
            'filter' => Tbfunction::ReturnPayMethod(),
        ),
        'pay_fee',
        'ship_fee',
        'total_fee',
        array(
            'name' => 'shipping_method_id',
            'value' => '$data->showShipMethod()',
            'filter' => Tbfunction::ReturnShipMethod(),
        ),
        array(
            'name' => 'create_time',
            'value' => 'date("Y年m月d日 H:i:s",$data->create_time)',
        ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
));
?>
