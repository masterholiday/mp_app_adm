<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Password')); ?>:</b>
	<?php echo CHtml::encode($data->Password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RegistrationDate')); ?>:</b>
	<?php echo CHtml::encode($data->RegistrationDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Social')); ?>:</b>
	<?php echo CHtml::encode($data->Social); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserType')); ?>:</b>
	<?php echo CHtml::encode($data->UserType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Active')); ?>:</b>
	<?php echo CHtml::encode($data->Active); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ActiveKay')); ?>:</b>
	<?php echo CHtml::encode($data->ActiveKay); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SocialID')); ?>:</b>
	<?php echo CHtml::encode($data->SocialID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RememberMe')); ?>:</b>
	<?php echo CHtml::encode($data->RememberMe); ?>
	<br />

	*/ ?>

</div>