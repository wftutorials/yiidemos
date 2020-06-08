<?php

/**
 * This is the model class for table "events".
 *
 * The followings are the available columns in table 'events':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $venue
 * @property string $eventDate
 * @property string $eventTime
 * @property integer $closed
 * @property string $contactName
 * @property string $contactNumber
 * @property string $createdOn
 * @property string $type
 */
class Events extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'events';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('closed', 'numerical', 'integerOnly'=>true),
			array('type, title, description, venue, eventTime, contactName, contactNumber', 'length', 'max'=>45),
			array('eventDate, createdOn', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, venue, eventDate, eventTime, closed, contactName, contactNumber, createdOn', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'description' => 'Description',
			'venue' => 'Venue',
			'eventDate' => 'Event Date',
			'eventTime' => 'Event Time',
			'closed' => 'Closed',
			'contactName' => 'Contact Name',
			'contactNumber' => 'Contact Number',
			'createdOn' => 'Created On',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('venue',$this->venue,true);
		$criteria->compare('eventDate',$this->eventDate,true);
		$criteria->compare('eventTime',$this->eventTime,true);
		$criteria->compare('closed',$this->closed);
		$criteria->compare('contactName',$this->contactName,true);
		$criteria->compare('contactNumber',$this->contactNumber,true);
		$criteria->compare('createdOn',$this->createdOn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Events the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function registerLink(){
	    $url = Yii::app()->createUrl("/events/register",['id'=>$this->id]);
	    return CHtml::link('Click to register',$url);
    }

    public function titleLink(){
        $url = Yii::app()->createUrl("/events/view",['id'=>$this->id]);
        return CHtml::link($this->title,$url);
    }

    public function attendeesLink(){
	    $counter = "0";
        $url = Yii::app()->createUrl("/events/attendees",['id'=>$this->id]);
        return CHtml::link($counter,$url);
    }

    public function getAllTypes(){
	    return [
	        'General','Meeting','Conference','Presentation'
        ];
    }
}
