<?php
/* @var $this ToDoController */

$this->breadcrumbs=array(
    'My Folders',
);
?>
<h1>All My Folders</h1>
<p>Listing of all my folders</p>
<ul>
    <?php foreach($folders as $folder => $value){
        $url = $this->createUrl("/files/folder",['name'=>$folder]);
        $count = Files::model()->getFilesCountByFolder($folder);
        echo "<li><a href='$url'>" . $value . " ( $count )</a></li>";
    }?>
</ul>