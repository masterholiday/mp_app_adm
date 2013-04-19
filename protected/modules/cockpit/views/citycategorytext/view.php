<?php
/* @var $this CitycategorytextController */
/* @var $model Citycategorytext */

$this->breadcrumbs=array(
	'Citycategorytexts'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Citycategorytext', 'url'=>array('index')),
	array('label'=>'Create Citycategorytext', 'url'=>array('create')),
	array('label'=>'Update Citycategorytext', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Citycategorytext', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Citycategorytext', 'url'=>array('admin')),
);
?>

<h1>View Citycategorytext #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'CategoryID',
		'CityID',
		'Description',
		'desc',
		'title',
	),
)); ?>
