<?php
/* @var $this ReferencesController */
/* @var $model References */

$this->breadcrumbs=array(
	'References'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List References', 'url'=>array('index')),
	array('label'=>'Create References', 'url'=>array('create')),
	array('label'=>'Update References', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete References', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage References', 'url'=>array('admin')),
);
?>

<h1>View References #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'iventorid',
		'link',
		'reference',
		'year',
		'month',
	),
)); ?>
