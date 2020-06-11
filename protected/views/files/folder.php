<?php
/* @var $this FilesController */
/* @var $model Files */
/* @var $folderName string */

$this->breadcrumbs=array(
    'Files' => $this->createUrl("/files/"),
    'Folders' => $this->createUrl("files/folders"),
    ucfirst($folderName)
);
?>
<h1>My <?php echo ucfirst($folderName);?> Folder</h1>
<p>Listing of all files in</p>
<div id="table-holder">
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'all-my-files-grid',
        'dataProvider'=>$model->getByFolder($folderName),
        'summaryText' => $this->renderPartial('_buttons', [], true),
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