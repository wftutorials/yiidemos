<?php
/* @var $this BlogController */
/* @var $model Posts */

$this->breadcrumbs=array(
    'Recent Posts',
);
?>
    <h1><?php echo $model->title;?></h1>
    <p><?php echo $model->excerpt;?></p>
    <p><a href="<?php echo $this->createUrl('/blog/postedit',['id'=>$model->id]);?>">Edit</a>
        | <a href="#">Delete</a><br>
        <span><strong>Created On: </strong><?php echo $model->getPostDate();?> |
        <strong>Author</strong>: <?php echo $model->author;?>
        </span>
    </p>

    <div class="post-layout">

        <div class="post-layout-featured">
            <img src="https://app.wftutorials.com/uploads/2020/06/iwc53b.jpg" width="100%"/>
        </div>

        <div class="post-layout-content">
            <span><?php echo nl2br($model->content);?></span>
        </div>

    </div>
    <br><br>
    <hr>
    <h5>Comments (5)</h5>