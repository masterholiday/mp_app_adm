<?php
/* @var $this ReferencesController */
/* @var $model References */

$this->breadcrumbs=array(
	'References'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List References', 'url'=>array('index')),
	array('label'=>'Manage References', 'url'=>array('admin')),
);
?>

<h1>Create References</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>