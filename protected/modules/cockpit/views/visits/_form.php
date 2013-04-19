<?php
/* @var $this VisitsController */
/* @var $model Visits */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'visits-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'iventorid'); ?>
		<?php echo $form->textField($model,'iventorid'); ?>
		<?php echo $form->error($model,'iventorid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'visits'); ?>
		<?php echo $form->textField($model,'visits'); ?>
		<?php echo $form->error($model,'visits'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year'); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'month'); ?>
		<?php echo $form->textField($model,'month'); ?>
		<?php echo $form->error($model,'month'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->