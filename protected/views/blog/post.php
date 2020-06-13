<?php
/* @var $this BlogController */
/* @var $model Posts */

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
        <a href="#">
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