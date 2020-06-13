<?php
/* @var $this BlogController */
/* @var $model Posts */

$this->breadcrumbs=array(
    'Create a Post',
);
?>
<h1>Start writing a post</h1>
<p>Create a new post</p>
<?php $this->renderPartial("_form",['model'=>$model]);