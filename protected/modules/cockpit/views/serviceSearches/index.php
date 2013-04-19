<?php
/* @var $this ServiceSearchesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Service Searches',
);

$this->menu=array(
	array('label'=>'Create ServiceSearches', 'url'=>array('create')),
	array('label'=>'Manage ServiceSearches', 'url'=>array('admin')),
);
?>

<h1>Service Searches</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
