<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>北大創創 - 場地租借</title>
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
    <style>
        .value {
            color: #888888;
            text-transform: none;
        }
    </style>
    <!-- Wrapper -->
    <div id="wrapper" class="fade-in">

        <?php include("../templates/navbar.php"); ?>
        <?php
        include("../editor/connect.php");

        $id = $_GET['id'];
        $sql = "SELECT * FROM regulation WHERE id = '$id';";
        $result = mysql_query($sql);
        if (!$result) exit(mysql_error($link));
        $row = mysql_fetch_row($result)
        ?>
        <!-- Main -->
        <div id="main" align="center" style="padding-bottom: 4rem;">
            <h3>相關法規</h3>
            <div class="container">
                <div class="row">
                    <h4 class="col-5" align="right">標題</h4>
                    <h4 class="col value" align="left"><?php echo $row[1] ?></h4>
                </div>
                <div class="row">
                    <h4 class="col-5" align="right">內容</h4>
                    <h4 class="col value" align="left"><?php echo $row[2] ?></h4>
                </div>
                <div class="row">
                    <h4 class="col-5" align="right">檔案下載</h4>
                    <h4 class="col value" align="left"><a href="download.php?fn=<?php echo $row[3] ?>" id="download"><?php echo $row[3] ?></a></h4>
                </div>
                <div class="row">
                    <h4 class="col-5" align="right">張貼人</h4>
                    <h4 class="col value" align="left"><?php echo $row[4] ?></h4>
                </div>
                <div class="row">
                    <h4 class="col-5" align="right">發布時間</h4>
                    <h4 class="col value" align="left"><?php echo $row[5] ?></h4>
                </div>
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

<?php
function get_eng_borrow($index, $zh)
{
    if (isEng()) {
        global $json;
        $borrow = $json['space']['borrow'];
        echo $borrow[$index];
    } else {
        echo $zh;
    }
}
?>

</html>