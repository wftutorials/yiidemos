<?php

/**
 * This is the model class for table "files".
 *
 * The followings are the available columns in table 'files':
 * @property integer $id
 * @property string $name
 * @property string $type
 * @property string $link
 * @property string $folder
 * @property integer $deleted
 * @property string $createdOn
 * @property string $file_size
 * @property string $full_path
 */
class Files extends CActiveRecord
{
    public $query;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'files';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('deleted', 'numerical', 'integerOnly'=>true),
			array('folder', 'length', 'max'=>45),
			array('name, link, type', 'length', 'max'=>125),
			array('createdOn', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, type, link, folder, deleted, createdOn', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'type' => 'Type',
			'link' => 'Link',
			'folder' => 'Folder',
			'deleted' => 'Deleted',
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
		$criteria=new CDbCriteria;
		if($this->query){
            $criteria->compare('name', $this->query, true);
        }
        $criteria->addCondition('deleted=0');
		$criteria->order ='createdOn desc';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getTrashed(){
        $criteria=new CDbCriteria;
        //$criteria->compare('name', $this->query, true);
        $criteria->addCondition('deleted=1');
        $criteria->order ='createdOn desc';
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

	public function getByFolder($folder= null){
        $criteria=new CDbCriteria;
        if(empty($folder) || $folder=="empty" || $folder=="root"){
            $criteria->addCondition('folder IS NULL OR folder="" OR folder="root"');
        }else{
            $criteria->compare('folder',$folder);
        }
        $criteria->order ='createdOn desc';
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Files the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getFolders(){
	    return [
	        'root' => 'Root',
	        'home'=> 'Home',
            'pictures' => 'Pictures',
            'documents' => 'Documents',
            'videos' => 'Videos',
            'work' => 'Work'
        ];
    }

    public function getLinkedName(){
        $url = $this->link;
        return CHtml::link($this->name,$url,['target'=>"_blank"]);
    }

    public function getFilesCountByFolder($folder){
	    if($folder=="root"){
	        $criteria = new CDbCriteria();
	        $criteria->addCondition("folder= '$folder' OR folder is null");
            return Files::model()->count($criteria);
        }else{
            return Files::model()->count(['condition'=>'folder="'.$folder.'"']);
        }
    }

    public function getIcon(){
	    $img = "ic_file.png";
	    if(strstr($this->type, "pdf")){
            $img = "ic_pdf.png";
        }else if(strstr($this->type, "audio")){
            $img = "ic_audio.png";
        }else if(strstr($this->type, "video")){
            $img = "ic_video.png";
        }else if(strstr($this->type, "openxmlformats")){
            $img = "ic_word.png";
        }else if(strstr($this->type, "image")){
            $img = "ic_image.png";
        }

	    return CHtml::image("../images/icons/$img");
    }
}
