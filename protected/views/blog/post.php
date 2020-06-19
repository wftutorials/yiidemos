<?php
/* @var $this BlogController */
/* @var $model Posts */
/* @var $comment PostComment */

$this->breadcrumbs=array(
        'Posts' => $this->createUrl("/blog/posts"),
    $model->title,
);
?>
<?php $this->getFlashMessage();?>
    <h1><?php echo $model->title;?></h1>
    <p><?php echo $model->excerpt;?></p>
    <p>
        <a href="#"><?php echo $this->getIcon("ic_like.png","15px");?>&nbsp;like</a>
        |
        <a href="<?php echo $this->createUrl('/blog/postedit',['id'=>$model->id]);?>">
            <?php echo $this->getIcon("ic_pencil.png","15px");?>edit</a>
        |
        <a href="<?php echo $this->createUrl('/blog/postcomment',['id'=>$model->id]);?>">
            <?php echo $this->getIcon("ic_comment.png","15px");?>&nbsp;comment
        </a>
        |
        <a href="#">
            <?php echo $this->getIcon("ic_share.png","15px");?>&nbsp;
            share</a>


        <br>
        <span><strong>Created On: </strong><?php echo $model->getPostDate();?> |
        <strong>Author</strong>: <?php echo $model->author;?>
        </span>
    </p>

    <div class="post-layout">

        <?php if($model->featuredImage):?>
        <div class="post-layout-featured">
            <img src="<?php echo $model->featuredImage;?>" width="100%"/>
        </div>
        <?php endif;?>

        <div class="post-layout-content">
            <span><?php echo nl2br($model->content);?></span>
        </div>

    </div>
    <br><br>
    <hr>
    <h5>Comments (<?php echo $model->getAllComments();?>)</h5>

<?php

$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$comment->commentsbyId($model->id),
    'summaryText' => '',
    'itemView'=>'comment_view',   // refers to the partial view named '_post'
    'sortableAttributes'=>array(
    ),
));
?>