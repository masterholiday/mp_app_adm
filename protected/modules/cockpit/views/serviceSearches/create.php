<?php
/* @var $this ServiceSearchesController */
/* @var $model ServiceSearches */

$this->breadcrumbs=array(
	'Service Searches'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ServiceSearches', 'url'=>array('index')),
	array('label'=>'Manage ServiceSearches', 'url'=>array('admin')),
);
?>

<h1>Create ServiceSearches</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>