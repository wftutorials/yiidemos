<?php
/* @var $this EventsController */
/* @var $model Events */

$this->breadcrumbs=array(
    'All Events' => $this->createUrl('/events/'),
    $model->title => $this->createUrl('/events/view/',['id'=>$model->id]),
    'Update Event',
);
?>
    <h1><?php echo $model->title;?> (UPDATE)</h1>
    <p>Update the event</p>
<?php $this->renderPartial('_form',['model'=>$model]);