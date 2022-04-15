<?php
$link = sql_connect();

$sql = "SELECT * FROM class INNER JOIN mods ON mods.id=class.mods AND mods.name='info_eng';";
$result = sql_query($link, $sql);
?>

<div class="left-top">
    <div class="alert alert-light topic" role="alert">
        <div>
            訊息公告
        </div>
    </div>
    <ul class="list-group list-group-flush">
        <?php
        while($row = sql_fetch($result)){
            $cid = $row[0];
            $title = $row['title'];
            echo "<li class='list-group-item'><a href='/eng/mods/basic/content.php?class=$cid'>$title</a></li>";
        }
        ?>
    </ul>
    <?php
    sql_disconnect($link);
    ?>
</div>