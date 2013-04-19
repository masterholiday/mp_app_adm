<?php
/* @var $this CitycategorytextController */
/* @var $model Citycategorytext */

$this->breadcrumbs=array(
	'Citycategorytexts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Citycategorytext', 'url'=>array('index')),
	array('label'=>'Manage Citycategorytext', 'url'=>array('admin')),
);
?>

<h1>Создать SEO запись для каталога</h1>
<br>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>