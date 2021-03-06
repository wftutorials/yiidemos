<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
    'All Events',
);
?>
<h1>All Events</h1>
<p>Listing of all events</p>
<p><a href="<?php echo $this->createUrl('/events/create');?>">Create New Event</a></p>
<form action="<?php echo Yii::app()->request->url;?>">
    <input type="text" name="search" placeholder="Search events"/><input type="submit"/>
    <a href="<?php echo $this->createUrl('/events/');?>">Clear</a>
</form>
<div id="table-holder">
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'all-my-tasks-grid',
        'dataProvider'=>$model->allOpen(),
        'summaryText' => '<button id="close-event">Close Event</button>&nbsp;<button id="delete-event">Delete Event</button>&nbsp;',
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
                'value' => '$data->titleLink()',
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
            array(
                'name' => 'Register',
                'type' => 'raw',
                'value' =>'$data->registerLink()',
                'htmlOptions'=> array('align'=>'center'),
            ),
            array(
                'name' => 'Attendees',
                'type' => 'raw',
                'value' =>'$data->attendeesLink()',
                'htmlOptions'=> array('align'=>'center'),
            ),
        ),
    )); ?>
</div>

<script>
    $(document).ready(function(){
        $('#table-holder').on('click','#close-event',function(){
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
                    $.get('/events/closeevents/'+ids)
                        .done(function(){
                            $.fn.yiiGridView.update("all-my-tasks-grid", {
                                data: $(this).serialize()
                            });
                        });
                }
            }
            return false;
        });

        $('#table-holder').on('click','#delete-event',function(){
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
