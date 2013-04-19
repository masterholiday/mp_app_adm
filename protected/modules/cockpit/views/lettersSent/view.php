<?php
/* @var $this LettersSentController */
/* @var $model LettersSent */

$this->breadcrumbs=array(
	'Letters Sents'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List LettersSent', 'url'=>array('index')),
	array('label'=>'Create LettersSent', 'url'=>array('create')),
	array('label'=>'Update LettersSent', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete LettersSent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LettersSent', 'url'=>array('admin')),
);
?>

<h1>View LettersSent #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
	),
)); ?>
