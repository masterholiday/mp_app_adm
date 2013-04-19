<?php
/* @var $this IventorPortfolioController */
/* @var $model IventorPortfolio */

$this->breadcrumbs=array(
	'Iventor Portfolios'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List IventorPortfolio', 'url'=>array('index')),
	array('label'=>'Create IventorPortfolio', 'url'=>array('create')),
	array('label'=>'Update IventorPortfolio', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete IventorPortfolio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage IventorPortfolio', 'url'=>array('admin')),
);
?>

<h1>View IventorPortfolio #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'IventorId',
		'FileName',
	),
)); ?>
