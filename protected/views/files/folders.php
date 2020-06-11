<?php
/* @var $this ToDoController */

$this->breadcrumbs=array(
    'Files',
);
?>
<h1>All My Folders</h1>
<p>Listing of all my folders</p>
<ul>
    <?php foreach($folders as $folder => $value){
        $url = $this->createUrl("/files/folder",['name'=>$folder]);
        echo "<li><a href='$url'>" . $value . "</a></li>";
    }?>
</ul>