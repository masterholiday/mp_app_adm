<?php
/* @var $this IventorPortfolioController */
/* @var $model IventorPortfolio */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'iventor-portfolio-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'IventorId'); ?>
		<?php echo $form->textField($model,'IventorId'); ?>
		<?php echo $form->error($model,'IventorId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FileName'); ?>
		<?php echo $form->textField($model,'FileName',array('size'=>60,'maxlength'=>600)); ?>
		<?php echo $form->error($model,'FileName'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->