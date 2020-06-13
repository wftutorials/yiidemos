<?php
/* @var $this BlogController */
/* @var $data Posts */

 $url = $this->createUrl("/blog/post",['id'=>$data->id]);
?>
<div class="post-item">
    <div class="featured">
        <a href="<?php echo $url;?>">
            <img src="https://app.wftutorials.com/uploads/2020/06/iwc53b.jpg" width="100px">
        </a>
    </div>
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
            <a href="#">
                <?php echo $this->getIcon("ic_tag.png",'15px');?>
                <?php echo $data->category;?>
            </a>
            <a href="<?php echo $this->createUrl('/blog/postedit',['id'=>$data->id]);?>">
                <?php echo $this->getIcon("ic_pencil.png",'15px');?> edit</a> |
            <a class="post-like" href="javascript:void(0)" data-id="<?php echo $data->id;?>">
                <?php echo $this->getIcon("ic_like.png",'15px');?>
                like</a> |
            <a href="<?php echo $this->createUrl("/blog/postcomment",["id"=>$data->id]);?>">
                 <?php echo $this->getIcon("ic_comment.png",'15px');?>
                comment</a> |
            <a class="post-share" href="javascript:void(0);" data-share="<?php echo $data->slug;?>">
                <?php echo $this->getIcon("ic_share.png",'15px');?>
                share</a> </span>
    </div>

</div>