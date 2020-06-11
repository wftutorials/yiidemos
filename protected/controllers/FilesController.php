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
            if($this->uploadFile($file)){
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
            foreach($files as $file){
                $this->uploadFile($file);
            }
            $this->setAlert("success", "File Uploaded");
        }
        $this->render('upload',['model'=>$uploader]);
    }

    private function uploadFile(CUploadedFile $file){
        $randname = $this->randName();
        $name = $file->getName();
        $ext = $file->getextensionName();
        $fileSize = $file->getSize();
        $finalName = $randname . "." . $ext;
        $url = Yii::app()->getBaseUrl(true) .'/uploads/' . $finalName;
        $fullPath =	Yii::app()->basePath."/../uploads/"  . $finalName;
        $file->saveAs($fullPath);
        $mimeType = mime_content_type($fullPath);
        return $this->saveToDatabase($name, $mimeType, $url, $fileSize, $fullPath);
    }

    private function saveToDatabase($name, $type, $link, $size, $path){
        $file = new Files();
        $file->name = $name;
        $file->type = $type;
        $file->link = $link;
        $file->file_size = $size;
        $file->full_path = $path;
        return $file->save();
    }

    public function actionTrash(){

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