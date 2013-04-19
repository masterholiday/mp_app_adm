<?php
/* @var $this CallsController */
/* @var $model Calls */

$this->breadcrumbs=array(
	'Calls'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Calls', 'url'=>array('index')),
	array('label'=>'Manage Calls', 'url'=>array('admin')),
);
?>

<h1>Create Calls</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>