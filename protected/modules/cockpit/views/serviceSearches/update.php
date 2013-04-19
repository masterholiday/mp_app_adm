<?php
/* @var $this ServiceSearchesController */
/* @var $model ServiceSearches */

$this->breadcrumbs=array(
	'Service Searches'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ServiceSearches', 'url'=>array('index')),
	array('label'=>'Create ServiceSearches', 'url'=>array('create')),
	array('label'=>'View ServiceSearches', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage ServiceSearches', 'url'=>array('admin')),
);
?>

<h1>Update ServiceSearches <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>