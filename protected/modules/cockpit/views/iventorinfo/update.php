<?php
/* @var $this IventorinfoController */
/* @var $model Iventorinfo */

$this->breadcrumbs=array(
	'Iventorinfos'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Iventorinfo', 'url'=>array('index')),
	array('label'=>'Create Iventorinfo', 'url'=>array('create')),
	array('label'=>'View Iventorinfo', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Iventorinfo', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>