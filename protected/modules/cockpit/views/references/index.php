<?php
/* @var $this ReferencesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'References',
);

$this->menu=array(
	array('label'=>'Create References', 'url'=>array('create')),
	array('label'=>'Manage References', 'url'=>array('admin')),
);
?>

<h1>References</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
