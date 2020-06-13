<?php
/* @var $this BlogController */
/* @var $model Posts */

$this->breadcrumbs=array(
    $model->title => $this->createUrl('/blog/post',['id'=>$model->id]),
    'edit',
);
?>
    <h1>Edit this post - # <?php echo $model->id;?></h1>
    <p>Edit this post</p>
<?php $this->renderPartial("_form",['model'=>$model]);