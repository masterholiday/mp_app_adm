<?php

/**
 * This is the model class for table "profile".
 *
 * The followings are the available columns in table 'profile':
 * @property integer $Id
 * @property integer $UserId
 * @property string $Name
 * @property string $Phone
 * @property integer $PhoneCodeRequests
 * @property integer $PhoneCodeEnter
 * @property string $smsBlockedUntil
 * @property string $Email
 */
class Profile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Profile the static model class
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
		return 'profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UserId', 'required'),
			array('UserId, PhoneCodeRequests, PhoneCodeEnter', 'numerical', 'integerOnly'=>true),
			array('Name, Phone', 'length', 'max'=>600),
			array('Email', 'length', 'max'=>255),
			array('smsBlockedUntil', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, UserId, Name, Phone, PhoneCodeRequests, PhoneCodeEnter, smsBlockedUntil, Email', 'safe', 'on'=>'search'),
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
			'Name' => 'Name',
			'Phone' => 'Phone',
			'PhoneCodeRequests' => 'Phone Code Requests',
			'PhoneCodeEnter' => 'Phone Code Enter',
			'smsBlockedUntil' => 'Sms Blocked Until',
			'Email' => 'Email',
		);
	}
	
	public function getEmail()
	{	

		$user = Users::model()->findByPk($this->UserId);
		if ($user){
		echo $user->Email;
		
		}
		
	}
		public function getSocial()
	{	

		$user = Users::model()->findByPk($this->UserId);
		if ($user){
		echo $user->Social;
		
		}
		

		
	}
	
		
	public function getStarred(){
	$results = Starred::model()->findAllByAttributes(array('UserID'=>$this->UserId));
	 $count = count ( $results ); return $count;
	
	}
	
	public function getSearch()
	{

         $results = ServiceSearches::model()->findAllByAttributes(array('UserID'=>$this->UserId));
		 $count = count ( $results ); return $count;

		
	}


	public function getCalls()
	{

         $results = Calls::model()->findAllByAttributes(array('UserID'=>$this->UserId));
		 $count = count ( $results ); return $count;
		
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

		$criteria->compare('Id',$this->Id);
		$criteria->compare('UserId',$this->UserId);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Phone',$this->Phone,true);
		$criteria->compare('PhoneCodeRequests',$this->PhoneCodeRequests);
		$criteria->compare('PhoneCodeEnter',$this->PhoneCodeEnter);
		$criteria->compare('smsBlockedUntil',$this->smsBlockedUntil,true);
		$criteria->compare('Email',$this->Email,true);

		
		return new CActiveDataProvider($this, array(
			'pagination' => array('pageSize' => 25),
			'criteria'=>$criteria,
				'sort'=>array(
            'defaultOrder'=>'Id DESC',
        ),
		));
	}
}