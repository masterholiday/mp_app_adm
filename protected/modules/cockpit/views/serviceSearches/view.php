<?php
/* @var $this ServiceSearchesController */
/* @var $model ServiceSearches */

$this->breadcrumbs=array(
	'Service Searches'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List ServiceSearches', 'url'=>array('index')),
	array('label'=>'Create ServiceSearches', 'url'=>array('create')),
	array('label'=>'Update ServiceSearches', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete ServiceSearches', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ServiceSearches', 'url'=>array('admin')),
);
?>

<h1>View ServiceSearches #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'SearchID',
		'CategoriesId',
		'EventorID',
		'minPrice',
		'maxPrice',
		'Info',
		'UserDeleted',
		'EventorDeleted',
		'UserID',
		'SearchDate',
	),
)); ?>
