<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>北大創創 - 相關資源</title>
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
        <div id="main">
            <article class="post">
                <header>
                    <h2>相關資源</h2>
                </header>
                <div class="container-fluid">
                    <?php
                    include("../editor/connect.php");
                    $sql = "SELECT * FROM project;";
                    $result = mysql_query($sql);
                    if (!$result) exit(mysql_error($link));
                    $col_num = 0;
                    while($row = mysql_fetch_row($result)){
                        if($col_num == 0) echo '<div class="row justify-content-evenly">';
                        $title = $row[1];
                        $cover = $row[2];
                        $href = $row[3];

                        ?>
                        <a href="<?php echo $href; ?>" class="col-sm-12 my-3 square text" style="background-image:linear-gradient(to top, rgba(5, 5, 5, 0.2), transparent 80%), url('<?php echo $cover ?>');" target="_blank"><?php //echo $title; ?></a>
                        <?php

                        
                        $col_num = ($col_num+1) % 3;
                        if($col_num == 0) echo '</div>';
                    }
                    if($col_num != 0) echo '</div>';
                    ?>

                </div>
            </article>
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