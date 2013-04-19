<?php
/* @var $this LettersSentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Letters Sents',
);

$this->menu=array(
	array('label'=>'Create LettersSent', 'url'=>array('create')),
	array('label'=>'Manage LettersSent', 'url'=>array('admin')),
);
?>

<h1>Letters Sents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
