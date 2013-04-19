<?php
/* @var $this ProfileController */
/* @var $model Profile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profile-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'UserId'); ?>
		<?php echo $form->textField($model,'UserId'); ?>
		<?php echo $form->error($model,'UserId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>600)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Phone'); ?>
		<?php echo $form->textField($model,'Phone',array('size'=>60,'maxlength'=>600)); ?>
		<?php echo $form->error($model,'Phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PhoneCodeRequests'); ?>
		<?php echo $form->textField($model,'PhoneCodeRequests'); ?>
		<?php echo $form->error($model,'PhoneCodeRequests'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PhoneCodeEnter'); ?>
		<?php echo $form->textField($model,'PhoneCodeEnter'); ?>
		<?php echo $form->error($model,'PhoneCodeEnter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'smsBlockedUntil'); ?>
		<?php echo $form->textField($model,'smsBlockedUntil'); ?>
		<?php echo $form->error($model,'smsBlockedUntil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->