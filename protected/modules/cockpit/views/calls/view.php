<?php
/* @var $this CallsController */
/* @var $model Calls */

$this->breadcrumbs=array(
	'Calls'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List Calls', 'url'=>array('index')),
	array('label'=>'Create Calls', 'url'=>array('create')),
	array('label'=>'Update Calls', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Calls', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Calls', 'url'=>array('admin')),
);
?>

<h1>View Calls #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'EventorID',
		'UserID',
		'Date',
		'EventorServiceID',
		'UserDeleted',
		'EventorDeleted',
		'CallPhoneNumber',
	),
)); ?>
