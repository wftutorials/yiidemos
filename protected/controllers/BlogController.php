<?php


class BlogController extends Controller
{
    public $layout ='blog';

    public function actionIndex(){
        $model = new Posts();
        $this->render("index",['model'=>$model]);
    }

    public function actionWrite(){
        $model = new Posts();
        if(isset($_POST["Posts"])){
            $model->attributes = $_POST['Posts'];
            $model->save();
        }
        $this->render("write",['model'=>$model]);
    }

    public function actionPosts(){
        $model = new Posts();
        $this->render("posts",['model'=>$model]);
    }

    public function actionUnpublished(){
        $model = new Posts();
        $this->render("unpublished",['model'=>$model]);
    }

    public function actionPost($id){
        $model = Posts::model()->findByPk($id);
        if($model == null){
            throw new Exception("Post not found");
        }
        $this->render("post",['model'=>$model]);

    }

    public function actionComments(){
        $this->render("comments");
    }

    public function actionPostEdit($id){
        $model = Posts::model()->findByPk($id);
        if($model === null){
            throw new CHttpException("Post does not exists");
        }
        if(isset($_POST['Posts'])){
            $model->attributes = $_POST['Posts'];
            $model->update();
            $this->setAlert("success","Post successfully updated");
        }
        $this->render("edit",['model'=>$model]);
    }

    public function actionPostComment($id){
        $model = Posts::model()->findByPk($id);
        $this->render("postcomment",['model'=>$model]);
    }


}