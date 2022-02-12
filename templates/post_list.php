<?php
include 'pagination.php';
//This file use Bootstrap 5 for dependency
function listPostForOnePage($pageName, $postList, $totalPage, $currentPage, $main_url, $paramName) //Generate 6 articles for a page
{
?>
    <article class="post">
        <header id="about">
            <h2><?php echo $pageName; ?></h2>
        </header>

        <!-- Control and generate article and pagination -->
        <div class="container-fluid">
            <?php
            $cut_text_len = 50;
            $num_in_row = 0;
            foreach ($postList as $post) {
                $post = json_decode($post, true);
                if ($num_in_row == 0) {
                    echo '<div class="row">';
                }
                $num_in_row++;
                $title = $post[1];
                $id = $post[0];
                $content = $post[2];
                $date = explode(" ", $post[4]);
                $cover = $post[7];
                if (mb_strlen($content) > $cut_text_len) {
                    $content = mb_substr($content, 0, $cut_text_len, "utf-8") . "...";
                }
                if (empty($cover)) {
                    $cover = "../images/bg.jpg";
                }
                echo '<div class="col-lg-4">';
                createPostSurveyView($title, $content, $date[0], "../post/article.php?id=$id", $cover);
                echo '</div>';

                $num_in_row %= 3;
                if ($num_in_row == 0) {
                    echo '</div><br/>';
                }
            }
            if ($num_in_row != 0) {
                echo '</div>';
            }
            ?>
        </div>
        <div align="center">
            <?php generatePagination($totalPage, $currentPage, $main_url, $paramName); ?>
        </div>
    </article>
<?php
}

function createPostSurveyView($title, $content, $timestamp, $link = '', $cover = '')
{
?>
    <div class="card border-secondary mx-2">
        <a href="<?php echo $link; ?>" class="image fit" style="border-bottom: 0; margin-bottom:0rem;"><img src="<?php echo $cover; ?>" class="card-img-top" alt="Reload..."></a>
        <div class="card-body">
            <h3 class="card-title mb-1"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h3>
            <h5 class="card-text"><?php echo $content; ?></h5>
            <h6 class="card-text text text-secondary align-right"><?php echo $timestamp; ?></h6>
        </div>
    </div>

<?php
}
function createPostSurveyViewForHome($title, $content, $timestamp, $link = '', $cover = '')
{
?>
    <div class="card border-secondary mx-2">
        <a href="<?php echo $link; ?>" class="image fit" style="border-bottom: 0; margin-bottom:0rem;"><img src="<?php echo $cover; ?>" class="card-img-top" alt="Reload..."></a>
        <div class="card-body home-card">
            <h3 class="card-title main-title mb-1"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h3>
            <h5 class="card-text main-content"><?php echo $content; ?></h5>
            <h6 class="card-text text text-secondary align-right main-date"><?php echo $timestamp; ?></h6>
        </div>
    </div>
<?php
}
?>