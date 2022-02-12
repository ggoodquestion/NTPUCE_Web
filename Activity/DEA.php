<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>北大創創 - 創新創業提案競賽</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link href="../bootstrap-5.1.0-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="../assets/css/common.css" />
    <noscript>
        <link rel="stylesheet" href="../assets/css/noscript.css" />
    </noscript>
</head>

<body class="">

    <!-- Wrapper -->
    <div id="wrapper" class="fade-in">

        <?php
        include("../templates/navbar.php");
        include("../editor/connect.php");
        include("../templates/post_list.php");

        $currentPage = 1;
        $totalPage;
        $numPerPage = 6;
        if(isset($_GET['page'])) $currentPage = $_GET['page'];
        $first = ($currentPage-1) * $numPerPage;
        $last = $currentPage * $numPerPage;

        $sql = "SELECT COUNT(id) FROM article WHERE category='competition';";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
        $totalPage = ceil($row[0] / 6);

        $sql = "SELECT * FROM article WHERE category='competition' ORDER BY date desc LIMIT $first, $numPerPage;";
        $result = mysql_query($sql);
        if (!$result) exit(mysql_error($link()));

        $postList = array();
        for($i = 0; $i < 6 && $row = mysql_fetch_row($result); $i++){
            $post = json_encode($row);
            array_push($postList, $post);
        }
        ?>

        <!-- Main -->
        <div id="main">
            <?php listPostForOnePage("創新創業提案競賽", $postList, $totalPage, $currentPage, "./DEA.php", "page"); ?>
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