<?php
/* @var $this ToDoController */

$this->breadcrumbs=array(
    'All Tasks' => $this->createUrl('/todo/'),
    'Create Task',
);
?>
    <h1>Create a new Task</h1>
    <p>Create a new task</p>
    <?php $this->renderPartial('_form',['model'=>$model]);