<?php
/* @var $this FilesController */
/* @var $model Files */
/* @var $folderName string */

$this->breadcrumbs=array(
    'Files' => $this->createUrl("/files/"),
    'Trash',
);
?>
<h1>Trash Bin</h1>
<p>Listing of all deleted files</p>
<div id="table-holder">
    <div style="display: inline-block; margin-bottom: 3px;">
        Bulk Actions: <button id="restore-files">Restore files</button>
        <button id="delete-permanently">Delete Permanently</button>
    </div>
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'all-my-files-grid',
        'dataProvider'=>$model->getTrashed(),
        'selectableRows'=>0,
        'columns'=>array(
            array(
                'id'=>'id',
                'class'=>'CCheckBoxColumn',
                'selectableRows' => '50',
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

        $('#table-holder').on('click','#restore-files',function(){
            var val = [];
            $('input[name=\"id[]\"]:checked:enabled').each(function(i){
                val[i] = $(this).val();
            });
            if(val.length == 0){
                alert('Please select at least one record!');
                return false;
            }else {
                var c = confirm('Are you sure you want to restore these files?');
                if( c ){
                    var ids  = 'ids/'+val.join(',');
                    $.get('/files/restorefiles/'+ids)
                        .done(function(){
                            $.fn.yiiGridView.update('all-my-files-grid', {
                                data: $(this).serialize()
                            });
                        });
                }
            }
            return false;
        });

        $('#table-holder').on('click','#delete-permanently',function(){
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
                    $.get('/files/PermanentlyRemove/'+ids)
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