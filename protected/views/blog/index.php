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
    'dataProvider'=>Posts::model()->search(),
    'summaryText' => '',
    'itemView'=>'_post',   // refers to the partial view named '_post'
    'sortableAttributes'=>array(
    ),
));
?>