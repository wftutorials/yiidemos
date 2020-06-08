<?php


class EventsController extends Controller
{

    public $layout ='events';

    public function actionIndex(){
        $this->render('index');
    }

    public function actionCreate(){
        $model = new Events();
        $this->render("create",['model'=>$model]);
    }

    public function actionView($id){
        $model = Events::model()->findByPk($id);
        $this->render('view',['model'=>$model]);
    }

    public function actionAttendees($id=""){
        $attendeeModel = new EventAttendees();
        if($id){
            $model = Events::model()->findByPk($id);
            $attendeeModel->event_id = $model->id;
        }else{
            $model = new Events();
        }
        $this->render('attendees',
            ['model'=>$model,'attendeeModel'=>$attendeeModel]);
    }
}