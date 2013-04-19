<?php
/* @var $this CallsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Calls',
);

$this->menu=array(
	array('label'=>'Create Calls', 'url'=>array('create')),
	array('label'=>'Manage Calls', 'url'=>array('admin')),
);
?>

<h1>Calls</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
