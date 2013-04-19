<?php
/* @var $this ServiceCategoriesController */
/* @var $model ServiceCategories */
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
		<?php echo $form->label($model,'ParentId'); ?>
		<?php echo $form->textField($model,'ParentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CategoryName'); ?>
		<?php echo $form->textField($model,'CategoryName',array('size'=>60,'maxlength'=>600)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->