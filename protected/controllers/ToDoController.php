<?php

class ToDoController extends Controller
{
    public $layout ='todo';

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionDue()
    {
	    $this->render('due');
    }

    public function actionCompleted()
    {
	    $this->render("completed");
    }

    public function actionCreate(){
	    $model = new Todo();
	    if(isset($_POST['Todo'])){
	        $model->attributes = $_POST['Todo'];
	        if($model->save()){
	            $this->redirect('/todo/');
            }
        }
	    $this->render('create',['model'=>$model]);
    }

    public function actionDeleteTasks($ids){
        $pkIds = explode(",", $ids);
        foreach($pkIds as $id){
           Todo::model()->findByPk($id)->delete();
        }
    }

    public function actionSetComplete($ids){
        $pkIds = explode(",", $ids);
        foreach($pkIds as $id){
            $task = Todo::model()->findByPk($id);
            $task->completed = 1;
            $task->completedOn = date("Y-m-d");
            $task->update();
        }
    }

    public function actionSetUnComplete($ids){
        $pkIds = explode(",", $ids);
        foreach($pkIds as $id){
            $task = Todo::model()->findByPk($id);
            $task->completed = 0;
            $task->completedOn = Null;
            $task->update();
        }
    }


}