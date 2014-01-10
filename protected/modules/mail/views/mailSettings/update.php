<?php
/* @var $this MailSettingsController */
/* @var $model MailSettings */
?>

<?php
$this->breadcrumbs=array(
	'Mail Settings'=>array('index'),
	$model->title=>array('view','id'=>$model->mail_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MailSettings', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create MailSettings', 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>'View MailSettings', 'icon'=>'eye-open', 'url'=>array('view', 'id'=>$model->mail_id)),
	array('label'=>'Manage MailSettings', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

    <h1>Update MailSettings <?php echo $model->mail_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>