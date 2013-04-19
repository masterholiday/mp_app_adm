<?php
/* @var $this IventorServicesController */
/* @var $data IventorServices */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IventorId')); ?>:</b>
	<?php echo CHtml::encode($data->IventorId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CategoryId')); ?>:</b>
	<?php echo CHtml::encode($data->CategoryId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CityId')); ?>:</b>
	<?php echo CHtml::encode($data->CityId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PriceId')); ?>:</b>
	<?php echo CHtml::encode($data->PriceId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('minPrice')); ?>:</b>
	<?php echo CHtml::encode($data->minPrice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maxPrice')); ?>:</b>
	<?php echo CHtml::encode($data->maxPrice); ?>
	<br />


</div>