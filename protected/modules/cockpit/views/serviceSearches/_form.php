<?php
/* @var $this ServiceSearchesController */
/* @var $model ServiceSearches */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-searches-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'SearchID'); ?>
		<?php echo $form->textField($model,'SearchID'); ?>
		<?php echo $form->error($model,'SearchID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CategoriesId'); ?>
		<?php echo $form->textField($model,'CategoriesId'); ?>
		<?php echo $form->error($model,'CategoriesId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EventorID'); ?>
		<?php echo $form->textField($model,'EventorID'); ?>
		<?php echo $form->error($model,'EventorID'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'Info'); ?>
		<?php echo $form->textArea($model,'Info',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Info'); ?>
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
		<?php echo $form->labelEx($model,'UserID'); ?>
		<?php echo $form->textField($model,'UserID'); ?>
		<?php echo $form->error($model,'UserID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SearchDate'); ?>
		<?php echo $form->textField($model,'SearchDate'); ?>
		<?php echo $form->error($model,'SearchDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->