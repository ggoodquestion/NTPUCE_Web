<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>北大創創 - Q&A</title>
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
                <br/>
                <h2><?php get_eng_info("title1", "常見問題") ?> Q&amp;A</h2>
                <h3>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-primary" aria-current="true">Q:<?php get_eng_QA(0, "Q", "如何申請進駐，可以透過哪些管道及申請資格?") ?></li>
                        <li class="list-group-item"> A:<?php get_eng_QA(0, "A", "每年本中心會舉辦「創新創業提案競賽」，報名團隊中須有至少一位為北大在校生，獲得名次及佳作可獲得進駐資格。") ?></li>
                    </ul>
                    <br />
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-primary" aria-current="true">Q:<?php get_eng_QA(1, "Q", "若要參加其他創業比賽，創新創業中心可以提供什麼幫助？") ?></li>
                        <li class="list-group-item">A:<?php get_eng_QA(1, "A", "繳交完整企劃書並提出相關資料佐證，將請業師給予專業評估提供建議。") ?></li>
                    </ul>
                </h3>
                <br/>
                <h2><?php get_eng_info("title2", "企劃書相關問題") ?></h2>
                <h3>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-primary" aria-current="true">Q:<?php get_eng_QA(2, "Q", "我的產品還未在市場上銷售，要如何表達財務規劃？") ?></li>
                        <li class="list-group-item">A:<?php get_eng_QA(2, "A", "可就市場介紹類似產品銷售狀況，及創新產品的未來願景等評估財務狀況。") ?></li>
                    </ul>
                </h3>
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
function get_eng_info($item, $zh){
    if(isEng()){
        global $json;
        $info = $json['QA'][$item];
        echo $info;
        
    }else{
        echo $zh;
    }
}

function get_eng_QA($index, $item, $zh){
    if(isEng()){
        global $json;
        $QA = $json['QA']['QA'];
        echo $QA[$index][$item];
        
    }else{
        echo $zh;
    }
}
?>

</html>