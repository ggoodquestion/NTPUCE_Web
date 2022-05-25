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
    <link href="/bootstrap-5.1.0-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="stylesheet" href="/assets/css/common.css" />
    <link rel="icon" href="/images/icon.jpg" type="image/x-icon" />
    <noscript>
        <link rel="stylesheet" href="/assets/css/noscript.css" />
    </noscript>
</head>

<?php //include "./editor/connect.php"; 
?>

<body class="">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <style>
        hr {
            border-bottom-color: #555555 !important;
            margin: 0.3rem 0 !important;
            border-bottom: 0rem !important;
        }

        .topic-btn {
            text-align: center;
        }

        .card {
            border: 1px solid #b5b5b5 !important;
        }

        .card-body {
            line-height: 1.25rem;
        }

        .poster>.row>* {
            padding: 0 0.75rem 0 0.75rem;
        }

        .modal-backdrop{
            z-index: 0;
        }
    </style>

    </style>

    <!-- Wrapper -->
    <div id="wrapper" class="fade-in">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/mods/basic/top_banner.php"; ?>

        <?php include $_SERVER['DOCUMENT_ROOT'] . "/mods/basic/navbar.php"; ?>

        <!-- Main -->
        <div id="main">

            <!-- Block the area in 3:6:3 -->
            <section id="main-infomation" style="padding-top: 1rem">
                <div class="container-fluid">
                    <!-- Generate topic button -->
                    <div class="row m-0">
                        <?php
                        $topic = $_GET['topic'];
                        $link = sql_connect();

                        if (!isset($_GET['topic'])) { // If topic is empty then find the latest topic
                            $sql = "SELECT * FROM ga_topic ORDER BY id DESC;";
                            $res = sql_query($link, $sql);
                            $row = sql_fetch($res);
                            $topic = $row['id'];
                            $cur_topic_name = $row['name'];
                        } else { // Get name by id
                            $sql = "SELECT name FROM ga_topic WHERE id=$topic;";
                            $res = sql_query($link, $sql);
                            $row = sql_fetch($res);
                            $cur_topic_name = $row['name'];
                        }
                        ?>
                        <form class="mx-0 px-md-5" method="get" action="/mods/gallery/index.php">
                            <div class="input-group input-group-sm px-md-5">
                                <select class="form-select" name="topic" id="topi-sel">
                                    <option value="<?php echo $topic; ?>">- 選擇活動 -</option>
                                    <?php
                                    $sql = "SELECT * FROM ga_topic ORDER BY id DESC;";
                                    $res = sql_query($link, $sql);

                                    while ($row = sql_fetch($res)) {
                                        $topic_name = $row['name'];
                                        $topic_id = $row['id'];
                                        echo "<option value='$topic_id'>$topic_name</option>";
                                    }

                                    ?>
                                </select>
                                <input type="submit" value="送出">
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="row m-0">
                        <?php
                        echo "<h2 align='center'>$cur_topic_name</h2>";
                        ?>
                        <div class="container p-0 poster">
                            <div class=" row row-cols-1 row-cols-md-2 row-cols-lg-3 m-0">
                                <?php
                                $sql = "SELECT * FROM ga_item WHERE topic=$topic;";
                                $res = sql_query($link, $sql);
                                while ($row = sql_fetch($res)) {
                                ?>
                                    <div classs="col">
                                        <div class="card mb-2 mb-md-3">
                                            <a data-bs-toggle="modal" data-bs-target="#poster-display"><img class="card-img-top poster-img" src="<?php echo $row['cover']; ?>"></a>
                                            <div class="card-body">
                                                <?php
                                                if($row['href'] != ""){
                                                ?>
                                               <h4 align="center" class="card-title"> <a href="<?php echo $row['href'] ?>"><?php echo $row['title']; ?></a></h4>
                                                <?php
                                                }else echo "<h4 align='center' class='card-title'>".$row['title']."</h4>";
                                                ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- 點選圖片放大的頁面 -->
        <div class="modal" id="poster-display" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img id="modal-show" class="img-fluid d-block w-100">
                    </div>
                </div>
            </div>
        </div>

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/mods/basic/footer.php'; ?>
        <!-- Scripts -->
        <script src="/bootstrap-5.1.0-dist/js/popper.min.js"></script>
        <script src="/bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/jquery.scrollex.min.js"></script>
        <script src="/assets/js/jquery.scrolly.min.js"></script>
        <script src="/assets/js/browser.min.js"></script>
        <script src="/assets/js/breakpoints.min.js"></script>
        <script src="/assets/js/util.js"></script>
        <script src="/assets/js/main.js"></script>
        <script src="/assets/js/common.js"></script>
        <script>
            // $("#content").find("img").each(function() {
            //     $(this).addClass("img-fluid");
            // });

            $(".poster-img").click(function() {
                src = $(this).attr("src");
                $("#modal-show").attr("src", src);
            })
        </script>

</body>

</html>