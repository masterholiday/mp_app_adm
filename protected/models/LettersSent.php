<?php

/**
 * This is the model class for table "letters_sent".
 *
 * The followings are the available columns in table 'letters_sent':
 * @property integer $id
 * @property string $email
 * @property string $sent_ok
 */
class LettersSent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LettersSent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'letters_sent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email', 'required'),
			array('email', 'email','checkMX'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email', 'safe', 'on'=>'search'),
		);
	}
	
		public function sendLetter($email)
		{	
			?>
			<script>
			//alert("<? echo $email;?>");
			</script>
			<?
			$subject = 'Интернет сервис для поиска целевых клиентов';
			$body  = file_get_contents('http://masterholiday.net/letters/fornew.html');
			
			$api_key = "5615unk8kntwr449i5c87cbbw44rd57bu3u5uuoo";

			// Параметры сообщения
			// Если скрипт в кодировке UTF-8, не используйте iconv
			$email_from_name = "Мастерская Праздников";
			$email_from_email = "info@masterholiday.net";
			$email_to = $email;
			$email_body = $body;
			//urlencode(iconv('cp1251', 'utf-8',"Интернет сервис для поиска целевых клиентов"));
			$email_subject = 'Интернет сервис для поиска целевых клиентов';
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
				echo "Invalid JSON";

			  }
			  elseif(!empty($jsonObj->error)) {
				// Ошибка отправки сообщения
				echo "An error occured: " . $jsonObj->error . "(code: " . $jsonObj->code . ")";

			  } else {
				// Сообщение успешно отправлено
				return 1;
				//echo "Email message is sent. Message id " . $jsonObj->result->email_id;

			  }
			} else {
			  // Ошибка соединения с API-сервером
			  echo "API access error";
			}

			/*Yii::import('application.extensions.phpmailer.JPhpMailer');
			$mail = new JPhpMailer;
			$mail->IsSMTP();
			

			  $body  = file_get_contents('http://masterholiday.net/letters/fornew.html');
			   //$body  = file_get_contents('http://masterholiday.net/letters/search_complex.html');
			  $body  = eregi_replace("[\]",'',$body);
			  //$mail->Body    = "dfsfsfdfsfdf"; 
			  $mail->CharSet  = 'utf-8'; 
			  $mail->IsHTML(false);
			  $mail->Host       = "mail.masterholiday.net"; 
			  $mail->SMTPDebug  = 2; 
			  $mail->SMTPAuth   = true;
			  $mail->Port       = 250; 
			  $mail->Username   = "info@masterholiday.net";
			  $mail->Password   = "wCKMQLkQ";
			  $mail->Sender = "info@masterholiday.net"; 
			  $mail->AddCustomHeader('Reply-to:info@masterholiday.net'); 
			  $mail->From="info@masterholiday.net"; 
			  $mail->FromName="Мастерская Праздников";
			  $mail->SetFrom("info@masterholiday.net", "Мастерская Праздников");
			  $mail->AddReplyTo('info@masterholiday.net', 'Мастерская Праздников');
			  $mail->Subject = htmlspecialchars($subject);
			  $mail->MsgHTML($body);
			  $mail->AddAddress($email);
			  
				  if(!$mail->Send()) {
					 return 1;
					} else {
					 return 0;
					}*/
					
					
			  

		}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
		);
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

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'pagination' => array('pageSize' => 25),
			'criteria'=>$criteria,
				'sort'=>array(
            'defaultOrder'=>'Id DESC',
			),
		));
	}
}