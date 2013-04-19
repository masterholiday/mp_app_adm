<?php
/* @var $this IventorServicesController */
/* @var $model IventorServices */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'iventor-services-form',
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
		<?php echo $form->labelEx($model,'CategoryId'); ?>
		<?php echo $form->textField($model,'CategoryId'); ?>
		<?php echo $form->error($model,'CategoryId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CityId'); ?>
		<?php echo $form->textField($model,'CityId'); ?>
		<?php echo $form->error($model,'CityId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PriceId'); ?>
		<?php echo $form->textField($model,'PriceId'); ?>
		<?php echo $form->error($model,'PriceId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'minPrice'); ?>
		<?php echo $form->textField($model,'minPrice'); ?>
		<?php echo $form->error($model,'minPrice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'maxPrice'); ?>
		<?php echo $form->textField($model,'maxPrice'); ?>
		<?php echo $form->error($model,'maxPrice'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->