<?php
/* @var $this ProfileController */
/* @var $data Profile */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserId')); ?>:</b>
	<?php echo CHtml::encode($data->UserId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Phone')); ?>:</b>
	<?php echo CHtml::encode($data->Phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PhoneCodeRequests')); ?>:</b>
	<?php echo CHtml::encode($data->PhoneCodeRequests); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PhoneCodeEnter')); ?>:</b>
	<?php echo CHtml::encode($data->PhoneCodeEnter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('smsBlockedUntil')); ?>:</b>
	<?php echo CHtml::encode($data->smsBlockedUntil); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	*/ ?>

</div>