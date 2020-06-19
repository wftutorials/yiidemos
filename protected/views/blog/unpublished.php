<?php
/* @var $this BlogController */
/* @var $model Posts */

$this->breadcrumbs=array(
        'Posts' => $this->createUrl("/blog/posts"),
    'All Unpublished posts',
);
?>
<h1>Unpublished Posts</h1>
<p>Listing of all unpublished posts</p>
<div id="table-holder">
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'all-my-posts-grid',
        'dataProvider'=>$model->allUnPublished(),
        'summaryText' => '<button id="publish">Publish</button>&nbsp;<button id="delete">Delete</button>&nbsp;',
        'selectableRows'=>0,
        'columns'=>array(
            array(
                'id'=>'id',
                'class'=>'CCheckBoxColumn',
                'selectableRows' => '50',
            ),
            array(
                'name' => 'title',
                'type' => 'raw',
                'htmlOptions'=> array('align'=>'center'),
                'value' => '$data->getEditLink()'
            ),
            array(
                'name' => 'excerpt',
            ),
            array(
                'name' => 'category',
            ),
            array(
                'name' => 'author',
            ),
            array(
                'name' => 'Created On',
                'value' => '$data->PostDate'
            ),
        ),
    )); ?>
</div>
<script>
    $(document).ready(function(){
        $('#table-holder').on('click','#publish',function(){
            var val = [];
            $('input[name=\"id[]\"]:checked:enabled').each(function(i){
                val[i] = $(this).val();
            });
            if(val.length == 0){
                alert('Please select at least one record!');
                return false;
            }else {
                var c = confirm('Are you sure you want set these as completed.');
                if( c ){
                    var ids  = val.join(',');
                    $.get('/blog/Publishing?ids='+ids + '&action=publish')
                        .done(function(){
                            $.fn.yiiGridView.update("all-my-posts-grid", {
                                data: $(this).serialize()
                            });
                        });
                }
            }
            return false;
        });

        $('#table-holder').on('click','#delete',function(){
            var val = [];
            $('input[name=\"id[]\"]:checked:enabled').each(function(i){
                val[i] = $(this).val();
            });
            if(val.length == 0){
                alert('Please select at least one record!');
                return false;
            }else {
                var c = confirm('Are you sure you want to delete these tasks?');
                if( c ){
                    var ids  = 'ids/'+val.join(',');
                    $.get('/blog/RemovePostsBulk/'+ids)
                        .done(function(){
                            $.fn.yiiGridView.update("all-my-posts-grid", {
                                data: $(this).serialize()
                            });
                        });
                }
            }
            return false;
        });
    });
</script>