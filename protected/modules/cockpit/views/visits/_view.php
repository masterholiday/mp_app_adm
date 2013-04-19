<?php
/* @var $this VisitsController */
/* @var $data Visits */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iventorid')); ?>:</b>
	<?php echo CHtml::encode($data->iventorid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('visits')); ?>:</b>
	<?php echo CHtml::encode($data->visits); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('month')); ?>:</b>
	<?php echo CHtml::encode($data->month); ?>
	<br />


</div>