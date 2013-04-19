<?php

/**
 * This is the model class for table "city_category_text".
 *
 * The followings are the available columns in table 'city_category_text':
 * @property integer $ID
 * @property integer $CategoryID
 * @property integer $CityID
 * @property string $Description
 * @property string $desc
 * @property string $title
 */
class Citycategorytext extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Citycategorytext the static model class
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
		return 'city_category_text';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CategoryID, Description', 'required'),
			array('CategoryID, CityID', 'numerical', 'integerOnly'=>true),
			array('Description, desc, title', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, CategoryID, CityID, Description, desc, title', 'safe', 'on'=>'search'),
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
			'CategoryID' => 'Category',
			'CityID' => 'City',
			'Description' => 'Описание категории',
			'desc' => 'Meta Description',
			'title' => 'Заголовок раздела каталога',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	 
	public function getCategory(){
	$category = ServiceCategories::model()->findByPk($this->CategoryID);
	return $category;
	}
	
	public function getCity(){
	$city = City::model()->findByPk($this->CityID);
	if($city){
	return $city->name;}
	else
	{
	return 0;
	}
	}
	
	
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('CategoryID',$this->CategoryID);
		$criteria->compare('CityID',$this->CityID);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('title',$this->title,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}