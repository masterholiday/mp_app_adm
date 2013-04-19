<?php
/* @var $this LettersSentController */
/* @var $model LettersSent */

$this->breadcrumbs=array(
	'Letters Sents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LettersSent', 'url'=>array('index')),
	array('label'=>'Create LettersSent', 'url'=>array('create')),
	array('label'=>'View LettersSent', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LettersSent', 'url'=>array('admin')),
);
?>

<h1>Update LettersSent <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>