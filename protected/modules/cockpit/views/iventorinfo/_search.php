<?php
/* @var $this IventorinfoController */
/* @var $model Iventorinfo */
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
		<?php echo $form->label($model,'CompanyName'); ?>
		<?php echo $form->textField($model,'CompanyName',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CompanyPhone'); ?>
		<?php echo $form->textField($model,'CompanyPhone',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Website'); ?>
		<?php echo $form->textField($model,'Website',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Image'); ?>
		<?php echo $form->textField($model,'Image',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Description'); ?>
		<?php echo $form->textArea($model,'Description',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CityId'); ?>
		<?php echo $form->textField($model,'CityId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Balance'); ?>
		<?php echo $form->textField($model,'Balance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Discount'); ?>
		<?php echo $form->textField($model,'Discount',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CountryId'); ?>
		<?php echo $form->textField($model,'CountryId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Skype'); ?>
		<?php echo $form->textField($model,'Skype',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Active'); ?>
		<?php echo $form->textField($model,'Active'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TotalRequests'); ?>
		<?php echo $form->textField($model,'TotalRequests'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Premium'); ?>
		<?php echo $form->textField($model,'Premium'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PremiumUntil'); ?>
		<?php echo $form->textField($model,'PremiumUntil'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->