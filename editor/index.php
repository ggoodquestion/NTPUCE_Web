<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>後臺文章管理系統</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link href="../bootstrap-5.1.0-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="/images/icon.jpg" type="image/x-icon" />
    <noscript>
        <link rel="stylesheet" href="../assets/css/noscript.css" />
    </noscript>
</head>


<style type="text/css">
    body {
        background-color: rgba(255, 255, 255, 1);
    }

    .align-right {
        align-items: right;
        align-content: right;
    }

    .align-right {
        align-items: left;
        align-content: left;
    }

    .menu-option {
        background-color: #000f1f;
        padding-left: 0;
        padding-right: 0;
        margin-top: 0;
        height: 100vh;
        overflow: auto;
    }

    .nav,
    .list-group-item {
        background-color: #000f1f;
        color: #ffffff;
        font-size: 1.25rem;
    }

    .optArea {
        height: 100vh;
        overflow: auto;
    }

    .choose {
        background-color: #ebf5ff;
        color: #000000;
        width: cover;
    }

    .editor-list>* {
        background-color: #ffffff !important;
        color: #000000 !important;
    }

    .editor-list {
        background-color: #ffffff;
        color: #000000;
    }

    .e-mod {
        padding-left: 2.5rem;
    }
</style>

<body>
    <?php
    include 'utils.php';
    include 'admin_check.php';
    ?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/ci920ps8fuhe7xut4w689y9i3jp2azan67y82bw101pi3be4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- Main -->
    <div id="main" class="align-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col  align-left menu-option">
                    <div class="list-group mt-4 nav">
                        <span class="list-group-item">一般
                            <hr>
                        </span>
                        <a class="list-group-item e-mod" href="./index.php?usage=mod" id="mod">模組</a>
                        <a class="list-group-item e-mod" href="./index.php?usage=class" id="class">分類</a>
                        <a class="list-group-item e-mod" href="./index.php?usage=post" id="post">文章</a>
                        <a class="list-group-item e-mod" href="./index.php?usage=carousel" id="carousel">圖片輪播</a>
                        <a class="list-group-item e-mod" href="./index.php?usage=doc" id="doc">檔案</a>
                        <a class="list-group-item e-mod" href="./index.php?usage=img" id="img">圖片</a>
                        <br>
                        <span class="list-group-item">海報牆
                            <hr>
                        </span>
                        <a class="list-group-item e-mod" href="./index.php?usage=ga_topic" id="ga_topic">活動</a>
                        <a class="list-group-item e-mod" href="./index.php?usage=ga_item" id="ga_item">項目</a>
                        <br>
                        <span class="list-group-item">
                            <hr>
                            <h4><?php echo $_SESSION["user"]; ?></h4>
                            <a href="./logout.php" style="color: #f5f5f5; text-decoration: none;">登出</a>
                        </span>
                    </div>
                </div>
                <div class="col-10 ms-4 align-right optArea">
                    <div>
                        <?php
                        if (isset($_GET['usage'])) {
                            $usage = $_GET['usage'];
                            switch ($usage) {
                                case "mod":
                                    include("./mod/index.php");
                                    break;
                                case "class":
                                    include("./class/index.php");
                                    break;
                                case "post":
                                    include("./post/index.php");
                                    break;
                                case "carousel":
                                    include("./carousel/index.php");
                                    break;
                                case "doc":
                                    include("./document/index.php");
                                    break;
                                case "img":
                                    include("./img/index.php");
                                    break;
                                case "ga_topic":
                                    include("./ga_topic/index.php");
                                    break;
                                case "ga_item":
                                    include("./ga_item/index.php");
                                    break;
                            }
                        } else {
                            include("./mod/index.php");
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="../bootstrap-5.1.0-dist/js/popper.min.js"></script>
    <script src="../bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.scrollex.min.js"></script>
    <script src="../assets/js/jquery.scrolly.min.js"></script>
    <script src="../assets/js/browser.min.js"></script>
    <script src="../assets/js/breakpoints.min.js"></script>
    <script>
        var url = new URL(location.href);
        var params = url.searchParams;
        var choose = "#mod";
        for (let pair of params.entries()) {
            if (pair[0] === "usage") {
                choose = "#" + pair[1];
            }
        }
        $(choose).addClass("choose");
    </script>
</body>

</html>