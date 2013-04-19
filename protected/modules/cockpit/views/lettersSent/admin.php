<?php
/* @var $this LettersSentController */
/* @var $model LettersSent */

$this->breadcrumbs=array(
	'Letters Sents'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List LettersSent', 'url'=>array('index')),
	array('label'=>'Create LettersSent', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('letters-sent-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Отправленные письма</h1>

<a href="index.php?r=cockpit/lettersSent/create">Отправить письмо</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'letters-sent-grid',
	'dataProvider'=>$model->search(),
	'itemsCssClass'=>'item-class',
	'template' => "{summary}\n{pager}\n{items}",
	'summaryText'=>Yii::t('labels', 'Всего пользователей: {count}. Показано {start} - {end} '),
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
		'email',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
