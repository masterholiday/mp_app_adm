<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

 <div class="login">
<div class="form">
 <dl>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


	<dd>
		<?php echo $form->textField($model,'username',array('class'=>'login')); ?>
		<?php echo $form->error($model,'username'); ?>
	</dd>

	<dd>
		<?php echo $form->passwordField($model,'password',array('class'=>'password')); ?>
		<?php echo $form->error($model,'password'); ?>
		
	</dd>

	<dd>
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
	</dd>

	<dd>
		<?php echo CHtml::submitButton(''); ?>
	</dd>

<?php $this->endWidget(); ?>
 </dl>
</div><!-- form -->
</div>
