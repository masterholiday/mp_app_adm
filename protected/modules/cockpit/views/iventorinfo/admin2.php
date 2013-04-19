<?php
/* @var $this IventorinfoController */
/* @var $model Iventorinfo */

$this->breadcrumbs=array(
    'Iventorinfos'=>array('index'),
    'Manage',
);

$this->menu=array(
    array('label'=>'List Iventorinfo', 'url'=>array('index')),
    array('label'=>'Create Iventorinfo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search2', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('iventorinfo-grid2', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<h1>Созданные вручную ивенторы</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'iventorinfo-grid2',
    'dataProvider'=>$model->search2(),
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
	'afterAjaxUpdate' => 'function(){
    	jQuery("#PremiumUntil").datepicker({
        	dateFormat: "yy-mm-dd",
            changeYear:true
    	});
        jQuery("#user").datepicker({
            dateFormat: "yy-mm-dd 00:00:00",
            changeYear:true
        });
    }',
    'filter'=>$model,
	'columns'=>array(
		
		array(
			'name'=>'Id',
			'htmlOptions'=>array('width'=>'20px'),
		),
        array(
            'header' => 'Дата',
            'name' => 'user.RegistrationDate',
			
                'type' => 'raw',
                    'htmlOptions' => array('align' => 'center', 'style' => 'width: 123px;'),                
                    'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model,
                                'id' => 'user',
                                'attribute' => 'user',
                                'htmlOptions' => array('style' => 'width: 80px;'),
                    'options' => array(
                    'dateFormat' => 'yy-mm-dd 00:00:00',
                                        'changeYear' => true
                ),
            ), true)
        ),

		'Email',
		array(
                        'header' => 'Название',
						'htmlOptions'=>array('width'=>'245px'),
                        'name' => 'CompanyName',
      
                ),
		
		 
       
          array( 'header' => 'Страна','name'=>'country_search', 'value'=>'$data->city->country->name' ),
          array( 'header' => 'Город','name'=>'city_search', 'value'=>'$data->city->name' ),

   

        
		array(
			'header' => 'Акк./дней',
			'htmlOptions'=>array('width'=>'45px'),
            'name' => 'Premium',
            'filter' => array(0 => 'Free', 1 => 'Premium'),
            'value' => '$data->getAccountType()',
                ),
				
				array(
			'header' => 'Инфо',
            'name' => 'Active',
            'value' => '$data->getPercent()',
                ),


		

		array(
			'header' => 'Статус письма',
			'htmlOptions'=>array('width'=>'45px'),
            'name' => 'letterid',
			'value' => '$data->checkLetter()',
            
                ),
		
		array(
			'header' => 'Посещал админку',
			'htmlOptions'=>array('width'=>'45px'),
            'name' => 'visitedadminka',
            
                ),

		 array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}{free}{move}',
			'buttons'=>array
				(
					'free' => array
					(
						'label'=>'Сделать free',
						'imageUrl'=>Yii::app()->request->baseUrl.'/images/frr-flower.png',
						'url'=>'Yii::app()->createUrl("cockpit/iventorinfo/MakeFree", array("id"=>$data->Id))',
						
					),
					'move' => array
					(
						'label'=>'Перенести',
						'imageUrl'=>Yii::app()->request->baseUrl.'/images/Pictogram_voting_move.png',
						'url'=>'Yii::app()->createUrl("cockpit/iventorinfo/MoveToMainList", array("id"=>$data->Id))',
						
					),
					
				),
		),
	),
)); ?>
