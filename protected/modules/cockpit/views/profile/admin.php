<?php
/* @var $this ProfileController */
/* @var $model Profile */

$this->breadcrumbs=array(
	'Profiles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Profile', 'url'=>array('index')),
	array('label'=>'Create Profile', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('profile-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'profile-grid',
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
		'Id',
		'UserId',
		'Email',
	 array(
                        'header' => 'Email',
                        'name' => 'Name',
                        'value' => '$data->getEmail()',
                        
                       
                ),
		'Name',
		'Phone',
	 array(
                        'header' => 'Соц.сеть',
                        'name' => 'Name',
                        'value' => '$data->getSocial()',
                        
                       
                ),
	 array(
                        'header' => 'Поиск',
                        'name' => 'Name',
                        'value' => '$data->getSearch()',
                        
                       
                ),

          array(
                        'header' => 'Каталог',
                        'name' => 'Name',
                        'value' => '$data->getCalls()',
                ),
				
		          array(
                        'header' => 'Избранном',
                        'name' => 'Name',
                        'value' => '$data->getStarred()',
                ),

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
