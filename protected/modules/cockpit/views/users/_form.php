<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Password'); ?>
		<?php echo $form->passwordField($model,'Password',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'Password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RegistrationDate'); ?>
		<?php echo $form->textField($model,'RegistrationDate'); ?>
		<?php echo $form->error($model,'RegistrationDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Social'); ?>
		<?php echo $form->textField($model,'Social',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Social'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UserType'); ?>
		<?php echo $form->textField($model,'UserType'); ?>
		<?php echo $form->error($model,'UserType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Active'); ?>
		<?php echo $form->textField($model,'Active'); ?>
		<?php echo $form->error($model,'Active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ActiveKay'); ?>
		<?php echo $form->textField($model,'ActiveKay',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'ActiveKay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SocialID'); ?>
		<?php echo $form->textField($model,'SocialID',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'SocialID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RememberMe'); ?>
		<?php echo $form->textField($model,'RememberMe',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'RememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->