<?php
include ROOT . "/mods/utils.php";
$link = sql_connect();
$sql = "SELECT * FROM class INNER JOIN mods ON mods.id=class.mods AND mods.name='contact_eng'";
$result = sql_query($link, $sql);
$row = sql_fetch($result);
?>

<div id="top">
    <div class="px-1 pt-1">
        <a><img src="<?php echo ROOT; ?>/images/logo-3.png" class="image fit" style="margin-bottom:0 !important"></a>
        <div>
            <ul id="ul-top" align="right">
                <li><a href="<?php echo ROOT; ?>/">中文</a></li>
                <li><a href="<?php echo ROOT . '/eng/mods/basic/content.php?class=' . $row[0]; ?>">Contact</a></li>
                <li><a href="https://new.ntpu.edu.tw/" target="_blank">NTPU</a></li>
            </ul>
        </div>
    </div>
</div>
<?php
sql_disconnect($link);
?>