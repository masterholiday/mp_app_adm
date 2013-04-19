<?php

class IventorinfoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','dynamiccities','sendNotServices','SendNotInfo', 'activate','servicedel','servicesave', 'videodel', 'videosave', 'addvideo','picdel','MoveToMainList', 'MakeFree', 'MakePremium' ),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','admin2'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$user  = new Users;
		$model = new Iventorinfo;
		$temp = new Tempass;
	

		if(isset($_POST['Iventorinfo']) && isset($_POST['Iventorinfo']['CityId'])){
			
			$model->attributes=$_POST['Iventorinfo'];			
			$emails = Users::model()->findAllByAttributes(array('Email'=>$model->Email));
			$count = count ( $emails ); 
			$phones = Iventorinfo::model()->findAllByAttributes(array('CompanyPhone'=>$model->CompanyPhone));
			$countph = count ( $phones ); 
		  if ($count != 0){
		  ?>
			<script>alert("Такой имейл присутсвует: <? echo $model->Email;?>");</script>
			<?
		  }
		  elseif($countph != 0){
		   ?>
			<script>alert("Такой телефон уже существует: <? echo $model->CompanyPhone;?>");</script>
			<?
		  }
		  else{
			
			$pass = $user->generatePass();

			$user->Email = $model->Email;
			$user->Password = $user->encryptPass($pass);
			$user->RegistrationDate  = date('Y-m-d');
			$user->UserType = 2;
			$user->Active = 1;
			$user->Social = "";
			$user->SocialID = "";
			$user->ActiveKay = "";
			$user->RememberMe = "";
			$user->save();

			$model->UserId = $user->Id;
			$model->CountryId = 0;
			$model->Active = 1;
			$model->Premium = 1;
			$model->PremiumUntil = Date('Y-m-d', strtotime("+180 days"));
			$model->auto = 1;
			$model->save();
			
			$temp->slovo = $pass;
			$temp->iventor_id = $model->Id;
			$temp->save();

			
			/**/
			
			
			if(isset($_POST['catid'])){
				$length = count($_POST["cityid"]);
				for ($i = 0; $i < $length; $i++) {
				  $service = new IventorServices;
				  $service->IventorId = $user->Id;
				  $service->CategoryId = $_POST["catid"][$i];
				  $service->CityId = $_POST["cityid"][$i];
				  $city = new City;
				  $country = $city->getCountryByCity($_POST["cityid"][$i]);
				  if($country->country_id == "9908"){
				  $service->minPrice=100;
				  $service->maxPrice=10000;
				  }
				  else{
				  $service->minPrice=500;
				  $service->maxPrice=50000;
				  }
				  $service->save();
				}
				
						$arrEmailData = array();
                        $arrEmailData['link'] = "http://masterholiday.net/iventor/".$model->Id."/".$model->filter($model->CompanyName)."/";
                        $arrEmailData['email'] = $model->Email;
                        $arrEmailData['pass'] = $pass;
				
				$model->sentLetterToEventor($arrEmailData);
				$this->redirect(array('update','id'=>$model->Id));
				
				}

			
		}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{	
		$userID = $this->loadModel($id)->UserId;
		$model=$this->loadModel($id);
		$usermodel = Users::model()->findByPk($userID);
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Iventorinfo']))
		{
			$model->attributes=$_POST['Iventorinfo'];
			$usermodel->Email = $_POST['Iventorinfo']['Email'];
			if($model->save() && $usermodel->save())
				$this->redirect(array('update','id'=>$model->Id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionDynamiccities()
		{
			$data=ServiceCategories::model()->findAll('ParentId=:parent_id', 
						  array(':parent_id'=>(int) $_POST['ParentId']));
		 
			$data=CHtml::listData($data,'Id','CategoryName');
			foreach($data as $value=>$name)
			{
				echo CHtml::tag('option',
						   array('value'=>$value),CHtml::encode($name),true);
			}
		}
		
	public function actionSendNotServices($id)
		{	$model=$this->loadModel($id);
		
			$body  = file_get_contents('http://masterholiday.net/letters/noserv.html');
			
			$api_key = "5615unk8kntwr449i5c87cbbw44rd57bu3u5uuoo";

			// Параметры сообщения
			// Если скрипт в кодировке UTF-8, не используйте iconv
			$email_from_name = "Мастерская Праздников";
			$email_from_email = "support@masterholiday.net";
			$email_to = $model->Email;
			$email_body = $body;
			//urlencode(iconv('cp1251', 'utf-8',"Интернет сервис для поиска целевых клиентов"));
			$email_subject = 'Рекомендация о заполнении аккаунта.';
			$list_id = "937073";

			// Создаём POST-запрос
			$POST = array (
			  'api_key' => $api_key,
			  'email' => $email_to,
			  'sender_name' => $email_from_name,
			  'sender_email' => $email_from_email,
			  'subject' => $email_subject,
			  'body' => $email_body,
			  'list_id' => $list_id
			);

			// Устанавливаем соединение
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $POST);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			curl_setopt($ch, CURLOPT_URL, 
						'http://api.unisender.com/ru/api/sendEmail?format=json');
			$result = curl_exec($ch);

			if ($result) {
			  // Раскодируем ответ API-сервера
			  $jsonObj = json_decode($result);

			  if(null===$jsonObj) {
				// Ошибка в полученном ответе
				//echo "Invalid JSON";

			  }
			  elseif(!empty($jsonObj->error)) {
				// Ошибка отправки сообщения
				//echo "An error occured: " . $jsonObj->error . "(code: " . $jsonObj->code . ")";

			  } else {
				// Сообщение успешно отправлено
				//return 1;
				//echo "Email message is sent. Message id " . $jsonObj->result->email_id;

			  }
			} else {
			  // Ошибка соединения с API-сервером
			  //echo "API access error";
			}
		
		
		/*	$subject = 'Рекомендация о заполнении аккаунта.';
			Yii::import('application.extensions.phpmailer.JPhpMailer');
			$mail = new JPhpMailer;
			$mail->IsSMTP();
			  $body  = file_get_contents('http://masterholiday.net/letters/noserv.html');
			  $body  = eregi_replace("[\]",'',$body);
			  $mail->CharSet  = 'utf-8'; 
			  $mail->IsHTML(true);
			  $mail->Host       = "mail.masterholiday.net"; 
			  $mail->SMTPDebug  = 2; 
			  $mail->SMTPAuth   = true;
			  $mail->Port       = 250; 
			  $mail->Username   = "support@masterholiday.net";
			  $mail->Password   = "TLIorpG2";
			  $mail->Sender = "support@masterholiday.net"; 
			  $mail->AddCustomHeader('Reply-to:support@masterholiday.net'); 
			  $mail->From="support@masterholiday.net"; 
			  $mail->FromName="Мастерская Праздников";
			  $mail->SetFrom("support@masterholiday.net", "Мастерская Праздников");
			  $mail->AddReplyTo('support@masterholiday.net', 'Мастерская Праздников');
			  $mail->Subject = htmlspecialchars($subject);
			  $mail->MsgHTML($body);
			  $mail->AddAddress($model->Email);
			  $mail->Send();*/
			  
			  $this->redirect(array('update','id'=>$model->Id));
		}
	

	public function actionActivate($id){
		$iventorinfo = $this->loadModel($id);
		$user = Users::model()->findByAttributes(array('Id'=>$iventorinfo->UserId));
		$user->Active=1;
		$iventorinfo->Active=1;
		if($user->save() && $iventorinfo->save())
				$this->redirect(array('update','id'=>$iventorinfo->Id));
		}
		
	public function actionMoveToMainList($id){
		$iventorinfo = $this->loadModel($id);
		$iventorinfo->auto=0;
		if($iventorinfo->save()){
				
				if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin2'));
				$this->redirect(array('update','id'=>$iventorinfo->Id));
	}
	}
		
	public function actionMakeFree($id){
		$iventorinfo = $this->loadModel($id);
		$iventorinfo->Premium=0;
		if($iventorinfo->save()){
				
				if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin2'));
				$this->redirect(array('update','id'=>$iventorinfo->Id));
	}
				
		}
	public function actionMakePremium($id){
		$iventorinfo = $this->loadModel($id);
		$iventorinfo->Premium=1;
		if($iventorinfo->save())
				$this->redirect(array('update','id'=>$iventorinfo->Id));
		}
		
	

	
	public function actionSendNotInfo($id)
		{	$model=$this->loadModel($id);
		
		$body  = file_get_contents('http://masterholiday.net/letters/ifnot100.html');
			
			$api_key = "5615unk8kntwr449i5c87cbbw44rd57bu3u5uuoo";

			// Параметры сообщения
			// Если скрипт в кодировке UTF-8, не используйте iconv
			$email_from_name = "Мастерская Праздников";
			$email_from_email = "support@masterholiday.net";
			$email_to = $model->Email;
			$email_body = $body;
			//urlencode(iconv('cp1251', 'utf-8',"Интернет сервис для поиска целевых клиентов"));
			$email_subject = 'Рекомендация о заполнении аккаунта.';
			$list_id = "937073";

			// Создаём POST-запрос
			$POST = array (
			  'api_key' => $api_key,
			  'email' => $email_to,
			  'sender_name' => $email_from_name,
			  'sender_email' => $email_from_email,
			  'subject' => $email_subject,
			  'body' => $email_body,
			  'list_id' => $list_id
			);

			// Устанавливаем соединение
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $POST);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			curl_setopt($ch, CURLOPT_URL, 
						'http://api.unisender.com/ru/api/sendEmail?format=json');
			$result = curl_exec($ch);

			if ($result) {
			  // Раскодируем ответ API-сервера
			  $jsonObj = json_decode($result);

			  if(null===$jsonObj) {
				// Ошибка в полученном ответе
				//echo "Invalid JSON";

			  }
			  elseif(!empty($jsonObj->error)) {
				// Ошибка отправки сообщения
				//echo "An error occured: " . $jsonObj->error . "(code: " . $jsonObj->code . ")";

			  } else {
				// Сообщение успешно отправлено
				//return 1;
				//echo "Email message is sent. Message id " . $jsonObj->result->email_id;

			  }
			} else {
			  // Ошибка соединения с API-сервером
			  //echo "API access error";
			}
			/*
			$subject = 'Рекомендация о заполнении аккаунта.';
			Yii::import('application.extensions.phpmailer.JPhpMailer');
			$mail = new JPhpMailer;
			$mail->IsSMTP();
			  $body  = file_get_contents('http://masterholiday.net/letters/ifnot100.html');
			  $body  = eregi_replace("[\]",'',$body);
			  $mail->CharSet  = 'utf-8'; 
			  $mail->IsHTML(true);
			  $mail->Host       = "mail.masterholiday.net"; 
			  $mail->SMTPDebug  = 2; 
			  $mail->SMTPAuth   = true;
			  $mail->Port       = 250; 
			  $mail->Username   = "support@masterholiday.net";
			  $mail->Password   = "TLIorpG2";
			  $mail->Sender = "support@masterholiday.net"; 
			  $mail->AddCustomHeader('Reply-to:support@masterholiday.net'); 
			  $mail->From="support@masterholiday.net"; 
			  $mail->FromName="Мастерская Праздников";
			  $mail->SetFrom("support@masterholiday.net", "Мастерская Праздников");
			  $mail->AddReplyTo('support@masterholiday.net', 'Мастерская Праздников');
			  $mail->Subject = htmlspecialchars($subject);
			  $mail->MsgHTML($body);
			  $mail->AddAddress($model->Email);
			  $mail->Send();*/
			  
			  $this->redirect(array('update','id'=>$model->Id));
		}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	 
	public function actionServicedel($id){
	$model=$this->loadModel($id);
	$service = IventorServices::model()->findByPk($_GET['serv'])->delete();
	$this->redirect(array('update','id'=>$model->Id));

	}
	
   public function actionServicesave(){
		$model=$this->loadModel($_POST['id']);
      $service = IventorServices::model()->findByPk($_POST['serv']);
	  $service->minPrice = $_POST['min'];
	  $service->maxPrice = $_POST['max'];
	  $service->CategoryId = $_POST['catid'];
	  $service->CityId = $_POST['city'];
	  if($service->save())
				$this->renderPartial("_form",array('model'=>$model),false,true);
	
}

	public function actionPicdel($id){
	$model=$this->loadModel($id);
	$service = IventorPortfolio::model()->findByPk($_GET['pic'])->delete();
	$this->redirect(array('update','id'=>$model->Id));
	}

	public function actionVideodel($id){
	$model=$this->loadModel($id);
	$service = IventorVideo::model()->findByPk($_GET['video'])->delete();
	$this->redirect(array('update','id'=>$model->Id));

	}
	
	public function actionVideosave(){
	$model=$this->loadModel($_POST['id']);
	$service = IventorVideo::model()->findByPk($_POST['video']);
	$service->VideoLink = $_POST['link'];
	$service->save();
	$this->renderPartial("_form",array('model'=>$model),false,true);

	}
	
	
	public function actionAddvideo(){
	$model=$this->loadModel($_POST['id']);
	$service = new IventorVideo;
	$service->VideoLink = $_POST['link'];
	$service->UserID = $model->UserId;
	if ($service->save()) {
	  $this->renderPartial("_form",array('model'=>$model),false,true);
  Yii::app()->end();
	return 'success';}
	else{
	return 'fail';}
	

	}
	
	
	public function actionDelete($id)
	{	
		$userID = $this->loadModel($id)->UserId;
		Users::model()->findByPk($userID)->delete();
		$this->loadModel($id)->delete();
		IventorPortfolio::model()->deleteAll('IventorID = ?' , array($userID));
		IventorServices::model()->deleteAll('IventorID = ?' , array($userID));
		IventorVideo::model()->deleteAll('UserID = ?' , array($userID));
		Missing::model()->deleteAll('IventorID = ?' , array($userID));
		ServiceSearches::model()->deleteAll('EventorID = ?' , array($userID));
		Starred::model()->deleteAll('EventorID = ?' , array($userID));
		Calls::model()->deleteAll('EventorID = ?' , array($userID));
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Iventorinfo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Iventorinfo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Iventorinfo']))
			$model->attributes=$_GET['Iventorinfo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
		public function actionAdmin2()
	{
		$model=new Iventorinfo('search2');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Iventorinfo']))
			$model->attributes=$_GET['Iventorinfo'];

		$this->render('admin2',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Iventorinfo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='iventorinfo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
