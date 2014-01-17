<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->order_id,
);

$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'Update Order', 'url'=>array('update', 'id'=>$model->order_id)),
	array('label'=>'Delete Order', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->order_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);
?>

<h1>View Order #<?php echo $model->order_id; ?></h1>


<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'order_id',
        'user_id',
        'status',
        'pay_status',
        'ship_status',
        'refund_status',
        'total_fee',
        'ship_fee',
        'pay_fee',
        'pay_method',
        'ship_method',
        'receiver_name',
        'receiver_country',
        'receiver_state',
        'receiver_city',
        'receiver_district',
        'receiver_address',
        'receiver_zip',
        'receiver_mobile',
        'receiver_phone',
        'memo',
        'pay_time',
        'ship_time',
        'create_time',
        'update_time',
    ),
)); ?>

<?php
    if(!empty($items)){
?>
    <table width="100%" border="1" cellspacing="1" cellpadding="0" style="text-align:center;vertical-align:middle">
    <tr>
<!--        <th width="16%">图片</th>-->
        <th width="16%">名称</th>
        <th width="16%">价格</th>
<!--        <th width="16%">数量</th>-->
        <th width="16%">描述</th>
        <th width="16%">运费</th>
    </tr>
    <?php
        foreach($items as $item){
    ?>
        <tr>
<!--            <td>--><?php //echo CHtml::hiddenField($i.'[rowid]', $m['rowid']) ?><!----><?php //echo $m['pic_url'] ?><!--</td>-->
            <td><?php echo $item['title']; ?></td>
            <td><?php echo $item['currency'].$item['price'];?></td>
<!--            <td>--><?php //echo CHtml::textField($i.'[qty]', $m['qty'], array('size' => '4', 'maxlength' => '5')) ?><!--</td>-->
            <td><?php echo $item['desc']; ?></td>
            <td><?php echo $item['shipping_fee'];?></td>
        </tr>
    <?php
        }
    ?>
    </table>
<?php
    }
?>