<?php
/* @var $this MailSettingsController */
/* @var $model MailSettings */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model,'mail_id',array('span'=>5)); ?>

    <?php echo $form->textFieldControlGroup($model,'title',array('span'=>5,'maxlength'=>100)); ?>

    <?php echo $form->textFieldControlGroup($model,'mail_to',array('span'=>8,'maxlength'=>100)); ?>

    <?php echo $form->textFieldControlGroup($model,'content',array('span'=>12)); ?>


    <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->