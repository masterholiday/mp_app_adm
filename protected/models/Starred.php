<?php

/**
 * This is the model class for table "starred".
 *
 * The followings are the available columns in table 'starred':
 * @property integer $ID
 * @property integer $EventorID
 * @property integer $UserID
 * @property integer $EventorServiceID
 */
class Starred extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Starred the static model class
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
		return 'starred';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EventorID, UserID, EventorServiceID', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, EventorID, UserID, EventorServiceID', 'safe', 'on'=>'search'),
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
			'EventorServiceID' => 'Eventor Service',
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
		$criteria->compare('EventorServiceID',$this->EventorServiceID);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}