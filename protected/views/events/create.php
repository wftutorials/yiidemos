<?php
/* @var $this ToDoController */

$this->breadcrumbs=array(
    'All Events' => $this->createUrl('/events/'),
    'Create Event',
);
?>
    <h1>Create a new Event</h1>
    <p>Create a new event</p>
    <?php $this->renderPartial('_form',['model'=>$model]);