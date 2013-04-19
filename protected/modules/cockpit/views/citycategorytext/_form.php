<?php
/* @var $this CitycategorytextController */
/* @var $model Citycategorytext */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'citycategorytext-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	
		<?php 
		//
		
		if($model->getCategory()){$catmodel = $model->getCategory();}
		else{ $catmodel = ServiceCategories::model();}
		$idName = "drop";
		$Criteria = new CDbCriteria();
		$Criteria->condition = "ParentId = '0'";
		
		$cats = ServiceCategories::model()->findAll($Criteria);

		echo $form->dropDownList($catmodel,'ParentId', CHtml::listData($cats,'Id','CategoryName'),array(
				'ajax' => array(
				'type'=>'POST', //request type
				'url'=>CController::createUrl('Iventorinfo/dynamiccities'), //url to call.
				'update'=> '#'.$idName, //selector to update
				//'dataType'=>'json',
                'data'=>array('ParentId'=>'js:this.value'),  
				)));?>

		<?php 
		$Criteria = new CDbCriteria();
		$Criteria->condition = "ParentId = '".$catmodel->ParentId."'";
		$cats = ServiceCategories::model()->findAll($Criteria);
		$list = CHtml::listData($cats,'Id','CategoryName');
		
		echo $form->dropDownList($model,'CategoryID',$list,array('id'=>$idName) );
		
		
		
		?>

<br>
Город: 
<?= CHtml::activeHiddenField($model, 'CityID',array('value'=>0));?>
<?
$city = new City();
$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
    'model'=>$city,   // модель
    'attribute'=>'city_id',  // атрибут модели
    // "источник" данных для выборки
    'source' => $this->createUrl('city/autocomplete'),
    // параметры, подробнее можно посмотреть на сайте
    // http://jqueryui.com/demos/autocomplete/
    'options'=>array(
        'minLength'=>'2',
        //'showAnim'=>'fold',
        'select' =>'js: function(event, ui) {
            this.value = ui.item.value;
            // записываем полученный id в скрытое поле
            $("#Citycategorytext_CityID").val(ui.item.id);
            return false;
        }',
    ),
    'htmlOptions' => array(
        'maxlength'=>50,
    ),
));
?>

<br>
	<div class="row">
		<?php //echo $form->labelEx($model,'CityID'); ?>
		<?php //echo $form->textField($model,'CityID'); ?>
		<?php //echo $form->error($model,'CityID'); ?>
	</div>

	
	<div class="tinymce">
                                                <?php echo $form->labelEx($model,'Description'); ?><br />
                                                <?php $this->widget('application.extensions.tinymce.ETinyMce',
                                                                        array(
                                                                                                'model'=>$model,
                                                                                                'attribute'=>'Description',
                                                                                                'editorTemplate'=>'full',
                                                                                                'htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'tinymce'),
                                                                        )); ?>
                        <?php echo $form->error($model,'Description'); ?>
</div>
	<br>
	<div class="row">
		<?php //echo $form->labelEx($model,'Description'); ?>
		<?php //echo $form->textArea($model,'Description',array('rows'=>6, 'cols'=>50)); ?>
		<?php //echo $form->error($model,'Description'); ?>
	</div>
<br>
	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>
<br>
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
<br>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->