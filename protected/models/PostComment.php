<?php

/**
 * This is the model class for table "post_comment".
 *
 * The followings are the available columns in table 'post_comment':
 * @property integer $id
 * @property integer $post_id
 * @property string $comment
 * @property string $createdOn
 * @property string $user
 */
class PostComment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'post_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_id', 'numerical', 'integerOnly'=>true),
			array('user, comment, createdOn', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, post_id, comment, createdOn', 'safe', 'on'=>'search'),
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
			'post_id' => 'Post',
			'comment' => 'Comment',
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
		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('createdOn',$this->createdOn,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PostComment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getPostCommentUrl(){
	    $url = Yii::app()->createUrl('/blog/post',['id'=>$this->post_id]);
	    return CHtml::link($this->comment,$url);
    }

    public function commentsById($id){

        $criteria=new CDbCriteria;
        $criteria->addCondition('post_id='. $id);
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}
