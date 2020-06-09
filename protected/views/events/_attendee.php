
<div class="form">
    <?php $this->getFlashMessage();?>
    <h5>Add a new attendee</h5>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'event-form',
        'enableClientValidation'=>false,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($attendeeModel); ?>

    <?php if($attendeeModel->event_id):?>
        <?php echo $form->hiddenField($attendeeModel,'event_id'); ?>
    <?php else:?>
        <div class="row">
            <?php echo $form->labelEx($attendeeModel,'event_id'); ?>
            <?php echo $form->dropDownList($attendeeModel,'event_id',
                CHtml::listData(Events::model()->findAll(),'id','title')); ?>
            <?php echo $form->error($attendeeModel,'event_id'); ?>
        </div>
    <?php endif;?>

    <div class="row">
        <?php echo $form->labelEx($attendeeModel,'first_name'); ?>
        <?php echo $form->textField($attendeeModel,'first_name'); ?>
        <?php echo $form->error($attendeeModel,'first_name'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($attendeeModel,'last_name'); ?>
        <?php echo $form->textField($attendeeModel,'last_name'); ?>
        <?php echo $form->error($attendeeModel,'last_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($attendeeModel,'email'); ?>
        <?php echo $form->textField($attendeeModel,'email'); ?>
        <?php echo $form->error($attendeeModel,'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($attendeeModel,'contact'); ?>
        <?php echo $form->textField($attendeeModel,'contact'); ?>
        <?php echo $form->error($attendeeModel,'contact'); ?>
    </div>
    

    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>
