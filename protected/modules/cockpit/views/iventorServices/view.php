<?php
/* @var $this IventorServicesController */
/* @var $model IventorServices */

$this->breadcrumbs=array(
	'Iventor Services'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List IventorServices', 'url'=>array('index')),
	array('label'=>'Create IventorServices', 'url'=>array('create')),
	array('label'=>'Update IventorServices', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete IventorServices', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage IventorServices', 'url'=>array('admin')),
);
?>

<h1>View IventorServices #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'IventorId',
		'CategoryId',
		'CityId',
		'PriceId',
		'minPrice',
		'maxPrice',
	),
)); ?>
