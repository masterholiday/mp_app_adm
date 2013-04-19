<?php
/* @var $this IventorinfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Iventorinfos',
);

$this->menu=array(
	array('label'=>'Create Iventorinfo', 'url'=>array('create')),
	array('label'=>'Manage Iventorinfo', 'url'=>array('admin')),
);
?>

<h1>Iventorinfos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
