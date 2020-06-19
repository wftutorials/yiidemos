<?php
/* @var $this BlogController */
/* @var $model Posts */

$this->breadcrumbs=array(
    'Recent Posts',
);
?>
<h1>Recent Posts</h1>
<p>Listing of recent posts</p>

<?php $this->getFlashMessage();?>
<?php

$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>Posts::model()->allRecent(),
    'summaryText' => '',
    'itemView'=>'_post',   // refers to the partial view named '_post'
    'sortableAttributes'=>array(
    ),
));
?>

<?php Yii::app()->clientScript->registerScriptFile("/js/notify.min.js", CClientScript::POS_END);?>

<?php
Yii::app()->clientScript->registerScript('publicProfile', "
  $('.post-like').on('click', function () {
    var el = $(this);
    $.get('/blog/like/'+el.attr('data-id'), function(){
        $.notify('liked post','success');
    });
  return false;
 });
 
 $('.post-share').on('click', function(){
     var el = $(this);
     alert('Share this link using - ' + el.attr('data-share'));
     return false;
 });
");
?>
