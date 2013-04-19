<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $Id
 * @property string $Email
 * @property string $Password
 * @property string $RegistrationDate
 * @property string $Social
 * @property integer $UserType
 * @property integer $Active
 * @property string $ActiveKay
 * @property string $SocialID
 * @property string $RememberMe
  *
 * The followings are the available model relations:
 * @property Inventorinfo[] $inventorinfos
 */
class Users extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	 
	public function generatePass(){
	return substr(md5(microtime()),rand(0,26),7);
	} 
	
	public function encryptPass($pass){
	return md5($pass);
	}
	
	
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UserType, Active', 'numerical', 'integerOnly'=>true),
			array('Email', 'length', 'max'=>255),
			array('Password, ActiveKay', 'length', 'max'=>60),
			array('Social', 'length', 'max'=>10),
			array('SocialID', 'length', 'max'=>200),
			array('RememberMe', 'length', 'max'=>32),
			array('RegistrationDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Email, Password, RegistrationDate, Social, UserType, Active, ActiveKay, SocialID, RememberMe', 'safe', 'on'=>'search'),
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
         'inventorinfos' => array(self::HAS_MANY, 'Inventorinfo', 'UserId'),
    	);
		
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Email' => 'Email',
			'Password' => 'Password',
			'RegistrationDate' => 'Registration Date',
			'Social' => 'Social',
			'UserType' => 'User Type',
			'Active' => 'Active',
			'ActiveKay' => 'Active Kay',
			'SocialID' => 'Social',
			'RememberMe' => 'Remember Me',
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

		$criteria->compare('Id',$this->Id);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('RegistrationDate',$this->RegistrationDate,true);
		$criteria->compare('Social',$this->Social,true);
		$criteria->compare('UserType',$this->UserType);
		$criteria->compare('Active',$this->Active);
		$criteria->compare('ActiveKay',$this->ActiveKay,true);
		$criteria->compare('SocialID',$this->SocialID,true);
		$criteria->compare('RememberMe',$this->RememberMe,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}