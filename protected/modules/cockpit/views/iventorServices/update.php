<?php
/* @var $this IventorServicesController */
/* @var $model IventorServices */

$this->breadcrumbs=array(
	'Iventor Services'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List IventorServices', 'url'=>array('index')),
	array('label'=>'Create IventorServices', 'url'=>array('create')),
	array('label'=>'View IventorServices', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage IventorServices', 'url'=>array('admin')),
);
?>

<h1>Update IventorServices <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>