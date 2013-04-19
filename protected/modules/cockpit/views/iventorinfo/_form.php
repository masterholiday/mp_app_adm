<?php
/* @var $this IventorinfoController */
/* @var $model Iventorinfo */
/* @var $form CActiveForm */
?>
<script type="text/javascript">
   function countdate() {
    var days = document.getElementById("dayscount").value;
    var dateField = document.getElementById("Iventorinfo_PremiumUntil");
	var today = new Date();
	var tomorrow = new Date();
	tomorrow.setDate(today.getDate()+parseInt(days));
	dateField.value = dateToYMD(tomorrow);
   }
   
    
   function dateToYMD(date)
	{
    var d = date.getDate();
    var m = date.getMonth()+1;
    var y = date.getFullYear();
    return '' + y +'-'+ (m<=9?'0'+m:m) +'-'+ (d<=9?'0'+d:d);
	}
	
	function days_between(date1, date2) {

    // The number of milliseconds in one day
    var ONE_DAY = 1000 * 60 * 60 * 24

    // Convert both dates to milliseconds
    var date1_ms = date1.getTime()
    var date2_ms = date2.getTime()

    // Calculate the difference in milliseconds
    var difference_ms = Math.abs(date1_ms - date2_ms)

    // Convert back to days and return
    return Math.round(difference_ms/ONE_DAY)+1;

}
	
	
  function countdays() {
    var daysField = document.getElementById("dayscount");
	var dateFieldval = document.getElementById("Iventorinfo_PremiumUntil").value;
	var dateParts = dateFieldval.split("-");
	var date = new Date(dateParts[0], (dateParts[1] - 1), dateParts[2]);
	var today = new Date();
	daysField.value = days_between(date, today);

   }
   
   function getVideoLink(){
   return $("#videolink").val();
   }

  </script>
  
  
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'iventorinfo-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); 
	if($model->Premium != 1){$textClass="infofree";}
	else {$textClass="infoprem";}
	
	if($model->isActive()){$output="<div class='infoprem'>Активирован</div>";}
	else {$output=CHtml::button('Активировать', array('submit' => array('iventorinfo/activate', 'id'=>$model->Id), 'class'=>'submit' ));}
	
	if($model->auto != 0 )
	{$output2=CHtml::button('В общую таблицу', array('submit' => array('iventorinfo/MoveToMainList', 'id'=>$model->Id), 'class'=>'submit' ));}
	else{$output2="В главной таблице";}
	
	if($model->Premium != 0 )
	{$output3=CHtml::button('Сделать Free', array('submit' => array('iventorinfo/MakeFree', 'id'=>$model->Id), 'class'=>'submit' ));}
	else{
	$output3=CHtml::button('Сделать Premium', array('submit' => array('iventorinfo/MakePremium', 'id'=>$model->Id), 'class'=>'submit' ));
	}
	
	?>

	
	<img src="<? echo "http://masterholiday.net/img/users/".$model->UserId."/150x150_".$model->Image; ?>" class="image">
	<table class="table1">
	<tr>
	<td>Название:</td>
	<td><?php echo $form->textField($model,'CompanyName',array('size'=>30,'maxlength'=>60,'readonly'=>false)); ?>
		<?php echo $form->error($model,'CompanyName'); ?></td>
	</tr>
	<tr>
	<td>Телефон:</td>
	<td><?php echo $form->textField($model,'CompanyPhone',array('size'=>30,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'CompanyPhone'); ?></td>
	</tr>
		<tr>
	<td>Email:</td>
	<td><?php echo $form->textField($model,'Email',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Email'); ?></td>
	</tr>
		<tr>
	<td>Город:</td>
	<td><input type='text' disabled value="<?php echo $model->city->name.",".$model->city->country->name;?>"/></td>
	</tr>
	<tr>
	<td>Сайт:</td>
	<td><?php echo $form->textField($model,'Website',array('size'=>30,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Website'); ?></td>
	</tr>
		<tr>
	<td>Skype:</td>
	<td><?php echo $form->textField($model,'Skype',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Skype'); ?></td>
	</tr>
	</table>
	
	<table class="table2">
	<tr>
	<td>В избранном:</td><td class="<? echo $textClass;?>"><?php echo $model->getStarred(); ?></td>
	<td>Аккаунт:</td><td><?php echo $model->getAccountTypeForSingle(); ?></td>
	</tr>
	<tr>
	<td>Комплексн.:</td><td class="<? echo $textClass;?>"><?php echo $model->getSearch(); ?></td>
	<td>Дней осталось:</td><td><input type='text' id="dayscount" onchange="countdate()" value="<? echo $model->getRemDays();?>"/></td>
	</tr>
	<tr>
	<td>Каталог:</td><td class="<? echo $textClass;?>"><?php echo $model->getCalls(); ?></td>
	<td>Оплачен до:</td><td>		<?php echo $form->textField($model,'PremiumUntil', array('onchange'=>'countdays()')); ?>
		<?php echo $form->error($model,'PremiumUntil'); ?></td>
	</tr>
	<tr>
	<td colspan="4">	<a href="<? echo "http://masterholiday.net/iventor/".$model->Id."/".$model->filter($model->CompanyName)."/"; ?>" target="_blank"><? echo "http://masterholiday.net/iventor/".$model->Id."/".$model->filter($model->CompanyName)."/" ; ?></a></td>
	
	</tr>
	
	<tr>
	<td colspan="4">	<a href="#">История платежей</a></td>
	</tr>
	<tr>
	<td colspan="4">	<?php echo $output; ?><?php echo $output2; ?><?php echo $output3; ?></td>
	
	</tr>
	
	</table>
	
	<table>
	<tr>
	<td><div class="hints"></td>

	</tr>
	
	
	</table>
	

	<br>
<? echo CHtml::button('Отправить Письмо', array('submit' => array('iventorinfo/sendNotInfo', 'id'=>$model->Id), 'class'=>'submit2')); ?>
	<div class="divide"></div>
	<div style="margin-left:5px;">
	<h3>О компании:</h3>
	
		<?php echo $form->textArea($model,'Description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Description'); ?>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Сохранить',array('class'=>'submit')); ?>
	</div>
	</div>
	<div class="divide"></div>
	<div style="margin-left:5px;">
	<h3>Услуги ивентора</h3>
	<table class="pTable">
	<thead><tr><th>Категория</th><th>Подкатегория</th><th>Город</th><th>От</th><th>До</th><th></th><th></th></tr></thead>
	<?php
	
	$servs = $model->getServices();
	if(count($servs) >0){
	$i=0;
	
	foreach($servs as $serv)
	{

	$i++;
	$parName = "par_".$i;
	$idName = "drop_".$i;
	?>
	<tr>
	<td>
		<?php 
		$Criteria = new CDbCriteria();
		$Criteria->condition = "ParentId = '0'";
		$cats = ServiceCategories::model()->findAll($Criteria);
		echo "<div class='styled'>";
		echo $form->dropDownList($serv[1],'ParentId', CHtml::listData($cats,'Id','CategoryName'),array( 
				'id'=>$parName,
				'ajax' => array(
				'type'=>'POST', //request type
				'url'=>CController::createUrl('Iventorinfo/dynamiccities'), //url to call.
				'update'=> '#'.$idName, //selector to update
				//'dataType'=>'json',
                'data'=>array('ParentId'=>'js:this.value'),  
				
				)) );
		echo "</div>";		
				?></td>
	<td>
		<?php 
		$Criteria = new CDbCriteria();
		$Criteria->condition = "ParentId = '".$serv[1]->ParentId."'";
		$cats = ServiceCategories::model()->findAll($Criteria);
		$list = CHtml::listData($cats,'Id','CategoryName');
		echo "<div class='styled'>";
		echo $form->dropDownList($serv[1],'Id',$list,array('id'=>$idName) );
		echo "</div>";	
		?>
	</td>
	<td>
	<?= CHtml::activeHiddenField($model, 'cityid',array('value'=>$serv[7]));
	$city = new City();
	$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
	'value' => $serv[2].",".$serv[3],
    'model'=>$city, 
    //'attribute'=>'city_id', 
	'name' => 'city_id', 
    'source' => $this->createUrl('city/autocomplete'),
    'options'=>array(
        'minLength'=>'2',
        'showAnim'=>'fold',
        'select' =>'js: function(event, ui) {
            this.value = ui.item.value;
            $("#Iventorinfo_cityid").val(ui.item.id);
            return false;
        }',
    ),
    'htmlOptions' => array(
        'maxlength'=>50,
    ),
));
	
	?>
	
	</td>
	<td><input  type='text' id="min" value="<?php echo $serv[4];?>"/></td>
	<td><input  type='text' id="max" value="<?php echo $serv[5];?>"/></td>
	<td>
	<?php
       echo CHtml::ajaxButton(
            '',
            array('Iventorinfo/servicesave/'),
            array('data'=>array( 'city'=>'js:$("#Iventorinfo_cityid").val()', 'catid'=>'js:$("#'.$idName.'").val()', 'serv'=>$serv[6],'id'=>$model->Id, 'min'=>'js:$("#min").val()','max'=>'js:$("#max").val()'), 
					'success'=>'function(resp)
                         {
						 if(resp!=""){
						location.reload();
						 }
						
                         }',
					'type'=>'POST',),
            array('class'=>'saveServ')//,
        );
?>
</td>
	<td><?php echo CHtml::button('',  array('submit' => array('iventorinfo/servicedel',  'id'=>$model->Id,'serv'=>$serv[6]), 'class'=>'deleteServ', 'confirm' => 'Уверены, что хотите сохранить услугу?')); ?></td>
	</tr>
	<?} }
	else{
	echo "------ Нет услуг<br>";
	echo CHtml::button('Отправить Письмо', array('submit' => array('iventorinfo/sendNotServices', 'id'=>$model->Id), 'class'=>'submit2'));
	}?>
	</table>
	</div>
	<br>
	<div class="divide"></div>
	
	<div style="margin-left:5px;" class="video">
	<h3>Видео</h3>
	<div id="allvideo">
		<?php
		
		$vids = $model->getVideo();
		
		foreach($vids as $vid)
		{?>
		<input  type='text' id="videolink" value="<?php echo $vid->VideoLink;?>"/>	
		
		<?php 
		  echo CHtml::ajaxButton(
				'',
				array('Iventorinfo/videosave/'),
				array('data'=>array('link'=>'js:$("#videolink").val()', 'id'=>$model->Id, 'video'=>$vid->ID, ), 
				'success'=>'function(resp)
                         {
						 if(resp!=""){
						location.reload();
						 }
						
                         }',
						'type'=>'POST',),
				array('class'=>'saveVideo')
			);
		?>
		<?php echo CHtml::button('', array('submit' => array('iventorinfo/videodel' ,'id'=>$model->Id,'video'=>$vid->ID),'confirm' => 'Уверены, что хотите удалить видео?','class' => 'deleteVideo')); ?>
		<a href="<? echo $vid->VideoLink; ?>" target="_blank"><? echo $vid->VideoLink; ?></a><br>
			
		<?}?>
			<div>
			<input  type='text' id="newvideo"/>
			<? 
			 echo CHtml::ajaxButton(
					'Добавить',
					array('Iventorinfo/addvideo/'),
					array('data'=>array('link'=>'js:$("#newvideo").val()', 'id'=>$model->Id,), 
					'success'=>'function(resp)
                         {
						 if(resp!=""){
						location.reload();
						 }
						
                         }',
							'type'=>'POST',),
					array('class'=>'submit')

		);
		  
			?>
			</div>
	</div>
	<div></div>
	</div>
	<div class="divide"></div>
	<div style="margin-left:5px;">
	<h3>Портфолио</h3>
	<?php
	
	$pics = $model->getPictures();

	foreach($pics as $pic)
	{?>

	<a href="<? echo "http://masterholiday.net/img/users/".$model->UserId."/1024x0_".$pic->FileName; ?>" target="_blank"><img width="150" src="<? echo "http://masterholiday.net/img/users/".$model->UserId."/199x169_".$pic->FileName; ?>"></a>
	<?php echo CHtml::button('', array('submit' => array('iventorinfo/picdel' ,'id'=>$model->Id,'pic'=>$pic->Id),'confirm' => 'Уверены, что хотите удалить фото?','class' => 'closeb')); ?>

	<?} 
	

	?>

	
	</div>	

<?php $this->endWidget(); ?>

</div><!-- form -->