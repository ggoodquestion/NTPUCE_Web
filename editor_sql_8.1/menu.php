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
    <noscript>
        <link rel="stylesheet" href="../assets/css/noscript.css" />
    </noscript>
</head>


<style type="text/css">
    body {
        background-color: rgba(0, 0, 0, 0.5);
    }

    .align-right {
        align-items: right;
        align-content: right;
    }

    .align-right {
        align-items: left;
        align-content: left;
    }

    .nav{
        background-color: #ffffff;
    }
</style>

<body>
    <?php
    include './connect.php';
    ?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/wbkj23gf0n88u14j6ykey1plgboqczi88rjg48ocsm4wqgtg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Wrapper -->
    <div id="wrapper" class="">

        <!-- Main -->
        <div id="main" class="align-center">
            <div class="container-fluid">
                <div class="row">
                    <div class="col my-5 me-5 align-left">
                        <ul class="list-group nav">
                            <a class="btn" href="./menu.php?usage=article" style="border-bottom: 1px solid #000000"><li class="list-group-item">文章編輯</li></a>
                            <a class="btn" href="./menu.php?usage=banner"><li class="list-group-item">首頁Banner</li></a>
                        </ul>
                    </div>
                    <div class="col-9 ms-1 align-right">
                        <?php
                        if (isset($_GET['usage'])) {
                            $usage = $_GET['usage'];
                            switch ($usage) {
                                case "banner":
                                    include("banner.php");
                                    break;
                                case "article":
                                    include("postList.php");
                                    break;
                            }
                        } else {
                            include("postList.php");
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
</body>

</html>