<?php
/* @var $this IventorPortfolioController */
/* @var $model IventorPortfolio */

$this->breadcrumbs=array(
	'Iventor Portfolios'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List IventorPortfolio', 'url'=>array('index')),
	array('label'=>'Create IventorPortfolio', 'url'=>array('create')),
	array('label'=>'View IventorPortfolio', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage IventorPortfolio', 'url'=>array('admin')),
);
?>

<h1>Update IventorPortfolio <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>