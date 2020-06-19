<?php
/* @var $this BlogController */
/* @var $model Posts */

$this->breadcrumbs=array(
    'Posts' => $this->createUrl("/blog/posts"),
    'All Published posts',
);
?>
<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-filter').toggle();
	return false;
});
$('#filter-form').submit(function(){
	$.fn.yiiGridView.update('all-my-posts-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
<h1>All Posts</h1>
<p>Listing of all posts</p>
<?php echo CHtml::link('Advanced Filter','#',array('class'=>'search-button')); ?>
<div class="search-filter" style="display: none;">
    <?php $this->renderPartial('_filter',['model'=>$model]);?>
</div>
<div id="table-holder">
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'all-my-posts-grid',
        'dataProvider'=>$model->allPublished(),
        'summaryText' => '<button id="unpublish">Unpublish</button>&nbsp;<button id="delete">Delete</button>&nbsp;',
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
                'value' => '$data->getViewLink()'
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
        $('#table-holder').on('click','#unpublish',function(){
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
                    $.get('/blog/Publishing?ids='+ids + '&action=unpublish')
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