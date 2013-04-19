<?php
/* @var $this CitycategorytextController */
/* @var $model Citycategorytext */

$this->breadcrumbs=array(
	'Citycategorytexts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Citycategorytext', 'url'=>array('index')),
	array('label'=>'Create Citycategorytext', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('citycategorytext-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<a href="index.php?r=cockpit/citycategorytext/create">Создать</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'citycategorytext-grid',
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
		array(
                        'header' => 'Категория',
                        'name' => 'CategoryID',
                        'value' => '$data->getCategory()->CategoryName',
                        
                       
                ),
			array(
                        'header' => 'Город',
                        'name' => 'CityID',
                        'value' => '$data->getCity()',
                        
                       
                ),

		'Description',
		'desc',
		'title',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
