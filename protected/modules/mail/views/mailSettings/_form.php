<?php
/* @var $this MailSettingsController */
/* @var $model MailSettings */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'mail-settings-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
<!---->
<!--    <div class="">-->
<!--        --><?php //echo $form->labelEx($model,'mail_id'); ?>
<!--        --><?php //echo $form->textFieldControlGroup($model,'mail_id',array('span'=>5)); ?>
<!--        --><?php //echo $form->error($model,'mail_id'); ?>
<!--    </div>-->
    <div class="">
        <?php echo $form->textFieldControlGroup($model,'title',array('span'=>5,'maxlength'=>100)); ?>
    </div>
    <div class="">
        <?php echo $form->textFieldControlGroup($model,'mail_to',array('span'=>5,'maxlength'=>100)); ?>
    </div>
    <div class="">
        <?php echo $form->textFieldControlGroup($model,'content',array('span'=>5)); ?>
    </div>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->