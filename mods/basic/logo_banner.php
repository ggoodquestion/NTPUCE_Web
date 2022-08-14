<?php
$link = sql_connect();
$sql = "SELECT id FROM mods WHERE name='home_banner';";
$result = sql_query($link, $sql);
$row = sql_fetch($result);
$mid = $row['id'];

$sql = "SELECT * FROM carousel WHERE mods='$mid' AND enable=1;";
$result = sql_query($link, $sql);
?>
<div id="carouselBanner" class="carousel slide" data-bs-ride="carousel" style="padding: 0rem">
    <div class="carousel-inner">
        <?php
        $count = 0;
        while ($row = sql_fetch($result)) {
            if($count == 0) echo '<div class="carousel-item active">';
            else '<div class="carousel-item">';

            if ($row['href'] == '') echo '<img src=".' . $row['url'] . '" class="image fit" alt="..." style="margin-bottom:0 !important; height:100%">';
            else echo '<a href="'.$row['href'].'"><img src="' . $row['url'] . '" class="image fit" alt="..." style="margin-bottom:0 !important; height:100%"></a>';
            
            echo '</div>';
            $count++;
        }
        sql_disconnect($link);
        ?>   
    </div>
    <a class="carousel-control-prev" data-bs-target="#carouselIndicators" data-bs-slide="prev" role="button" id="carousel-prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" data-bs-target="#carouselIndicators" data-bs-slide="next" role="button" id="carousel-next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>