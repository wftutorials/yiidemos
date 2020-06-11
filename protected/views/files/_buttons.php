<div>

    <div style="float:left;">
        <form id="filter" action="<?php echo Yii::app()->request->url;?>" method="get">
            Filter: <input type="text" name="search" placeholder="Search files"/>
            <button type="submit">Search</button>
            <button id="clear-filter">Clear</button>
        </form>
    </div>

    <span>Move to folder:</span>
    <?php echo CHtml::dropDownList('folders','', Files::model()->getFolders());?>
    &nbsp;
    <button id="delete-tasks">Delete Files</button>&nbsp;

</div>