<?php
/* @var $this BlogController */
/* @var $model PostComment */
/* @var $post Posts */

$this->breadcrumbs=array(
        "Posts" => $this->createUrl('/blog/posts'),
        $post->title => $this->createUrl('/blog/post',['id'=>$post->id]),
    'Add a comment',
);
?>
    <h1>Add a comment [ <?php echo $post->title;?>]</h1>
    <p>Add a comment</p>
    <?php $this->renderPartial('_comment',['model'=>$model,'post'=>$post]);?>