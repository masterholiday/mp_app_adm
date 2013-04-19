<?php

/**
 * This is the model class for table "inventorinfo".
 *
 * The followings are the available columns in table 'inventorinfo':
 * @property integer $Id
 * @property integer $UserId
 * @property string $CompanyName
 * @property string $CompanyPhone
 * @property string $Website
 * @property string $Image
 * @property string $Description
 * @property integer $CityId
 * @property double $Balance
 * @property string $Discount
 * @property integer $CountryId
 * @property string $Skype
 * @property integer $Active
 * @property integer $TotalRequests
 * @property string $Email
 * @property integer $Premium
 * @property string $PremiumUntil
 * @property Users $user
 * @property City $city
 * @property Calls $call
 * @property integer $auto
 * @property integer $letterid
 * @property integer $visitedadminka

 */
class Iventorinfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Iventorinfo the static model class
	 */

   public $user_search;
   public $city_search;
   public $country_search;
  
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inventorinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CompanyName, Email, CityId, CompanyPhone', 'required'),
			array('UserId, CityId, CountryId, Active, TotalRequests, Premium, auto, letterid, visitedadminka', 'numerical', 'integerOnly'=>true),
			array('Balance', 'numerical'),
			array('CompanyName', 'length', 'max'=>60),
			array('CompanyPhone', 'length', 'max'=>20),
			array('Website, Email', 'length', 'max'=>255),
			array('Image', 'length', 'max'=>120),
			array('Discount', 'length', 'max'=>3),
			array('Skype', 'length', 'max'=>100),
			array('Description, PremiumUntil', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('calls_search,country_search,user_search, city_search ,Id, UserId, CompanyName, CompanyPhone, Website, Image, Description, CityId, Balance, Discount, CountryId, Skype, Active, TotalRequests, Email, Premium, PremiumUntil, auto, letterid, visitedadminka', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
        'user' => array(self::BELONGS_TO, 'Users', 'UserId'),
        'city' => array(self::BELONGS_TO, 'City', 'CityId'),
        'call' => array(self::BELONGS_TO, 'Calls', 'EventorId'),
    	);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'UserId' => 'User',
			'CompanyName' => 'Название компании',
			'CompanyPhone' => 'Телефон',
			'Website' => 'Сайт',
			'Image' => 'Image',
			'Description' => 'Описание',
			'CityId' => 'Город',
			'Balance' => 'Balance',
			'Discount' => 'Discount',
			'CountryId' => 'Country',
			'Skype' => 'Skype',
			'Active' => 'Active',
			'TotalRequests' => 'Total Requests',
			'Email' => 'Email',
			'Premium' => 'Premium',
			'PremiumUntil' => 'Premium Until',
			'auto' => 'Auto',
			'letterid' => 'Letterid',
			'visitedadminka' => 'Visitedadminka',
		);
	}

	

		public function getSearch()
	{
		if($this->Premium != 0){
                        	$results = ServiceSearches::model()->findAllByAttributes(array('EventorID'=>$this->UserId));
		 $count = count ( $results ); return $count;}
		 else{
		 	return "-";
		 }
		
	}


	public function getCalls()
	{
		if($this->Premium != 0){
         $results = Calls::model()->findAllByAttributes(array('EventorID'=>$this->UserId));
		 $count = count ( $results ); return $count;}
		 else{
		 	return "-";
		 }
		
	}
	



	public function getCallsForFilter()
	{
		$results = Calls::model()->findAllByAttributes(array('EventorID'=>$this->Id));
		 $count = count ( $results ); return $count;

		
	}
	
		public function isServices()
	{
		$results = IventorServices::model()->findAllByAttributes(array('IventorId'=>$this->UserId));
		 $count = count ( $results ); return $count;

		
	}
	
	public function checkLetter(){
			$api_key = "5615unk8kntwr449i5c87cbbw44rd57bu3u5uuoo";

			// Перечислим несколько id через запятую
			//$email_id = "2387465634,782932646,25723123";
			
			// Создаём POST-запрос
			$POST = array (
			  'api_key' => $api_key,
			  'email_id' => strval($this->letterid),
			);

			// Устанавливаем соединение
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $POST);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			curl_setopt($ch, CURLOPT_URL, 
						'http://api.unisender.com/ru/api/checkEmail?format=json');
			$result = curl_exec($ch);
			$delivered = false;

			if ($result) {
			  // Раскодируем ответ API-сервера
			  $jsonObj = json_decode($result);

			  if(null===$jsonObj) {
				// Ошибка в полученном ответе
				//echo "Invalid JSON";

			  }
			  elseif(!empty($jsonObj->error)) {
				// Ошибка получения статуса сообщения
				//echo "An error occured: " . $jsonObj->error . "(code: " . $jsonObj->code . ")";

			  } else {
				// Статусы доставки сообщения получены
				//echo "E-mail delivery statuses: " . print_r($jsonObj->result->statuses, true);
				$delivered = $jsonObj->result->statuses;
				foreach($jsonObj->result->statuses as $value) {
					echo $value->status;
				}
				//echo $delivered[0];

			  }
			} else {
			  // Ошибка соединения с API-сервером
			  //echo "API access error";
			}
			
			//return $delivered[0];
	}
	
	public function filter($zagol) 
    {
			$zagol = trim(rtrim($zagol, " \t.")); // Удоляет пробел и табуляцию
			$register = mb_convert_case($zagol, MB_CASE_LOWER, "UTF-8");
			$rus = array(
			'а','б','в','г','д','е','ё','ж','з','є','і','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',
			'~','!','@','#','%','^','&','*','(',')','_','+','-','=','`',',','.','/','<','>','{','}','[',']',';','\'','\\',':','"','|',
			' ','№','$','«','»','"'
			);
			$eng = array(
			'a','b','v','g','d','e','e','zh','z','e','i','i','i','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','scsh','','y','','','yu','ya',
			'','','','','','','','','','','-','','-','','','','.','','','','','','','','','','','','','',
			'-','','','','',''
			);
			$url = str_replace($rus, $eng, $register);
			$url = preg_replace('#(\W)+#','-', $url);
        return $url;
    }
	
	public function sentLetterToEventor($arr)
		{	
			$html = file_get_contents('http://masterholiday.net/letters/vika.html');
            foreach ($arr as $k => $v) {
                $html = str_replace("%".$k."%", $v, $html);
            }


			$api_key = "5615unk8kntwr449i5c87cbbw44rd57bu3u5uuoo";

			// Параметры сообщения
			// Если скрипт в кодировке UTF-8, не используйте iconv
			$email_from_name = "Виктория Власова";
			$email_from_email = "victoria.vlasova@masterholiday.net";
			$email_to = $arr['email'];
			$email_body = $html;
			$email_subject = 'Предложение о сотрудничестве.';
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
				$this->letterid =0;
				$this->save();

			  } else {
				// Сообщение успешно отправлено
				//return 1;
				//echo "Email message is sent. Message id " . $jsonObj->result->email_id;
				$this->letterid = $jsonObj->result->email_id;
				$this->save();

			  }
			} else {
			  // Ошибка соединения с API-сервером
			  //echo "API access error";
			  $this->letterid =0;
			  $this->save();
			}
	
			  
			  //$this->redirect(array('update','id'=>$model->Id));
		}
	
	public function getPictures(){
	$results = IventorPortfolio::model()->findAllByAttributes(array('IventorId'=>$this->UserId));
	return $results;
	}
	
	public function getStarred(){
	$results = Starred::model()->findAllByAttributes(array('EventorID'=>$this->UserId));
	 $count = count ( $results ); return $count;
	
	}
	
	public function getVideo(){
	$results = IventorVideo::model()->findAllByAttributes(array('UserID'=>$this->UserId));
	return $results;
	}
	
	public function getServices(){
	$results = IventorServices::model()->findAllByAttributes(array('IventorId'=>$this->UserId));
	$allmassiv = array();
	foreach($results as $result){
	$category = ServiceCategories::model()->findByPk($result->CategoryId);
	$parentcat = ServiceCategories::model()->findByPk($category->ParentId);
	$city = City::model()->findByPk($result->CityId);
	$cityName = $city->name;
	$country = Country::model()->findByPk($city->country_id);
	$countryName = $country->name;
	$minPrice = $result->minPrice;
	$maxPrice = $result->maxPrice;
	$massiv = array($parentcat,$category, $cityName,$countryName, $minPrice, $maxPrice, $result->Id, $result->CityId);
	$allmassiv[] = $massiv; 
	}
	return $allmassiv;
	}
	
	
	public function getRemDays()
	{
		if($this->Premium != 0){
                        	$diff = time()-strtotime($this->PremiumUntil);
							$RemDays = (int)floor($diff / 86400);
							$RemDays = -($RemDays);
							echo $RemDays;
                        	}
		 else{
		 	echo "-";
		 }
		
	}
	

		public function getAccountType()
			{
				if($this->Premium != 0){
									$diff = time()-strtotime($this->PremiumUntil);
									$RemDays = (int)floor($diff / 86400);
									$RemDays = -($RemDays);
									echo "<img src='images/evlistorc.png'>"." ".$RemDays;
									}
				 else{
					echo "<img src='images/evlistgrc.png'>";
				 }
				
			}
		
				public function getAccountTypeForSingle()
			{
				if($this->Premium != 0){ echo "<div class='infoprem'>Премиум</div>";
									}
				 else{
					echo "<div class='infofree'>Бесплатный</div>";
				 }
				
			}

		public function getPercent(){
			 $isLogo = $this->Image;
             $isDesc = $this->Description;
             $results = IventorPortfolio::model()->findAllByAttributes(array('IventorId'=>$this->UserId)); 
             $isPics = count ( $results ); 
             $percent = 0;
             if ($isLogo!="" ) {  $percent = $percent + 20;   	}  
             if ($isDesc!= false ) {  $percent = $percent + 40;   	}  
             if ($isPics>0 ) {  $percent = $percent + 40;   	}       	
             return $percent."%";  
			 //return $isLogo."+".$isDesc."+".$isPics." = ".$percent."%"; 
		}


		public function getActive(){
		 $user = Users::model()->findByAttributes(array('Id'=>$this->UserId)); 
			 if($user->Active != 0){
                        	echo "<img src='images/evlistact.png'>";
                        	}
		 else{
		 	echo "<img src='images/evlistgrc.png'>";
		 }
		}
		
		public function isActive()
	{	
		 $user = Users::model()->findByAttributes(array('Id'=>$this->UserId));
		return $user->Active != 0;
		
		
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		$criteria->with = array( 'city' );
		$criteria->with = array( 'user' );
		$criteria->with = array( 'city.country' );
		$criteria->compare('Id',$this->Id);
		$criteria->compare('UserId',$this->UserId);
		$criteria->compare('CompanyName',$this->CompanyName,true);
		$criteria->compare('CompanyPhone',$this->CompanyPhone,true);
		$criteria->compare('Website',$this->Website,true);
		$criteria->compare('Image',$this->Image,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('CityId',$this->CityId);
		$criteria->compare('Balance',$this->Balance);
		$criteria->compare('Discount',$this->Discount,true);
		$criteria->compare('CountryId',$this->CountryId);
		$criteria->compare('Skype',$this->Skype,true);
		$criteria->compare('Active',$this->Active);
		$criteria->compare('TotalRequests',$this->TotalRequests);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Premium',$this->Premium);
		$criteria->compare('PremiumUntil',$this->PremiumUntil,true);
		$criteria->compare('auto',$this->auto);
		$criteria->compare('letterid',$this->letterid);
		$criteria->compare('visitedadminka',$this->visitedadminka);
		if ($this->PremiumUntil != "") {
			$criteria->condition = 'PremiumUntil>="2012-09-30" AND PremiumUntil<=:last';
			$criteria->params = array(':last'=>$this->PremiumUntil);
		}
		$criteria->compare('auto',0);
		$criteria->compare('user.RegistrationDate', $this->user_search, true );
		//if ($this->user_search != "") {
		    //->select('id, username, profile')
   			//$criteria->alias='users';
			//$criteria->condition = 'users.RegistrationDate>="2012-09-30" AND users.RegistrationDate<="2012-11-24"';
			//$criteria->params = array(':date'=>$this->user_search);
		//}
		$criteria->compare('city.name', $this->city_search, true );
		$criteria->compare('city.country.name', $this->country_search, true );
		//$criteria->select = 'count(calls.EventorId) as count';
		//$criteria->compare('call.count', $this->getCallsForFilter(), true );


		//$criteria2 = new CDbCriteria;
		
		//$criteria->mergeWith($criteria2);
		
		 
		return new CActiveDataProvider($this, array(
			'pagination' => array('pageSize' => 25),
			'criteria'=>$criteria,
				'sort'=>array(
            'defaultOrder'=>'Id DESC',
        ),
		));
	}
	
	public function search2()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.
		$criteria=new CDbCriteria;
		$criteria->with = array( 'city' );
		$criteria->with = array( 'user' );
		$criteria->with = array( 'city.country' );
		$criteria->compare('Id',$this->Id);
		$criteria->compare('UserId',$this->UserId);
		$criteria->compare('CompanyName',$this->CompanyName,true);
		$criteria->compare('CompanyPhone',$this->CompanyPhone,true);
		$criteria->compare('Website',$this->Website,true);
		$criteria->compare('Image',$this->Image,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('CityId',$this->CityId);
		$criteria->compare('Balance',$this->Balance);
		$criteria->compare('Discount',$this->Discount,true);
		$criteria->compare('CountryId',$this->CountryId);
		$criteria->compare('Skype',$this->Skype,true);
		$criteria->compare('Active',$this->Active);
		$criteria->compare('TotalRequests',$this->TotalRequests);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Premium',$this->Premium);
		$criteria->compare('PremiumUntil',$this->PremiumUntil,true);
		$criteria->compare('auto',$this->auto);
		$criteria->compare('letterid',$this->letterid);
		$criteria->compare('visitedadminka',$this->visitedadminka);
		if ($this->PremiumUntil != "") {
			$criteria->condition = 'PremiumUntil>="2012-09-30" AND PremiumUntil<=:last';
			$criteria->params = array(':last'=>$this->PremiumUntil);
		}
		$criteria->compare('auto',1);
		$criteria->compare('user.RegistrationDate', $this->user_search, true );
		//if ($this->user_search != "") {
		    //->select('id, username, profile')
   			//$criteria->alias='users';
			//$criteria->condition = 'users.RegistrationDate>="2012-09-30" AND users.RegistrationDate<="2012-11-24"';
			//$criteria->params = array(':date'=>$this->user_search);
		//}
		$criteria->compare('city.name', $this->city_search, true );
		$criteria->compare('city.country.name', $this->country_search, true );
		//$criteria->select = 'count(calls.EventorId) as count';
		//$criteria->compare('call.count', $this->getCallsForFilter(), true );


		//$criteria2 = new CDbCriteria;
		
		//$criteria->mergeWith($criteria2);
		
		 
		return new CActiveDataProvider($this, array(
			'pagination' => array('pageSize' => 25),
			'criteria'=>$criteria,
			'sort'=>array(
            'defaultOrder'=>'Id DESC',
        ),
		));
	}
}