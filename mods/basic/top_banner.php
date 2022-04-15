<?php
include $_SERVER['DOCUMENT_ROOT'] . "/mods/utils.php";
 $link = sql_connect();
 $sql = "SELECT * FROM class INNER JOIN mods ON mods.id=class.mods AND mods.name='contact'";
 $result = sql_query($link, $sql);
 $row = sql_fetch($result);
?>

<div id="top">
    <div class="px-1 pt-1">
        <a><img src="/images/logo-3.png" class="image fit" style="margin-bottom:0 !important"></a>
        <div>
            <ul id="ul-top" align="right">
                <li><a>English</a></li>
                <li><a href="<?php echo '/mods/basic/content.php?class=' . $row[0]; ?>">聯絡我們</a></li>
                <li><a href="https://new.ntpu.edu.tw/" target="_blank">臺北大學</a></li>
            </ul>
        </div>
    </div>
</div>
<?php
sql_disconnect($link);
?>