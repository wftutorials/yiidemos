<div class="form">
    <br>
    <h3>Filter Form</h3>

    <?php $this->getFlashMessage();?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'filter-form',
    'method' =>'get',
    'enableClientValidation'=>false,
    'clientOptions'=>array(
        'validateOnSubmit'=>false,
    ),
)); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model,'title'); ?>
        <?php echo $form->error($model,'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'category'); ?>
        <?php echo $form->dropDownList($model,'category', Posts::model()->getCategories()); ?>
        <?php echo $form->error($model,'category'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>
