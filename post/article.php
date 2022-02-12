<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<?php
include "../editor/connect.php";

$id = $_GET['id'];
$sql = "SELECT * FROM article WHERE id='$id';";
$result = mysql_query($sql);
if (!$result) exit(mysql_error($link));

$row = mysql_fetch_row($result);
$title = $row[1];
$content = $row[2];
$full_content = $row[3];
$date = explode(" ", $row[4]);
$category = $row[5];
switch ($category) {
    case "activity":
        $category = "學期活動";
        break;
    case "tidbits":
        $category = "活動花絮";
        break;
    case "competition":
        $category = "競賽";
        break;
    case "notice":
        $category = "最新消息";
}

$day = $date[0];
$time = $date[1];
?>

<head>
    <title>學期活動 - <?php echo $title; ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link href="../bootstrap-5.1.0-dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../assets/css/main.css" /> -->
    <link rel="stylesheet" href="../assets/css/article.css" />
    <!-- <link rel="stylesheet" href="../assets/css/common.css" /> -->
    <noscript>
        <link rel="stylesheet" href="../assets/css/noscript.css" />
    </noscript>
</head>


<style type="text/css">
    .dp-op {
        background-color: rgba(0, 0, 0, 0.65);
        width: 160%;
    }

    .dp-op-mobile {
        background-color: #ffffff !important;
        width: auto !important;
        list-style: none;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    .post {
        margin-left: 20vw;
        margin-right: 20vw;
        padding-left: 20vw !important;
        padding-right: 20vw !important;
        padding-top: 1rem !important;
    }

    .post.article {
        display: block;
        font-size: 1rem;
    }

    .post.header {
        margin-bottom: 0px;
        padding-bottom: 1rem !important;
    }

    img {
        width: 25rem;
        height: 100%;
    }

    .title{
        margin-bottom: 0;
    }

    .date {
        font-size: 0.8rem;
        font-weight: 100;
        padding-right: 0;
        font-style: italic;
        margin: 0;
    }

    @media(max-width: 980px) {
        .nav-logo {
            display: none;
        }
    }

    @media(max-width: 768px) {
        .post {
            padding-left: 10vw !important;
            padding-right: 10vw !important;
            margin-left: 0vw !important;
            margin-right: 0vw !important;
        }

        .post.article {
            display: block;
        }

        .post.header {
            margin-bottom: 0px;
            padding: 0px;
        }

        img {
            width: 20rem;
            height: 100%;
        }

        .nav-logo {
            display: none;
        }
    }

    @media(max-width: 576px) {
        .post {
            margin-left: 1rem !important;
            margin-right: 1rem !important;
            padding-left: 5vw !important;
            padding-right: 5vw !important;
        }
        
        .post.article {
            display: block;
        }

        .post.header {
            margin-bottom: 0px;
            padding: 0px;
        }

        img {
            width: 16rem;
            height: 100%;
        }
        
        .date {
            font-size: 1rem;
            font-weight: 100;
            padding-right: 0;
            font-style: italic;
            margin: 0;
            text-align: center;
        }

        .nav-logo {
            display: none;
        }
    }
</style>

<body class="">


    <!-- Wrapper -->
    <div id="wrapper" class="fade-in">

        <?php include("../templates/navbar.php"); ?>

        <!-- Main -->
        <div id="main">
            <div class="post header">
                <h2 class="title"><?php echo $title; ?></h2>
                <h2 class="date text text-secondary" align="left"><?php echo $day; ?></h2>
            </div>
            <div class="post article" style="font-size:15rem;">
                <?php echo $full_content; ?>
            </div>
        </div>

        <?php include '../templates/footer.php'; ?>

        <!-- Scripts -->
        <script src="../bootstrap-5.1.0-dist/js/popper.min.js"></script>
        <script src="../bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/jquery.scrollex.min.js"></script>
        <script src="../assets/js/jquery.scrolly.min.js"></script>
        <script src="../assets/js/browser.min.js"></script>
        <script src="../assets/js/breakpoints.min.js"></script>
        <script src="../assets/js/util.js"></script>
        <script src="../assets/js/main.js"></script>
        <script src="../assets/js/common.js"></script>

</body>

</html>