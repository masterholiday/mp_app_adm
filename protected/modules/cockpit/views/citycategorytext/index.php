<?php
/* @var $this CitycategorytextController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Citycategorytexts',
);

$this->menu=array(
	array('label'=>'Create Citycategorytext', 'url'=>array('create')),
	array('label'=>'Manage Citycategorytext', 'url'=>array('admin')),
);
?>

<h1>Citycategorytexts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
