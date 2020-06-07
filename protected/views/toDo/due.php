<?php
/* @var $this ToDoController */

$this->breadcrumbs=array(
    'All Tasks' => $this->createUrl('/todo/'),
    'Due Tasks'
);
?>
    <h1>All My <b>Overdue</b> Tasks</h1>
    <p>Listing of all my overdue tasks</p>
<div id="table-holder">
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'all-my-tasks-grid',
    'dataProvider'=>ToDo::model()->allOverdue(),
    'summaryText' => '<button id="mark-complete">Mark Completed</button>&nbsp;<button id="delete-tasks">Delete Tasks</button>&nbsp;',
    'selectableRows'=>0,
    'columns'=>array(
        array(
            'id'=>'id',
            'class'=>'CCheckBoxColumn',
            'selectableRows' => '50',
        ),
        array(
            'name' => 'title',
            'htmlOptions'=> array('align'=>'center'),
        ),
        array(
            'name' => 'description',

        ),
        array(
            'name' => 'Due Date',
            'value' => '$data->dueOn'

        ),


    ),
)); ?>
</div>
<script>
    $(document).ready(function(){
        $('#table-holder').on('click','#mark-complete',function(){
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
                    var ids  = 'ids/'+val.join(',');
                    $.get('/todo/setcomplete/'+ids)
                        .done(function(){
                            $.fn.yiiGridView.update("all-my-tasks-grid", {
                                data: $(this).serialize()
                            });
                        });
                }
            }
            return false;
        });

        $('#table-holder').on('click','#delete-tasks',function(){
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
                    $.get('/todo/deletetasks/'+ids)
                        .done(function(){
                            $.fn.yiiGridView.update("all-my-tasks-grid", {
                                data: $(this).serialize()
                            });
                        });
                }
            }
            return false;
        });
    });
</script>

