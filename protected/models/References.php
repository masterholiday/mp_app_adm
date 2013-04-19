<?php

/**
 * This is the model class for table "references".
 *
 * The followings are the available columns in table 'references':
 * @property integer $id
 * @property integer $iventorid
 * @property string $link
 * @property integer $reference
 * @property integer $year
 * @property integer $month
 */
class References extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return References the static model class
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
		return 'references';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('iventorid, reference, year, month', 'required'),
			array('iventorid, reference, year, month', 'numerical', 'integerOnly'=>true),
			array('link', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, iventorid, link, reference, year, month', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'iventorid' => 'Iventorid',
			'link' => 'Link',
			'reference' => 'Reference',
			'year' => 'Year',
			'month' => 'Month',
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
		$criteria->compare('iventorid',$this->iventorid);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('reference',$this->reference);
		$criteria->compare('year',$this->year);
		$criteria->compare('month',$this->month);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}