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
        <div id="main">
            <article class="post">

                <p>
                <header class="">
                    <h2><?php get_eng_borrow(0, "租借場地") ?></h2>
                </header>
                <h3 style="font-size: 1.5rem;"><?php get_eng_borrow(1, "租借場地申請流程") ?></h3>
                <h3>
                    <ol style="text-transform: none;">
                        <li><?php get_eng_borrow(2, "下載場地租借表(") ?><a href="../doc/20210923.pdf" download="20210923.pdf" target="_blank" class="file"><?php get_eng_borrow(6, "場地租借檔案") ?></a>）</li>
                        <li><?php get_eng_borrow(3, "於七日前填妥表單資料，及申請人前銘記使用單位蓋章") ?></li>
                        <li><?php get_eng_borrow(4, "繳交申請表至臺北大學創新創業中心") ?></li>
                        <li><?php get_eng_borrow(5, "經審核後通知租借場地是否成功") ?></li>
                    </ol>
                </h3>
                </p>
                <br />
                <a href="../doc/20190320.pdf" download="創新創業中心管理辦法20190320.pdf" target="_blank">本中心管理辦法</a>
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

<?php
function get_eng_borrow($index, $zh){
    if(isEng()){
        global $json;
        $borrow = $json['space']['borrow'];
        echo $borrow[$index];
        
    }else{
        echo $zh;
    }
}
?>

</html>