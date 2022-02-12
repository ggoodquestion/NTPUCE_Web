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

    <!-- Wrapper -->
    <div id="wrapper" class="fade-in">

        <?php include("../templates/navbar.php"); ?>

        <!-- Main -->
        <div id="main" align="center" style="padding-top: 3rem; padding-bottom: 4rem;">
            <h2>相關法規</h2>
            <table class="table regulation">
                <thead>
                    <tr>
                        <th scope="col">標題</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../editor/connect.php");

                    $sql = "SELECT id, title FROM regulation WHERE enable=1;";
                    $result = mysql_query($sql);
                    if (!$result) exit(mysql_error($link));
                    while($row = mysql_fetch_row($result)){
                        $id = $row[0];
                        $title = $row[1];
                        echo "<tr><td><a href='detail.php?id=$id' class='reg-link'>$title</a></td></tr>";
                    }
                    ?>
                    
                    </tr>
                </tbody>
            </table>
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