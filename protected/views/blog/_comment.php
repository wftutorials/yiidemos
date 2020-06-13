
<div class="form">

    <?php $this->getFlashMessage();?>

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'comment-form',
        'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'user'); ?>
        <?php echo $form->textField($model,'user'); ?>
        <?php echo $form->error($model,'user'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model,'comment'); ?>
        <?php echo $form->textField($model,'comment'); ?>
        <?php echo $form->error($model,'comment'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
