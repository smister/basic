<?php
/* @var $this MailSettingsController */
/* @var $data MailSettings */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('mail_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->mail_id),array('view','id'=>$data->mail_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('mail_to')); ?>:</b>
    <?php echo CHtml::encode($data->mail_to); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
    <?php echo CHtml::encode($data->content); ?>
    <br />
</div>