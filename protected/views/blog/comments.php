<?php
/* @var $this BlogController */
/* @var $model PostComment */

$this->breadcrumbs=array(
    'Posts' => $this->createUrl("/blog/posts"),
    'All Comments',
);
?>
<h1>All Comments</h1>
<p>Listing of all comments</p>
<div id="table-holder">
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'all-my-tasks-grid',
        'dataProvider'=>$model->search(),
        'summaryText' => '<button id="delete">Delete</button>&nbsp;',
        'selectableRows'=>0,
        'columns'=>array(
            array(
                'id'=>'id',
                'class'=>'CCheckBoxColumn',
                'selectableRows' => '50',
            ),
            array(
                'name' => 'comment',
                'type' => 'raw',
                'value' => '$data->getPostCommentUrl()',
                'htmlOptions'=> array('align'=>'center'),
            ),
            array(
                'name' => 'user',
            ),
            array(
                'name' => 'Created On',
                'value' => '$data->createdOn'
            ),
        ),
    )); ?>
</div>