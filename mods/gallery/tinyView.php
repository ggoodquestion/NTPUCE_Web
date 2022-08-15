<style>
    .gallery {
        background-color: #f5f5f5;
    }
</style>

<?php
$link = sql_connect();
$sql = "SELECT id FROM mods WHERE name='topic_banner';";
$result = sql_query($link, $sql);
$row = sql_fetch($result);
$mid = $row['id'];

$sql = "SELECT COUNT(*) as total FROM carousel WHERE mods='$mid' AND enable=1;";
$result = sql_query($link, $sql);
$row = sql_fetch($result);
$total = $row['total'];

$sql = "SELECT * FROM carousel WHERE mods='$mid'  AND enable=1;";
$result = sql_query($link, $sql);
?>

<div class="gallery p-0 p-md-2">
    <h6 align="center" class="mb-1"><a href="<?php echo ROOT; ?>/mods/gallery/" style="color: #2a6aa8;">歷屆專題成果</a></h6>
    <div id="carouselGallery" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators" style="margin-bottom:0rem;">
            <?php
            for ($i = 0; $i < $total; $i++) {
                if ($i == 0) echo '<a data-bs-target="#carouselGallery" data-bs-slide-to="' . $i . '" class="active" aria-current="true"></a>';
                else echo '<a  data-bs-target="#carouselGallery" data-bs-slide-to="' . $i . '"></a>';
            }
            ?>
        </div>
        <div class="carousel-inner">
            <?php
            $count = 0;
            while ($row = sql_fetch($result)) {
                if ($count == 0) echo '<div class="carousel-item active">';
                else echo '<div class="carousel-item">';

                if ($row['href'] == '') echo '<img src="'. ROOT . $row['url'] . '" alt="..." class="d-block w-100">';
                else echo '<a href="'.ROOT . $row['href'] . '"><img src="'.ROOT . $row['url'] . '" alt="..." class="d-block w-100"></a>';

                echo '</div>';
                $count++;
            }
            sql_disconnect($link);
            ?>
        </div>
        <a class="carousel-control-prev" type="button" data-bs-target="#carouselGallery" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" type="button" data-bs-target="#carouselGallery" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
</div>