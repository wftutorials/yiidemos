<?php
/* @var $this FilesController */
/* @var $files Files */

$this->breadcrumbs=array(
    'All Files',
);
?>
<h1>All My Files</h1>
<p>Listing of all my Files</p>
<?php $this->getFlashMessage();?>
<div style="border:1px solid #ccc; display:inline-block;; padding: 5px;">
    <span><strong>Quick upload</strong></span>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'file-form',
        'htmlOptions'=>array(
            'enctype' => 'multipart/form-data'
        )
    )); ?>
    <?php echo $form->fileField($model,'file'); ?>
    <?php echo CHtml::submitButton('Save'); ?>
    <?php $this->endWidget(); ?>
</div>
<div id="table-holder">
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'all-my-files-grid',
        'dataProvider'=>$files->search(),
        'summaryText' => $this->renderPartial('_buttons', [], true),
        'selectableRows'=>0,
        'columns'=>array(
            array(
                'id'=>'id',
                'class'=>'CCheckBoxColumn',
                'selectableRows' => '50',
            ),
            array(
                'name' => '',
                'type' => 'raw',
                'value' => '$data->getIcon()'
            ),
            array(
                'name' => 'name',
                'type' => 'raw',
                'value' => '$data->getLinkedName()',
                'htmlOptions'=> array('align'=>'center'),
            ),
            array(
                'name' => 'type',
            ),
            array(
                'name' => 'File Size',
                'value' => '$data->file_size'
            ),
            array(
                'name' => 'folder',
            ),
            array(
                'name' => 'Created On',
                'value' => '$data->createdOn'

            ),


        ),
    )); ?>
</div>

<script>
    $(document).ready(function(){
        $('#table-holder').on('click','#move-files',function(){
            var val = [];
            $('input[name=\"id[]\"]:checked:enabled').each(function(i){
                val[i] = $(this).val();
            });
            if(val.length == 0){
                alert('Please select at least one record!');
                return false;
            }else {
                var ids  = val.join(',');
                var name = $('#folders').val();
                console.log(name);
                $.post('/files/move',{ids:ids, folder:name})
                    .done(function(){
                        $.fn.yiiGridView.update('all-my-files-grid', {
                            data: $(this).serialize()
                        });
                    });
            }
            return false;
        });
        $('#filter').submit(function(){
            $.fn.yiiGridView.update('all-my-files-grid', {
                data: $(this).serialize()
            });
            return false;
        });

        $("#clear-filter").on("click", function(){
            $('input[name="search"').val("");
            $('#filter').submit();
            return false;
        });

        $('#table-holder').on('click','#delete-files',function(){
            var val = [];
            $('input[name=\"id[]\"]:checked:enabled').each(function(i){
                val[i] = $(this).val();
            });
            if(val.length == 0){
                alert('Please select at least one record!');
                return false;
            }else {
                var c = confirm('Are you sure you want to delete these files?');
                if( c ){
                    var ids  = 'ids/'+val.join(',');
                    $.get('/files/trashfiles/'+ids)
                        .done(function(){
                            $.fn.yiiGridView.update('all-my-files-grid', {
                                data: $(this).serialize()
                            });
                        });
                }
            }
            return false;
        });

    })
</script>