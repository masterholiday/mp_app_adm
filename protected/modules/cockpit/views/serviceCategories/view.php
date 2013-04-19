<?php
/* @var $this ServiceCategoriesController */
/* @var $model ServiceCategories */

$this->breadcrumbs=array(
	'Service Categories'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List ServiceCategories', 'url'=>array('index')),
	array('label'=>'Create ServiceCategories', 'url'=>array('create')),
	array('label'=>'Update ServiceCategories', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete ServiceCategories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ServiceCategories', 'url'=>array('admin')),
);
?>

<h1>View ServiceCategories #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'ParentId',
		'CategoryName',
	),
)); ?>
