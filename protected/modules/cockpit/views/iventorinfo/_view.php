<?php
/* @var $this IventorinfoController */
/* @var $data Iventorinfo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserId')); ?>:</b>
	<?php echo CHtml::encode($data->UserId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CompanyName')); ?>:</b>
	<?php echo CHtml::encode($data->CompanyName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CompanyPhone')); ?>:</b>
	<?php echo CHtml::encode($data->CompanyPhone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Website')); ?>:</b>
	<?php echo CHtml::encode($data->Website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Image')); ?>:</b>
	<?php echo CHtml::encode($data->Image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CityId')); ?>:</b>
	<?php echo CHtml::encode($data->CityId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Balance')); ?>:</b>
	<?php echo CHtml::encode($data->Balance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Discount')); ?>:</b>
	<?php echo CHtml::encode($data->Discount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CountryId')); ?>:</b>
	<?php echo CHtml::encode($data->CountryId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Skype')); ?>:</b>
	<?php echo CHtml::encode($data->Skype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Active')); ?>:</b>
	<?php echo CHtml::encode($data->Active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TotalRequests')); ?>:</b>
	<?php echo CHtml::encode($data->TotalRequests); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Email')); ?>:</b>
	<?php echo CHtml::encode($data->Email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Premium')); ?>:</b>
	<?php echo CHtml::encode($data->Premium); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PremiumUntil')); ?>:</b>
	<?php echo CHtml::encode($data->PremiumUntil); ?>
	<br />

	*/ ?>

</div>