<?php
/* @var $this MailSettingsController */
/* @var $model MailSettings*/
?>

<?php
$this->breadcrumbs=array(
	'Mail Settings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MailSettings', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Manage MailSettings', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>Create MailSettings</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>