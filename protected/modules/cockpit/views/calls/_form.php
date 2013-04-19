<?php
/* @var $this CallsController */
/* @var $model Calls */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'calls-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'EventorID'); ?>
		<?php echo $form->textField($model,'EventorID'); ?>
		<?php echo $form->error($model,'EventorID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UserID'); ?>
		<?php echo $form->textField($model,'UserID'); ?>
		<?php echo $form->error($model,'UserID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Date'); ?>
		<?php echo $form->textField($model,'Date'); ?>
		<?php echo $form->error($model,'Date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EventorServiceID'); ?>
		<?php echo $form->textField($model,'EventorServiceID'); ?>
		<?php echo $form->error($model,'EventorServiceID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UserDeleted'); ?>
		<?php echo $form->textField($model,'UserDeleted'); ?>
		<?php echo $form->error($model,'UserDeleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EventorDeleted'); ?>
		<?php echo $form->textField($model,'EventorDeleted'); ?>
		<?php echo $form->error($model,'EventorDeleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CallPhoneNumber'); ?>
		<?php echo $form->textField($model,'CallPhoneNumber',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'CallPhoneNumber'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->