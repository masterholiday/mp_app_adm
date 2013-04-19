<?php
/* @var $this ReferencesController */
/* @var $model References */

$this->breadcrumbs=array(
	'References'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List References', 'url'=>array('index')),
	array('label'=>'Create References', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('references-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>Статистика переходов по ссылкам ивенторов</h2>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'references-grid',
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
		'link',
		'reference',
		'year',
		'month',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
