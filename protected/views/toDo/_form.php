
  <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'todo-form',
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
          <?php echo $form->labelEx($model,'description'); ?>
          <?php echo $form->textField($model,'description'); ?>
          <?php echo $form->error($model,'description'); ?>
      </div>

      <div class="row">
          <?php echo $form->labelEx($model,'dueOn'); ?>
          <?php echo $form->dateField($model,'dueOn'); ?>
          <?php echo $form->error($model,'dueOn'); ?>
      </div>


        <div class="row buttons">
            <?php echo CHtml::submitButton('Submit'); ?>
        </div>

        <?php $this->endWidget(); ?>
  </div>
