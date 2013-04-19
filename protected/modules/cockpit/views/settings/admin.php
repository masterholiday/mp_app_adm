<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'Settings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Settings', 'url'=>array('index')),
	array('label'=>'Create Settings', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('settings-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<h1>Настройки</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'settings-grid',
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
		'KeyName',
		'KeyValue',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 
?>
