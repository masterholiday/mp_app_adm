<?php
/* @var $this SettingsController */
/* @var $model Settings */

$this->breadcrumbs=array(
	'Settings'=>array('days'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Settings', 'url'=>array('days')),
	array('label'=>'Create Settings', 'url'=>array('create')),
);

;
?>

<h1>Добавить дней</h1>



<input  type='text' id="daysnum" value=""/>	
		
		<?php 
		  echo CHtml::ajaxButton(
				'Добавить всем дней',
				array('settings/adddays/'),
				array('data'=>array('num'=>'js:$("#daysnum").val()', ), 
				'success'=>'function(resp)
                         {
						 if(resp!=""){
						location.reload();
						 }
						
                         }',
						'type'=>'POST',),
				array('class'=>'')
			);?>



<br>			
<br>			
<input  type='text' id="daysnumre" value=""/>	
		
		<?php 
		  echo CHtml::ajaxButton(
				'Забрать всем дней',
				array('settings/redays/'),
				array('data'=>array('num'=>'js:$("#daysnumre").val()', ), 
				'success'=>'function(resp)
                         {
						 if(resp!=""){
						location.reload();
						 }
						
                         }',
						'type'=>'POST',),
				array('class'=>'')
			);?>