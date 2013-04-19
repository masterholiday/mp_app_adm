<?php
/* @var $this IventorServicesController */
/* @var $model IventorServices */

$this->breadcrumbs=array(
	'Iventor Services'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List IventorServices', 'url'=>array('index')),
	array('label'=>'Manage IventorServices', 'url'=>array('admin')),
);
?>

<h1>Create IventorServices</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>