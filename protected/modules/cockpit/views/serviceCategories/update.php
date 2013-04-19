<?php
/* @var $this ServiceCategoriesController */
/* @var $model ServiceCategories */

$this->breadcrumbs=array(
	'Service Categories'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ServiceCategories', 'url'=>array('index')),
	array('label'=>'Create ServiceCategories', 'url'=>array('create')),
	array('label'=>'View ServiceCategories', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage ServiceCategories', 'url'=>array('admin')),
);
?>

<h1>Update ServiceCategories <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>