<?php
/* @var $this ServiceCategoriesController */
/* @var $model ServiceCategories */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-categories-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ParentId'); ?>
		<?php 
		$Criteria = new CDbCriteria();
		$Criteria->condition = "ParentId = '0'";
		$cats = ServiceCategories::model()->findAll($Criteria);
		echo $form->dropDownList($model,'ParentId', CHtml::listData($cats,'Id','CategoryName'));?>
		<?php echo $form->error($model,'ParentId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CategoryName'); ?>
		<?php echo $form->textField($model,'CategoryName',array('size'=>60,'maxlength'=>600)); ?>
		<?php echo $form->error($model,'CategoryName'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->