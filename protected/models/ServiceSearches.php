<?php

/**
 * This is the model class for table "service_searches".
 *
 * The followings are the available columns in table 'service_searches':
 * @property integer $Id
 * @property integer $SearchID
 * @property integer $CategoriesId
 * @property integer $EventorID
 * @property integer $minPrice
 * @property integer $maxPrice
 * @property string $Info
 * @property integer $UserDeleted
 * @property integer $EventorDeleted
 * @property integer $UserID
 * @property string $SearchDate
 */
class ServiceSearches extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ServiceSearches the static model class
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
		return 'service_searches';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('SearchID, CategoriesId, EventorID, Info', 'required'),
			array('SearchID, CategoriesId, EventorID, minPrice, maxPrice, UserDeleted, EventorDeleted, UserID', 'numerical', 'integerOnly'=>true),
			array('SearchDate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, SearchID, CategoriesId, EventorID, minPrice, maxPrice, Info, UserDeleted, EventorDeleted, UserID, SearchDate', 'safe', 'on'=>'search'),
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
			'SearchID' => 'Search',
			'CategoriesId' => 'Categories',
			'EventorID' => 'Eventor',
			'minPrice' => 'Min Price',
			'maxPrice' => 'Max Price',
			'Info' => 'Info',
			'UserDeleted' => 'User Deleted',
			'EventorDeleted' => 'Eventor Deleted',
			'UserID' => 'User',
			'SearchDate' => 'Search Date',
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
		$criteria->compare('SearchID',$this->SearchID);
		$criteria->compare('CategoriesId',$this->CategoriesId);
		$criteria->compare('EventorID',$this->EventorID);
		$criteria->compare('minPrice',$this->minPrice);
		$criteria->compare('maxPrice',$this->maxPrice);
		$criteria->compare('Info',$this->Info,true);
		$criteria->compare('UserDeleted',$this->UserDeleted);
		$criteria->compare('EventorDeleted',$this->EventorDeleted);
		$criteria->compare('UserID',$this->UserID);
		$criteria->compare('SearchDate',$this->SearchDate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}