<?php
/* @var $this IventorPortfolioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Iventor Portfolios',
);

$this->menu=array(
	array('label'=>'Create IventorPortfolio', 'url'=>array('create')),
	array('label'=>'Manage IventorPortfolio', 'url'=>array('admin')),
);
?>

<h1>Iventor Portfolios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
