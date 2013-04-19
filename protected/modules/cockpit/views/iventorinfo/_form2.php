<?php
/* @var $this IventorinfoController */
/* @var $model Iventorinfo */
/* @var $form CActiveForm */
?>
<script type="text/javascript">

   function addcity() {
   
    if($("#cityidmain").val() === ""){
	alert("Добавь город");
	}
	else if($('.serv_item').size() === 0){
	alert("Добавь услугу");
	}
	else{
	$("form:first").submit();
	}
	}
   
   

   function addservice() {
   if($("#drop").val() === "20"){
   alert("Выберите категорию");}
   else if($("#cityid").val() === ""){alert("Выберите город");}
   else{
   //var id ="service_"+5
   var cat_name = "catid["+$("#drop").val()+"]";
   var cat_name = "catid[]";
   var city_name = "cityid["+$("#cityid").val()+"]";
   var city_name = "cityid[]";
   var div = $('<div/>').appendTo('#servicelist');
   div.attr('class',  "serv_item");
   var category = $('<input type="hidden"/>').appendTo(div);
   category.attr('name',  cat_name);
   var city = $('<input type="hidden"/>').appendTo(div);
   city.attr('name',  city_name);
   var text = $('<p class="servtext" style="float:left;"/>').appendTo(div);
   var del = $('<input class="deleteServ" name="yt3" type="button" value=""  >').appendTo(div);
   $('.deleteServ').live('click',function() {
    $(this).parents("div:first").remove();
	});
   text.append($("#drop option:selected").text()+" -- "+$("#city_id").val())
	category.val($("#drop").val());
	city.val($("#cityid").val());
	}
   }
   


  </script>
  
  
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'iventorinfo-form2',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); 
	?>

	
	<div class="row">
		<?php echo $form->labelEx($model,'CompanyName'); ?>
		<?php echo $form->textField($model,'CompanyName',array('size'=>30,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'CompanyName'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'CompanyPhone'); ?>
		<?php echo $form->textField($model,'CompanyPhone',array('size'=>30,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'CompanyPhone'); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>30,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>		
		

	<div class="row">
		<?php echo $form->labelEx($model,'Website'); ?>
		<?php echo $form->textField($model,'Website',array('size'=>30,'maxlength'=>65)); ?>
		<?php echo $form->error($model,'Website'); ?>
	</div>				
	
	<div class="row">
		<?
		echo '<input type="hidden" id="cityidmain" name="Iventorinfo[CityId]"/>';
		$city = new City();
		echo $form->labelEx($city,'Город:');
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'model'=>$city, 
		'name' => 'city_id_main', 
		'source' => $this->createUrl('city/autocomplete'),
		'options'=>array(
			'minLength'=>'2',
			'showAnim'=>'fold',
			'select' =>'js: function(event, ui) {
				this.value = ui.item.value;
				$("#cityidmain").val(ui.item.id);
				return false;
			}',
		),
		'htmlOptions' => array(
			'maxlength'=>50,
		),
															));
		?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Skype'); ?>
		<?php echo $form->textField($model,'Skype',array('size'=>30,'maxlength'=>65)); ?>
		<?php echo $form->error($model,'Skype'); ?>
	</div>		
	<br>
	<div class="row">
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textArea($model,'Description',array('rows'=>6,'cols'=>50)); ?>
		<?php echo $form->error($model,'Description'); ?>
	</div>		
	
	
	<div class="divide"></div>
	
<?php 
		//
	echo "<table><tr>";	
	$catmodel = ServiceCategories::model();
		$idName = "drop";
		$Criteria = new CDbCriteria();
		$Criteria->condition = "ParentId = '0'";
		
		$cats = ServiceCategories::model()->findAll($Criteria);
		echo "<td><div class='styled'>";
		echo $form->dropDownList($catmodel,'ParentId', CHtml::listData($cats,'Id','CategoryName'),array(
				'ajax' => array(
				'type'=>'POST', //request type
				'url'=>CController::createUrl('Iventorinfo/dynamiccities'), //url to call.
				'update'=> '#'.$idName, //selector to update
				//'dataType'=>'json',
                'data'=>array('ParentId'=>'js:this.value'),  
				)));?>
				

		<?php 
		echo "</div></td>";	
		$Criteria = new CDbCriteria();
		$Criteria->condition = "ParentId = '".$catmodel->ParentId."'";
		$cats = ServiceCategories::model()->findAll($Criteria);
		$parentcat = new ServiceCategories;
		$list = CHtml::listData($cats,'Id','CategoryName');

		echo "<td><div class='styled'>";
		echo $form->dropDownList($parentcat,'Id',$list,array('id'=>$idName) );
		echo "</div></td>";	
		echo "<td>";
		echo '<input type="hidden" id="cityid"/>';
		$city = new City();
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
		'model'=>$city, 
		'name' => 'city_id', 
		'source' => $this->createUrl('city/autocomplete'),
		'options'=>array(
			'minLength'=>'2',
			'showAnim'=>'fold',
			'select' =>'js: function(event, ui) {
				this.value = ui.item.value;
				$("#cityid").val(ui.item.id);
				return false;
			}',
		),
		'htmlOptions' => array(
			'maxlength'=>50,
		),
															));
	
	
		echo "</td></tr></table>";	
		echo '<input type="button" class="submit" value="Добавить услугу" onClick="addservice();">';
		echo "<div id='servicelist'></div>"
		
		
		
		?>




<br/><br/><br/>
<div class="row buttons">
<input type="button" class="submit" id="saveivent" value="Сохранить" onClick="addcity();">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить',array('class'=>'submit')); ?>
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->