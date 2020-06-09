<?php


class EventsController extends Controller
{

    public $layout ='events';

    public function actionIndex(){
        $model = new Events();
        if(isset($_GET['search'])){
            $model->query = $_GET["search"];
        }
        $this->render('index',['model'=>$model]);
    }

    public function actionClosed(){
        $this->render('closed');
    }

    public function actionCreate(){
        $model = new Events();
        if(isset($_POST["Events"])){
            $model->attributes = $_POST["Events"];
            if($model->save()){
                $this->setAlert('success',"Event created");
                $model->unsetAttributes();
            }
        }
        $this->render("create",['model'=>$model]);
    }

    public function actionUpdate($id){
        $model = Events::model()->findByPk($id);
        if(isset($_POST["Events"])){
            $model->attributes = $_POST["Events"];
            if($model->update()){
                $this->setAlert('success',"Event updated");
                $this->redirect($this->createUrl('/events/view',['id'=>$model->id]));
            }
        }
        $this->render("update",['model'=>$model]);
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
        if(isset($_POST['EventAttendees'])){
            $attendeeModel->attributes = $_POST['EventAttendees'];
            if($attendeeModel->save()){
                $this->setAlert('success','Registered to event');
                $attendeeModel->unsetAttributes();
            }
        }
        $this->render('attendees',
            ['model'=>$model,'attendeeModel'=>$attendeeModel]);
    }

    public function actionRegister($id){
        $model = Events::model()->findByPk($id);
        $attendeeModel = new EventAttendees();
        $attendeeModel->event_id = $model->id;
        if(isset($_POST['EventAttendees'])){
            $attendeeModel->attributes = $_POST['EventAttendees'];
            if($attendeeModel->save()){
                $this->setAlert('success','Registered to event');
                $attendeeModel->unsetAttributes();
                $attendeeModel->event_id = $id;
            }
        }
        $this->render('register',
            ['model'=>$model,'attendeeModel'=>$attendeeModel]);
    }

    public function actionCloseEvents($ids){
        $eventIds = explode(",", $ids);
        foreach($eventIds as $id){
            $event = Events::model()->findByPk($id);
            $event->closed = 1;
            $event->update();
        }
    }

    public function actionOpenEvents($ids){
        $eventIds = explode(",", $ids);
        foreach($eventIds as $id){
            $event = Events::model()->findByPk($id);
            $event->closed = 0;
            $event->update();
        }
    }

    public function actionDeleteEvents($ids){
        $pkIds = explode(",", $ids);
        foreach($pkIds as $id){
            Events::model()->findByPk($id)->delete();
        }
    }

    public function actionDeleteAttendees($ids){
        $pkIds = explode(",", $ids);
        foreach($pkIds as $id){
            EventAttendees::model()->findByPk($id)->delete();
        }
    }
}