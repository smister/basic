<?php
$this->breadcrumbs = array(
    'Orders' => array('index'),
    'Manage',
);

?>
<h1>Manage Orders</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<?php echo CHtml::link('<div class="btn btn-primary">Create Order</div>', '#', array('class' => 'search-button',)); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('select_user', array(
        'users' => $users,
    )); ?>
</div>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'order-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(

        'order_id',
        array(
            'name' => 'user_id',
            'value' => 'Tbfunction::getUser($data->user_id)',
            'filter' => Tbfunction::showUser(),
        ),
        array(
            'name' => 'pay_status',
            'value' => 'Tbfunction::showPayStatus($data->pay_status)',
            'filter' => Tbfunction::ReturnPayStatus(),
        ),


        array(
            'name' => 'refund_status',
            'value' =>'Tbfunction::showRefundStatus($data->refund_status)',
            'filter' => Tbfunction::ReturnRefundStatus(),
        ),
        array(
            'name' => 'payment_method_id',
            'value' => 'Tbfunction::showPayMethod($data->payment_method_id)',
            'filter' => Tbfunction::ReturnPayMethod(),
        ),
        'pay_fee',
        'ship_fee',
        'total_fee',
        array(
            'name' => 'shipping_method_id',
            'value' => 'Tbfunction::showShipMethod($data->shipping_method_id)',
            'filter' => Tbfunction::ReturnShipMethod(),
        ),
        array(
            'name' => 'create_time',
            'value'=>'date("Y-m-d H:i;s",$data->create_time+8*3600)'
        ),

        array(
            'name' => 'receiver_name',
        ),
        array(
            'value' => 'Tbfunction::deliver_goods($data->order_id)',
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
