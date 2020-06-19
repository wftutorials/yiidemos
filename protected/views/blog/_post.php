<?php
/* @var $this BlogController */
/* @var $data Posts */

 $url = $this->createUrl("/blog/post",['id'=>$data->id]);
?>
<div class="post-item">
    <?php if($data->featuredImage):?>
    <div class="featured">
        <a href="<?php echo $url;?>">
            <img src="<?php echo $data->featuredImage;?>" width="100px">
        </a>
    </div>

    <?Php endif;?>
    <div class="post-content">
        <div style="float: right">
            <span><?php echo $this->getIcon("ic_calendar.png",'15px');?>
                <?php echo $data->postDate;?>
                </span>
            <?php if($data->author):?>
            <span><?php echo $this->getIcon("ic_user.png",'15px');?>
                <?php echo $data->author;?></span>
            <?php endif;?>
        </div>
        <h1><a href="<?php echo $url;?>"><?php echo $data->title;?></a></h1>
        <p><?php echo $data->excerpt;?></p>
        <span>
            <a href="<?php echo $this->createUrl('/blog/posts',['category'=>$data->category]);?>">
                <?php echo $this->getIcon("ic_tag.png",'15px');?>
                <?php echo $data->category;?>
            </a>
            <a href="<?php echo $this->createUrl('/blog/postedit',['id'=>$data->id]);?>">
                <?php echo $this->getIcon("ic_pencil.png",'15px');?> edit</a> |
            <a class="post-like" href="javascript:void(0)" data-id="<?php echo $data->id;?>">
                <?php echo $this->getIcon("ic_like.png",'15px');?>
                like (<?php echo $data->likes;?>)</a> |
            <a href="<?php echo $this->createUrl("/blog/postcomment",["id"=>$data->id]);?>">
                 <?php echo $this->getIcon("ic_comment.png",'15px');?>
                comment(<?php echo $data->getAllComments();?>)</a> |
            <a class="post-share" href="javascript:void(0);" data-share="<?php echo $data->slug;?>">
                <?php echo $this->getIcon("ic_share.png",'15px');?>
                share</a> </span>
    </div>

</div>