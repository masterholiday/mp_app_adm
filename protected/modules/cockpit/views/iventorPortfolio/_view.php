<?php
/* @var $this IventorPortfolioController */
/* @var $data IventorPortfolio */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IventorId')); ?>:</b>
	<?php echo CHtml::encode($data->IventorId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FileName')); ?>:</b>
	<?php echo CHtml::encode($data->FileName); ?>
	<br />


</div>