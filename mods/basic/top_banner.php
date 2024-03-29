<?php
include ROOT . "/mods/utils.php";

$link = sql_connect();
$sql = "SELECT class.id, class.title FROM class INNER JOIN mods ON mods.id=class.mods AND mods.name='contact'";
$result = sql_query($link, $sql);
$row = sql_fetch($result);
?>

<div id="top">
    <div class="px-1 pt-1">
        <a><img src="<?php echo ROOT ?>/images/logo-3.png" class="image fit" style="margin-bottom:0 !important"></a>
        <div>
            <ul id="ul-top" align="right">
                <li><a href="<?php echo ROOT ?>/eng/">English</a></li>
                <li><a href="<?php echo ROOT . '/mods/basic/content.php?class=' . $row[0]; ?>">聯絡我們</a></li>
                <li><a href="https://new.ntpu.edu.tw/" target="_blank">臺北大學</a></li>
            </ul>
        </div>
    </div>
</div>
<?php
sql_disconnect($link);
?>