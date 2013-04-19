<?php
/* @var $this IventorServicesController */
/* @var $model IventorServices */
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
		<?php echo $form->label($model,'IventorId'); ?>
		<?php echo $form->textField($model,'IventorId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CategoryId'); ?>
		<?php echo $form->textField($model,'CategoryId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CityId'); ?>
		<?php echo $form->textField($model,'CityId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PriceId'); ?>
		<?php echo $form->textField($model,'PriceId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'minPrice'); ?>
		<?php echo $form->textField($model,'minPrice'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'maxPrice'); ?>
		<?php echo $form->textField($model,'maxPrice'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->