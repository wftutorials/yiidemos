<?php


class FilesController extends Controller
{

    public $layout ='files';


    public function actionIndex(){
        $uploader = new FileUploader();
        $fileModel = new Files();
        if(isset($_GET['search'])){
            $fileModel->query = $_GET['search'];
        }
        if(isset($_POST['FileUploader'])){
            $file = CUploadedFile::getInstance($uploader,'file');
            if($this->uploadFile($file,"root")){
                $this->setAlert("success", "File Uploaded");
            }
        }
        $this->render('index',['model'=>$uploader, 'files'=>$fileModel]);
    }

    public function actionFolders(){
        $folders = Files::model()->getFolders();
        $this->render('folders',['folders'=>$folders]);
    }

    public function actionUpload(){
        $uploader = new FileUploader();
        if(isset($_POST['FileUploader'])){
            $files = CUploadedFile::getInstances($uploader,'file');
            $uploader->attributes = $_POST['FileUploader'];
            foreach($files as $file){
                $this->uploadFile($file, $uploader->folder);
            }
            $this->setAlert("success", "File Uploaded");
        }
        $this->render('upload',['model'=>$uploader]);
    }

    private function uploadFile(CUploadedFile $file, $folder=null){
        $randname = $this->randName();
        $name = $file->getName();
        $ext = $file->getextensionName();
        $fileSize = $file->getSize();
        $finalName = $randname . "." . $ext;
        $url = Yii::app()->getBaseUrl(true) .'/uploads/' . $finalName;
        $fullPath =	Yii::app()->basePath."/../uploads/"  . $finalName;
        $file->saveAs($fullPath);
        $mimeType = mime_content_type($fullPath);
        try{
            return $this->saveToDatabase($name, $mimeType, $url, $fileSize, $fullPath, $folder);
        }catch (Exception $e){
            Yii::log($e->getMessage(), CLogger::LEVEL_ERROR, "files");
            return null;
        }
    }

    private function saveToDatabase($name, $type, $link, $size, $path, $folder){
        $file = new Files();
        $file->name = $name;
        $file->type = $type;
        $file->link = $link;
        $file->file_size = $size;
        $file->full_path = $path;
        $file->folder = $folder;
        return $file->save();
    }

    public function actionTrash(){
        $files = new Files();
        $this->render('trash',['model'=>$files]);
    }

    public function actionFolder(){
        $files = new Files();
        if(isset($_GET['name'])){
            $name = $_GET['name'];
        }else{
            $name = "empty";
        }
        $this->render("folder",['model'=>$files,'folderName'=>$name]);
    }

    public function actionMove(){
        if(isset($_POST['folder'])){
            $folder = $_POST['folder'];
            $fIds = explode(",", $_POST['ids']);
            foreach($fIds as $id){
                $file = Files::model()->findByPk($id);
                $file->folder = $folder;
                $file->update();
            }
        }
    }

    public function actionTrashFiles($ids){
        if(Yii::app()->request->isAjaxRequest){
            $fIds = explode(",", $ids);
            foreach($fIds as $id){
                $model = Files::model()->findByPk($id);
                $model->deleted = 1;
                $model->update();
            }
        }
    }

    public function actionPermanentlyRemove($ids){
        if(Yii::app()->request->isAjaxRequest){
            $fIds = explode(",", $ids);
            foreach($fIds as $id){
                $model = Files::model()->findByPk($id);
                $path = $model->full_path;
                if($model->delete()){
                    unlink($path);
                }
            }
        }
    }

    public function actionRestoreFiles($ids){
        if(Yii::app()->request->isAjaxRequest){
            $fIds = explode(",", $ids);
            foreach($fIds as $id){
                $model = Files::model()->findByPk($id);
                $model->deleted = 0;
                $model->update();
            }
        }
    }


    private function randName($num = 6)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $num; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }
        return $string;
    }

}