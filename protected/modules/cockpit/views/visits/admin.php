<?php
/* @var $this VisitsController */
/* @var $model Visits */

$this->breadcrumbs=array(
	'Visits'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Visits', 'url'=>array('index')),
	array('label'=>'Create Visits', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('visits-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Статистика посещений страниц ивенторов</h2>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'visits-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'item-class',
	'template' => "{summary}\n{pager}\n{items}",
	'summaryText'=>Yii::t('labels', 'Всего ивенторов: {count}. Показано {start} - {end} '),
	            'pager'        => array(
                                'class'          => 'CLinkPager',
								'cssFile' => Yii::app()->baseUrl.'/css/pagerstyle.css',
                                'firstPageLabel' => '<<',
                                'prevPageLabel'  => '< назад',
                                'nextPageLabel'  => ' вперед>',
                                'lastPageLabel'  => '>>',
								'header' => '',
                              ),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'iventorid',
		'visits',
		'year',
		'month',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
