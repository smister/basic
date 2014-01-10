<?php
/* @var $this MailSettingsController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Mail Settings',
);

//$this->menu=array(
//	array('label'=>'Create MailSettings', 'icon'=>'plus', 'url'=>array('create')),
//	array('label'=>'Manage MailSettings', 'icon'=>'cog', 'url'=>array('admin')),
//);
//?>




</div>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>