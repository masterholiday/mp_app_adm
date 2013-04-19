<?php

/**
 * This is the model class for table "iventor_services".
 *
 * The followings are the available columns in table 'iventor_services':
 * @property integer $Id
 * @property integer $IventorId
 * @property integer $CategoryId
 * @property integer $CityId
 * @property integer $PriceId
 * @property integer $minPrice
 * @property integer $maxPrice
 */
class IventorServices extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return IventorServices the static model class
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
		return 'iventor_services';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IventorId, CategoryId, CityId', 'required'),
			array('IventorId, CategoryId, CityId, PriceId, minPrice, maxPrice', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, IventorId, CategoryId, CityId, PriceId, minPrice, maxPrice', 'safe', 'on'=>'search'),
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
			'IventorId' => 'Iventor',
			'CategoryId' => 'Category',
			'CityId' => 'City',
			'PriceId' => 'Price',
			'minPrice' => 'Min Price',
			'maxPrice' => 'Max Price',
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
		$criteria->compare('IventorId',$this->IventorId);
		$criteria->compare('CategoryId',$this->CategoryId);
		$criteria->compare('CityId',$this->CityId);
		$criteria->compare('PriceId',$this->PriceId);
		$criteria->compare('minPrice',$this->minPrice);
		$criteria->compare('maxPrice',$this->maxPrice);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}