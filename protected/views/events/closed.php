<?php
/* @var $this EventsController */

$this->breadcrumbs=array(
    'All Events' => $this->createUrl('/events/'),
    'All Closed Events',
);
?>
<h1>All Closed Events</h1>
<p>Listing of all closed events</p>

<div id="table-holder">
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'all-my-tasks-grid',
        'dataProvider'=>Events::model()->allClosed(),
        'summaryText' => '<button id="open-events">Open event</button>&nbsp;<button id="delete-events">Delete event</button>&nbsp;',
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
                'name' => 'venue',
            ),
            array(
                'name' => 'eventDate',
            ),
            array(
                'name' => 'eventTime',
            ),
            array(
                'name' => 'Status',
                'type' => 'raw',
                'value' =>'$data->getStatus()'
            ),
        ),
    )); ?>
</div>

<script>
    $(document).ready(function(){
        $('#table-holder').on('click','#open-events',function(){
            var val = [];
            $('input[name=\"id[]\"]:checked:enabled').each(function(i){
                val[i] = $(this).val();
            });
            if(val.length == 0){
                alert('Please select at least one record!');
                return false;
            }else {
                var c = confirm('Are you sure you want set these events as open.');
                if( c ){
                    var ids  = 'ids/'+val.join(',');
                    $.get('/events/OpenEvents/'+ids)
                        .done(function(){
                            $.fn.yiiGridView.update("all-my-tasks-grid", {
                                data: $(this).serialize()
                            });
                        });
                }
            }
            return false;
        });

        $('#table-holder').on('click','#delete-events',function(){
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
                    $.get('/events/DeleteEvents/'+ids)
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
