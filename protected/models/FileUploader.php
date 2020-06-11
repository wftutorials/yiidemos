<?php


class FileUploader extends CFormModel
{

    public $file;
    public $name;
    public $folder;

    public function rules()
    {
        return array(
            // username and password are required
            array('file', 'required'),
            array('file', 'file', 'allowEmpty' => false, 'types'=>'doc, docx, xls, xlsx, pdf, jpg, gif, png'),
            array('folder','safe')
        );
    }
}