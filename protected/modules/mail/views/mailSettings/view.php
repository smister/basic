<?php
/* @var $this MailSettingsController */
/* @var $model MailSettings */
?>

<?php
$this->breadcrumbs=array(
	'Mail Settings'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List MailSettings', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create MailSettings', 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>'Update MailSettings', 'icon'=>'pencil', 'url'=>array('update', 'id'=>$model->mail_id)),
	array('label'=>'Delete MailSettings', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->mail_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MailSettings', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>View MailSettings #<?php echo $model->mail_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'mail_id',
		'title',
		'mail_to',
		'content',
	),
)); ?>