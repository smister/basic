<?php
$this->breadcrumbs=array(
	'Order Logs'=>array('index'),
	$model->log_id,
);

?>

<h1>View OrderLog #<?php echo $model->log_id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'log_id',
		'order_id',
		'op_name',
        array(
            'name' => 'action_time',
            'value' => date("Y年m月d日 H:i:s",$model->action_time),
        ),
        array(
            'name' => 'log_text',
            'value' =>$model->showOp($model->log_id)
        ),
		'user_id',
		'result',
	),
)); ?>
