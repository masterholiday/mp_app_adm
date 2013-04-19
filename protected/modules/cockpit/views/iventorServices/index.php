<?php
/* @var $this IventorServicesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Iventor Services',
);

$this->menu=array(
	array('label'=>'Create IventorServices', 'url'=>array('create')),
	array('label'=>'Manage IventorServices', 'url'=>array('admin')),
);
?>

<h1>Iventor Services</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
