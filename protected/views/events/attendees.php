<?php
/* @var $this ToDoController */
/* @var $model Events */


if($model->isNewRecord){
    $this->breadcrumbs=array(
        'All Events' => $this->createUrl('/events/'),
        'Attendees'
    );
}else{
    $this->breadcrumbs=array(
        'All Events' => $this->createUrl('/events/'),
        $model->title => $this->createUrl('/events/',['id'=>$model->id]),
        'Attendees'
    );
}
?>
<h1>All Attendees</h1>
<p>List of attendees</p>
<?php $this->renderPartial('_attendee',['attendeeModel'=>$attendeeModel]);?>

<br>
<div id="table-holder">
    <h5>Event Attendees Lising</h5>
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'all-my-tasks-grid',
        'dataProvider'=>EventAttendees::model()->search(),
        'summaryText' => 'Event Attendees &nbsp;<button id="mark-complete">Mark Completed</button>&nbsp;<button id="delete-tasks">Delete Tasks</button>&nbsp;',
        'selectableRows'=>0,
        'columns'=>array(
            array(
                'id'=>'id',
                'class'=>'CCheckBoxColumn',
                'selectableRows' => '50',
            ),
            array(
                'name' => 'first_name',
            ),
            array(
                'name' => 'last_name',

            ),
            array(
                'name' => 'email',
            ),
            array(
                'name' => 'contact',
            ),
        ),
    )); ?>
</div>
