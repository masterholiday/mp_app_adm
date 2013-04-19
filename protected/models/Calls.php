<?php

/**
 * This is the model class for table "calls".
 *
 * The followings are the available columns in table 'calls':
 * @property integer $ID
 * @property integer $EventorID
 * @property integer $UserID
 * @property string $Date
 * @property integer $EventorServiceID
 * @property integer $UserDeleted
 * @property integer $EventorDeleted
 * @property string $CallPhoneNumber
 */
class Calls extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Calls the static model class
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
		return 'calls';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EventorID, UserID, EventorServiceID, UserDeleted, EventorDeleted', 'numerical', 'integerOnly'=>true),
			array('CallPhoneNumber', 'length', 'max'=>20),
			array('Date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, EventorID, UserID, Date, EventorServiceID, UserDeleted, EventorDeleted, CallPhoneNumber', 'safe', 'on'=>'search'),
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
			'ID' => 'ID',
			'EventorID' => 'Eventor',
			'UserID' => 'User',
			'Date' => 'Date',
			'EventorServiceID' => 'Eventor Service',
			'UserDeleted' => 'User Deleted',
			'EventorDeleted' => 'Eventor Deleted',
			'CallPhoneNumber' => 'Call Phone Number',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('EventorID',$this->EventorID);
		$criteria->compare('UserID',$this->UserID);
		$criteria->compare('Date',$this->Date,true);
		$criteria->compare('EventorServiceID',$this->EventorServiceID);
		$criteria->compare('UserDeleted',$this->UserDeleted);
		$criteria->compare('EventorDeleted',$this->EventorDeleted);
		$criteria->compare('CallPhoneNumber',$this->CallPhoneNumber,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}