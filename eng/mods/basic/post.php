<?php
define('ROOT', '../../..');

?>
<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>臺北大學通訊工程學系</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link href="<?php echo ROOT; ?>/bootstrap-5.1.0-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/css/article.css" />
    <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/css/common.css" />
    <link rel="icon" href="<?php echo ROOT; ?>/images/icon.jpg" type="image/x-icon" />
    <noscript>
        <link rel="stylesheet" href="<?php echo ROOT; ?>/assets/css/noscript.css" />
    </noscript>
</head>

<?php //include "./editor/connect.php"; 
?>

<body class="">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <style>
        .left-top {
            font-size: 0.85rem;
            padding: 0.2rem 0.25rem;
            margin-bottom: 1rem;
            background-color: #f5f5f5;
        }

        .left-top>ul>li {
            background-color: inherit;
            padding: 0.2rem 0.5rem;
            font-size: 0.6rem;
        }

        .topic {
            padding: 0rem 0.25rem;
            margin: 0.2rem 0.2rem 0.1rem 0.2rem;
        }

        a {
            color: #3b7bb9;
            text-decoration: none !important;
        }

        #content {
            padding: 0 0rem 0 0rem;
        }

        #content * {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 0.5rem;
            line-height: 1.5rem;
            vertical-align: middle;
        }

        #content td {
            border: inherit;
        }

        hr {
            border-bottom-color: #555555 !important;
            margin: 0.3rem 0 !important;
            border-bottom: 0rem !important;
        }

        .s-txt {
            font-size: 0.6rem !important;
        }
    </style>

    </style>

    <!-- Wrapper -->
    <div id="wrapper" class="fade-in">
        <?php include ROOT . "/eng/mods/basic/top_banner.php"; ?>

        <?php include ROOT . "/eng/mods/basic/navbar.php"; ?>

        <!-- Main -->
        <div id="main">

            <!-- Block the area in 3:6:3 -->
            <section id="main-infomation" style="padding-top: 1rem">
                <div class="container-fluid">
                    <div class="row m-0">
                        <!-- Left -->
                        <div class="col-sm-12 col-md-3 px-md-1 px-0">
                            <?php include ROOT . '/eng/mods/basic/board.php'; ?>
                            <?php include ROOT . '/eng/mods/basic/intro.php'; ?>

                        </div>
                        <!-- Middle -->
                        <div class="col-sm-12 col-md-9 pe-md-1 ps-md-3 px-0">
                            <?php
                            $link = sql_connect();
                            $target = $_GET['id'];
                            $sql = "SELECT * FROM post WHERE id=$target AND enable=1;";
                            $res = sql_query($link, $sql);
                            $row = sql_fetch($res);

                            if ($row['href'] == '') {
                                echo '<h3 class="title">' . $row['title'] . '</h3><hr/>';
                            ?>
                                <div id="content" class="mt-4">
                                    <?php
                                    // echo '<div id="post">';
                                    include ROOT . "/editor/doc/" . $row["content"] . ".php";
                                    // echo '</div>';
                                    sql_disconnect($link);
                                    ?>
                                </div>
                            <?php
                            } else {
                                $href = $row['href'];
                                echo "<script>window.location.href = '$href';</script>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include ROOT . '/eng/mods/basic/footer.php'; ?>
        <!-- Scripts -->
        <script src="<?php echo ROOT; ?>/bootstrap-5.1.0-dist/js/popper.min.js"></script>
        <script src="<?php echo ROOT; ?>/bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
        <script src="<?php echo ROOT; ?>/assets/js/jquery.min.js"></script>
        <script src="<?php echo ROOT; ?>/assets/js/jquery.scrollex.min.js"></script>
        <script src="<?php echo ROOT; ?>/assets/js/jquery.scrolly.min.js"></script>
        <script src="<?php echo ROOT; ?>/assets/js/browser.min.js"></script>
        <script src="<?php echo ROOT; ?>/assets/js/breakpoints.min.js"></script>
        <script src="<?php echo ROOT; ?>/assets/js/util.js"></script>
        <script src="<?php echo ROOT; ?>/assets/js/main.js"></script>
        <script src="<?php echo ROOT; ?>/assets/js/common.js"></script>
        <script>
            $("#content").find("img").each(function() {
                $(this).addClass("img-fluid");
            });
        </script>

</body>

<?php

// function get_eng_index($item, $zh){
//     if(isEng()){
//         global $json;
//         $index = $json['index'];
//         echo $index[$item];

//     }else{
//         echo $zh;
//     }
// }

?>

</html>