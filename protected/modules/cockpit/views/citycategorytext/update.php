<?php
/* @var $this CitycategorytextController */
/* @var $model Citycategorytext */

$this->breadcrumbs=array(
	'Citycategorytexts'=>array('index'),
	$model->title=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Citycategorytext', 'url'=>array('index')),
	array('label'=>'Create Citycategorytext', 'url'=>array('create')),
	array('label'=>'View Citycategorytext', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Citycategorytext', 'url'=>array('admin')),
);
?>

<h1>Update Citycategorytext <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>