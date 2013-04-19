<?php

/**
 * This is the model class for table "missing".
 *
 * The followings are the available columns in table 'missing':
 * @property integer $Id
 * @property integer $IventorId
 * @property string $Date
 */
class Missing extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Missing the static model class
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
		return 'missing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IventorId', 'numerical', 'integerOnly'=>true),
			array('Date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, IventorId, Date', 'safe', 'on'=>'search'),
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
			'Date' => 'Date',
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
		$criteria->compare('Date',$this->Date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}