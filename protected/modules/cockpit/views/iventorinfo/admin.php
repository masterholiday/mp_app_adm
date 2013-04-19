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

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('iventorinfo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php 
//echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); 
?>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'iventorinfo-grid',
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
                        'header' => 'Поиск',
                        'name' => 'CountryId',
                        'value' => '$data->getSearch()',
                        
                       
                ),

          array(
                        'header' => 'Каталог',
                        'name' => 'CountryId',
                        'value' => '$data->getCalls()',
                ),

         
		array(
			'header' => 'Акк./дней',
			'htmlOptions'=>array('width'=>'45px'),
            'name' => 'Premium',
            'filter' => array(0 => 'Free', 1 => 'Premium'),
            'value' => '$data->getAccountType()',
                ),


		 array(
		 	'header' => 'Прем. до',
			'htmlOptions'=>array('width'=>'40px'),
            'name' => 'PremiumUntil',
                'type' => 'raw',
        	        'htmlOptions' => array('align' => 'center', 'style' => 'width: 123px;'),		      	
        	        'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                				'model' => $model,
              					'id' => 'PremiumUntil',
               					'attribute' => 'PremiumUntil',
                                'htmlOptions' => array('style' => 'width: 80px;'),
                	'options' => array(
                    'dateFormat' => 'yy-mm-dd',
                                        'changeYear' => true
                ),
            ), true)
        ),

		array(
			'header' => 'Услуги',
            'name' => 'Active',
            'value' => '$data->isServices()',
                ),
		
		array(
			'header' => 'Инфо',
            'name' => 'Active',
            'value' => '$data->getPercent()',
                ),

		array(
			'header' => 'Актив.',
            'name' => 'Active',
            'filter' => array(0 => 'Не активный', 1 => 'Активный'),
            'value' => '$data->getActive()',
                ),

		 array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}'
		),
	),
)); ?>
