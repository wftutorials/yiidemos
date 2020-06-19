<div style="border: 1px solid #ccc; padding:5px; margin-bottom: 10px">
    <span><?php echo $data->comment;?></span>
    <?Php if($data->user):?>
        <span style="float: right;">
            <?php echo $this->getIcon("ic_user.png","15px");?>&nbsp;<?php echo $data->user;?>
        </span>
    <?php endif;?>
</div>