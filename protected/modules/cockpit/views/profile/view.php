<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List Profile', 'url'=>array('index')),
	array('label'=>'Create Profile', 'url'=>array('create')),
	array('label'=>'Update Profile', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Profile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Profile', 'url'=>array('admin')),
);
?>

<h1>View Profile #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'UserId',
		'Name',
		'Phone',
		'PhoneCodeRequests',
		'PhoneCodeEnter',
		'smsBlockedUntil',
		'Email',
	),
)); ?>
