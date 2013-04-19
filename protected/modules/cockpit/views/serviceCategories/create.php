<?php
/* @var $this ServiceCategoriesController */
/* @var $model ServiceCategories */

$this->breadcrumbs=array(
	'Service Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ServiceCategories', 'url'=>array('index')),
	array('label'=>'Manage ServiceCategories', 'url'=>array('admin')),
);
?>

<h1>Create ServiceCategories</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>