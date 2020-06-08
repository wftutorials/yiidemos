<?php
/* @var $this ToDoController */
/* @var $model Events */

$this->breadcrumbs=array(
    'All Events' => $this->createUrl('/events/'),
    $model->title,
);
?>
<h1><?php echo $model->title;?></h1>
<p><?php echo $model->description;?></p>
<p><a href="<?php echo $this->createUrl('/events/update',['id'=>$this->id]);?>">
        Edit this event</a></p>
<br>
<div>
    <p>Venue: <?php echo $model->venue;?></p>
    <p>Date: <?php echo $model->eventDate;?></p>
    <p>Time: <?php echo $model->eventTime;?></p>
</div>
<hr>
<p>Contact Person: <?php echo $model->contactName;?></p>
<p>Contact: <?php echo $model->contactNumber;?></p>
