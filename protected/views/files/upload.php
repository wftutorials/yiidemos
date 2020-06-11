<?php
/* @var $this FilesController */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
    'All Files',
);
?>
<h1>Upload Files</h1>
<p>Upload your files</p>

<div class="form">

    <?php $this->getFlashMessage();?>

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'file-form',
        'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        'htmlOptions'=>array(
                'enctype' => 'multipart/form-data'
        )
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'file'); ?>
        <?php echo $form->fileField($model,'file[]',array('multiple'=>'multiple')); ?>
        <?php echo $form->error($model,'file'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>

