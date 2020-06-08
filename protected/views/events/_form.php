
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'event-form',
        'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model,'title'); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'type'); ?>
        <?php echo $form->dropDownList($model,'type', Events::model()->getAllTypes()); ?>
        <?php echo $form->error($model,'type'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description'); ?>
        <?php echo $form->textField($model,'description'); ?>
        <?php echo $form->error($model,'description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'eventDate'); ?>
        <?php echo $form->dateField($model,'eventDate'); ?>
        <?php echo $form->error($model,'eventDate'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'eventTime'); ?>
        <?php echo $form->textField($model,'eventTime'); ?>
        <?php echo $form->error($model,'eventTime'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'contactName'); ?>
        <?php echo $form->textField($model,'contactName'); ?>
        <?php echo $form->error($model,'contactName'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'contactNumber'); ?>
        <?php echo $form->textField($model,'contactNumber'); ?>
        <?php echo $form->error($model,'contactNumber'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
