<?php

/**
 * This is the model class for table "event_attendees".
 *
 * The followings are the available columns in table 'event_attendees':
 * @property integer $id
 * @property integer $event_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $contact
 */
class EventAttendees extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'event_attendees';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_id', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, email, contact', 'length', 'max'=>45),
            array('email', 'email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, event_id, first_name, last_name, email, contact', 'safe', 'on'=>'search'),
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
			'event_id' => 'Event',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'contact' => 'Contact',
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
		$criteria->compare('event_id',$this->event_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('contact',$this->contact,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getAllByEvent($id=null){
        $criteria=new CDbCriteria;
	    if($id){
            $criteria->addCondition('event_id='.$id);
        }
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EventAttendees the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getEventName(){
	    return Events::model()->findByPk($this->event_id)->title;
    }
}
