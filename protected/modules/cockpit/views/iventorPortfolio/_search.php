<?php
/* @var $this IventorPortfolioController */
/* @var $model IventorPortfolio */
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
		<?php echo $form->label($model,'FileName'); ?>
		<?php echo $form->textField($model,'FileName',array('size'=>60,'maxlength'=>600)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->