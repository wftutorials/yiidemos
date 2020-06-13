
<div class="form">

    <?php $this->getFlashMessage();?>

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'event-form',
        'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>false,
        ),
        'htmlOptions'=>array(
            'enctype' => 'multipart/form-data'
        )
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'file'); ?>
        <?php echo $form->fileField($model,'file'); ?>
        <?php echo $form->error($model,'file'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model,'title'); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model,'excerpt'); ?>
        <?php echo $form->textField($model,'excerpt'); ?>
        <?php echo $form->error($model,'excerpt'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'content'); ?>
        <?php echo $form->textArea($model,'content',array('cols'=>50, 'rows'=>8)); ?>
        <?php echo $form->error($model,'content'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'category'); ?>
        <?php echo $form->dropDownList($model,'category', Posts::model()->getCategories()); ?>
        <?php echo $form->error($model,'category'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'tags'); ?>
        <?php echo $form->textField($model,'tags'); ?>
        <?php echo $form->error($model,'tags'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'author'); ?>
        <?php echo $form->textField($model,'author'); ?>
        <?php echo $form->error($model,'author'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model,'published'); ?>
        <?php echo $form->dropDownList($model,'published',
            Posts::model()->getPublishStatus()); ?>
        <?php echo $form->error($model,'published'); ?>
    </div>



    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
