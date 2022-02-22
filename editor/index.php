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
    .menu-option{
        background-color: #000f1f;
        padding-left: 0; 
        padding-right: 0; 
        margin-top:0;
        height: 100vh;
        overflow: auto;
    }

    .nav,
    .list-group-item{
        background-color: #000f1f;
        color:#ffffff;
        font-size: 1.25rem;
    }

    .optArea{
        height: 100vh;
        overflow: auto;
    }

    .choose{
        background-color: #ebf5ff;
        color: #000000;
        width: cover;
    }
</style>

<body>
    <?php
    include 'utils.php';
    include 'admin_check.php';
    ?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/wbkj23gf0n88u14j6ykey1plgboqczi88rjg48ocsm4wqgtg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- Main -->
    <div id="main" class="align-center">
        <div class="container-fluid">
            <div class="row" >
                <div class="col  align-left menu-option">
                    <div class="list-group mt-4 nav">
                        <a class="list-group-item" href="./index.php?usage=nav" id="nav_item">導覽列</a>
                        <!-- <a class="list-group-item" href="./index.php?usage=banner" id="banner">首頁Banner</a>
                        <a class="list-group-item" href="./index.php?usage=project" id="project">相關資源</a> -->
                    </div>
                </div>
                <div class="col-10 ms-4 align-right optArea">
                    <div>
                    <?php
                    if (isset($_GET['usage'])) {
                        $usage = $_GET['usage'];
                        switch ($usage) {
                            case "nav":
                                include("./nav_item/index.php");
                                break;
                        }
                    } else {
                        include("./nav_item/index.php");
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
        var choose = "#nav_item";
        for(let pair of params.entries()){
            if(pair[0] === "usage"){
                choose = "#" + pair[1];
            }
        }
        $(choose).addClass("choose");
    </script>
</body>

</html>