<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->order_id,
);
$orderItems = $model->orderItems;
Yii::app ()->clientScript->registerCssFile ( Yii::app()->theme->baseUrl.'/css/order.css');
echo Yii::app()->theme->baseUrl.'/css/order.css';
?>

<h1>View Order #<?php echo $model->order_id; ?></h1>

<?php
    echo $this->renderPartial('_form1', array('model'=>$model,'order_item'=>$orderItems));
?>