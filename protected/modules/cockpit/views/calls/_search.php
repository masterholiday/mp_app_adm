<?php
/* @var $this CallsController */
/* @var $model Calls */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID'); ?>
		<?php echo $form->textField($model,'ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EventorID'); ?>
		<?php echo $form->textField($model,'EventorID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UserID'); ?>
		<?php echo $form->textField($model,'UserID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Date'); ?>
		<?php echo $form->textField($model,'Date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EventorServiceID'); ?>
		<?php echo $form->textField($model,'EventorServiceID'); ?>
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
		<?php echo $form->label($model,'CallPhoneNumber'); ?>
		<?php echo $form->textField($model,'CallPhoneNumber',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->