<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->order_id,
);
$orderItems = $model->orderItems;
?>

<h1>View Order #<?php echo $model->order_id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'order_id',
        'user_id',
        array(
            'name' => 'status',
            'value' => 'Order::showStatus',
        ),
            array(
            'name' => 'ship_status',
            'value' => 'Order::showShipStatus',
        ),
        array(
            'name' => 'refund_status',
            'value' => 'Order::showRefundStatus',
        ),
        array(
            'name' => 'pay_status',
            'value' => 'Order::showPayStatus',
        ),
		'total_fee',
		'ship_fee',
		'pay_fee',
        array(
            'name' => 'payment_method_id',
            'value' => 'Order::showPayMethod',
        ),
        array(
            'name' => 'shipping_method_id',
            'value' => 'Order::showShipMethod',
        ),
        array(
            'name' => 'receiver_address',
            'value' => 'Order::showDetailAddress',
        ),
		'receiver_zip',
		'receiver_mobile',
		'receiver_phone',
		'memo',
        array(
            'name' => 'pay_time',
            'value' => date('Y年m月d日 H:i:s',$model->pay_time +(8 * 3600)),
        ),
        array(
            'name' => 'ship_time',
            'value' => date('Y年m月d日 H:i:s',$model->ship_time +(8 * 3600)),
        ),
        array(
            'name' => 'create_time',
            'value' => date('Y年m月d日 H:i:s',$model->create_time +(8 * 3600)),
        ),
        array(
            'name' => 'update_time',
            'value' => date('Y年m月d日 H:i:s',$model->update_time +(8 * 3600)),
        ),
	),
)); ?>

<?php
if(!empty($orderItems)){
    ?>
    <table width="100%" border="1" cellspacing="1" cellpadding="0" style="text-align:center;vertical-align:middle">
        <tr>
            <!--        <th width="16%">图片</th>-->
            <th width="16%">名称</th>
            <th width="16%">价格</th>
            <!--        <th width="16%">数量</th>-->
            <th width="16%">数量</th>
            <th width="16%">总计</th>
        </tr>
        <?php
        foreach($orderItems as $item){
            ?>
            <tr>
                <!--            <td>--><?php //echo CHtml::hiddenField($i.'[rowid]', $m['rowid']) ?><!----><?php //echo $m['pic_url'] ?><!--</td>-->
                <td><?php echo $item['title']; ?></td>
                <td><?php echo $item['price']?></td>
                <!--            <td>--><?php //echo CHtml::textField($i.'[qty]', $m['qty'], array('size' => '4', 'maxlength' => '5')) ?><!--</td>-->
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo $item['total_price'];?></td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
}
?>