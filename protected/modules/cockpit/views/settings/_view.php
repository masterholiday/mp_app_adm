<?php
/* @var $this SettingsController */
/* @var $data Settings */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KeyName')); ?>:</b>
	<?php echo CHtml::encode($data->KeyName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KeyValue')); ?>:</b>
	<?php echo CHtml::encode($data->KeyValue); ?>
	<br />


</div>