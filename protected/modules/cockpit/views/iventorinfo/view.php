<?php
/* @var $this IventorinfoController */
/* @var $model Iventorinfo */

$this->breadcrumbs=array(
	'Iventorinfos'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Iventorinfo', 'url'=>array('index')),
	array('label'=>'Create Iventorinfo', 'url'=>array('create')),
	array('label'=>'Update Iventorinfo', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Iventorinfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Iventorinfo', 'url'=>array('admin')),
);
?>

<h1>View Iventorinfo #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'UserId',
		'CompanyName',
		'CompanyPhone',
		'Website',
		'Image',
		'Description',
		'CityId',
		'Balance',
		'Discount',
		'CountryId',
		'Skype',
		'Active',
		'TotalRequests',
		'Email',
		'Premium',
		'PremiumUntil',
	),
)); ?>
