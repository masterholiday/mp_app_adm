<?php
/* @var $this ServiceSearchesController */
/* @var $model ServiceSearches */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SearchID'); ?>
		<?php echo $form->textField($model,'SearchID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CategoriesId'); ?>
		<?php echo $form->textField($model,'CategoriesId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EventorID'); ?>
		<?php echo $form->textField($model,'EventorID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'minPrice'); ?>
		<?php echo $form->textField($model,'minPrice'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maxPrice'); ?>
		<?php echo $form->textField($model,'maxPrice'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Info'); ?>
		<?php echo $form->textArea($model,'Info',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserDeleted'); ?>
		<?php echo $form->textField($model,'UserDeleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EventorDeleted'); ?>
		<?php echo $form->textField($model,'EventorDeleted'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserID'); ?>
		<?php echo $form->textField($model,'UserID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SearchDate'); ?>
		<?php echo $form->textField($model,'SearchDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->