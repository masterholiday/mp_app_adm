<?php
/* @var $this LettersSentController */
/* @var $model LettersSent */

$this->breadcrumbs=array(
	'Letters Sents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LettersSent', 'url'=>array('index')),
	array('label'=>'Manage LettersSent', 'url'=>array('admin')),
);
?>

<h1>Отправить письмо</h1>
<a href="index.php?r=cockpit/lettersSent/admin">Отправленные письма</a>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>