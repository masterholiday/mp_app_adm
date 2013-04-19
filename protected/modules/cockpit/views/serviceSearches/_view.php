<?php
/* @var $this ServiceSearchesController */
/* @var $data ServiceSearches */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SearchID')); ?>:</b>
	<?php echo CHtml::encode($data->SearchID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CategoriesId')); ?>:</b>
	<?php echo CHtml::encode($data->CategoriesId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EventorID')); ?>:</b>
	<?php echo CHtml::encode($data->EventorID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('minPrice')); ?>:</b>
	<?php echo CHtml::encode($data->minPrice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('maxPrice')); ?>:</b>
	<?php echo CHtml::encode($data->maxPrice); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Info')); ?>:</b>
	<?php echo CHtml::encode($data->Info); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('UserDeleted')); ?>:</b>
	<?php echo CHtml::encode($data->UserDeleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EventorDeleted')); ?>:</b>
	<?php echo CHtml::encode($data->EventorDeleted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserID')); ?>:</b>
	<?php echo CHtml::encode($data->UserID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SearchDate')); ?>:</b>
	<?php echo CHtml::encode($data->SearchDate); ?>
	<br />

	*/ ?>

</div>