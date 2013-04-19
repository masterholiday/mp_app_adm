<?php
/* @var $this CallsController */
/* @var $model Calls */

$this->breadcrumbs=array(
	'Calls'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Calls', 'url'=>array('index')),
	array('label'=>'Create Calls', 'url'=>array('create')),
	array('label'=>'View Calls', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Calls', 'url'=>array('admin')),
);
?>

<h1>Update Calls <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>