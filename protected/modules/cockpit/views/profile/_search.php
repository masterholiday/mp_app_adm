<?php
/* @var $this ProfileController */
/* @var $model Profile */
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
		<?php echo $form->label($model,'UserId'); ?>
		<?php echo $form->textField($model,'UserId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>600)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Phone'); ?>
		<?php echo $form->textField($model,'Phone',array('size'=>60,'maxlength'=>600)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PhoneCodeRequests'); ?>
		<?php echo $form->textField($model,'PhoneCodeRequests'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PhoneCodeEnter'); ?>
		<?php echo $form->textField($model,'PhoneCodeEnter'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'smsBlockedUntil'); ?>
		<?php echo $form->textField($model,'smsBlockedUntil'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->