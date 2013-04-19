<?php
/* @var $this IventorPortfolioController */
/* @var $model IventorPortfolio */

$this->breadcrumbs=array(
	'Iventor Portfolios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List IventorPortfolio', 'url'=>array('index')),
	array('label'=>'Manage IventorPortfolio', 'url'=>array('admin')),
);
?>

<h1>Create IventorPortfolio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>