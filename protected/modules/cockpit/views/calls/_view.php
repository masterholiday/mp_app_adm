<?php
/* @var $this CallsController */
/* @var $data Calls */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EventorID')); ?>:</b>
	<?php echo CHtml::encode($data->EventorID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserID')); ?>:</b>
	<?php echo CHtml::encode($data->UserID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Date')); ?>:</b>
	<?php echo CHtml::encode($data->Date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EventorServiceID')); ?>:</b>
	<?php echo CHtml::encode($data->EventorServiceID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserDeleted')); ?>:</b>
	<?php echo CHtml::encode($data->UserDeleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EventorDeleted')); ?>:</b>
	<?php echo CHtml::encode($data->EventorDeleted); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CallPhoneNumber')); ?>:</b>
	<?php echo CHtml::encode($data->CallPhoneNumber); ?>
	<br />

	*/ ?>

</div>