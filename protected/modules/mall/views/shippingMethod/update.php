<?php
$this->breadcrumbs=array(
	'Shipping Methods'=>array('index'),
	$model->name=>array('view','shipping_method_id'=>$model->shipping_method_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ShippingMethod', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create ShippingMethod', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'View ShippingMethod', 'url'=>array('view', 'shipping_method_id'=>$model->shipping_method_id)),
	array('label'=>'Manage ShippingMethod', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Update ShippingMethod <?php echo $model->shipping_method_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>