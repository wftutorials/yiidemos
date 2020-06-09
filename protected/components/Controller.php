<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public function getFlashMessage(){
        $o = "";
        if(Yii::app()->user->hasFlash('success')){
            $o .= "<div class='flash-success'>";
            $o .= Yii::app()->user->getFlash('success');
        }else if(Yii::app()->user->hasFlash('error')){
            $o .= "<div class='flash-error'>";
            $o .= Yii::app()->user->getFlash('error');
        }else{
            return ""; // return empty
        }
        $o .= "</div>";
        echo $o;
    }

    public function setAlert($type, $message)
    {
        Yii::app()->user->setFlash($type, $message);
    }
}