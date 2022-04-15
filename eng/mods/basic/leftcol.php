<div class="list-group list-group-flush left-col">

    <!-- <header id="header">
    <a href="/index.php" class="logo"><img src="/images/banner_logo.png" class="logo-banner"></a>
</header> -->

    <?php

    // include $_SERVER['DOCUMENT_ROOT'] . "/mods/utils.php";
    $link = sql_connect();
    $sql = "SELECT * FROM class INNER JOIN mods ON mods.id = class.mods AND mods.name='lfcol_eng' ;";
    $result = sql_query($link, $sql);
    while ($row = sql_fetch($result)) {
        echo '<a href="/eng/mods/basic/content.php?class=' . $row[0] . '" class="list-group-item list-group-item-action">' . $row['title'] . '</a>';
    }
    sql_disconnect($link);
    ?>

</div>