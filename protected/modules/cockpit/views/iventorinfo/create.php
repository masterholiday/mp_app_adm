<?php
/* @var $this IventorinfoController */
/* @var $model Iventorinfo */

$this->breadcrumbs=array(
	'Iventorinfos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Iventorinfo', 'url'=>array('index')),
	array('label'=>'Manage Iventorinfo', 'url'=>array('admin')),
);
?>

<h1>Создание ивентора</h1>

<?php echo $this->renderPartial('_form2', array('model'=>$model)); ?>