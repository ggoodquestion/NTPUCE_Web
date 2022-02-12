<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>北大創創 - 服務項目</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link href="../bootstrap-5.1.0-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="../assets/css/common.css" />
    <noscript>
        <link rel="stylesheet" href="../assets/css/noscript.css" />
    </noscript>
</head>

<style>
    .title {
        text-align: center;
        color: #4472c4;
    }

    .title>img {
        height: 1.4rem;
        padding-right: 0.5rem;
    }

    .s-item {
        padding: 0.5rem 10vw;
    }

    p {
        font-size: 1.2rem;
    }

    .s-item > p, li{
        text-transform: none;
    }
</style>

<body class="">

    <!-- Wrapper -->
    <div id="wrapper" class="fade-in">

        <?php include("../templates/navbar.php"); ?>

        <!-- Main -->
        <div id="main">
            <header style="margin-bottom: 0rem;">
                <h1><?php get_eng_title("服務項目") ?></h1>
            </header>

            <article class="post">
                <h2 class="title"><img src="../images/service_icon.svg">1.<?php get_eng_content('title', 0, "專業諮詢服務") ?></h2>
                <h3>
                    <div class="s-item">
                        <p>
                            <?php get_eng_content('content', 0, "國立臺北大學創新創業中心致力於提供最完整、專業的輔導資源，
                            期望能幫助有創業夢或正走在創業路上的你！參加創業團隊甄選，
                            評比入選後，你可以擁有以下的輔導資源：") ?>
                            
                        </p>
                        <ol>
                            <li><?php get_eng_item(0, 0, "業師輔導制度。") ?></li>
                            <li><?php get_eng_item(0, 1, "各領域專家諮詢。") ?></li>
                            <li><?php get_eng_item(0, 2, "提供法務、會計及智慧財產權等諮詢服務。") ?></li>
                            <li><?php get_eng_item(0, 3, "舉辦專業訓練課程與專題演講、工作坊") ?></li>
                        </ol>
                    </div>
                </h3>
                <br />
                <h2 class="title"><img src="../images/service_icon.svg">2.<?php get_eng_content('title', 1, "行政輔導") ?></h2>
                <h3>
                    <div class="s-item">
                        <p>
                            <?php get_eng_content('content', 1, "幫助團隊成立公司的行政流程") ?>
                        </p>
                        <ol>
                            <li><?php get_eng_item(1, 0, "免費會議室與討論空間、硬體設備租借、免費有線無線網路(須遵守校園網路使用規範)。") ?></li>
                            <li><?php get_eng_item(1, 1, "協助新創公司設立或營業登記。") ?></li>
                            <li><?php get_eng_item(1, 2, "協助申請政府科技研發相關計畫。") ?></li>
                            <li><?php get_eng_item(1, 3, "輔導營運計畫書之撰寫。") ?></li>
                        </ol>
                    </div>
                </h3>
                <br />
                <h2 class="title"><img src="../images/service_icon.svg">3.<?php get_eng_content('title', 2, "活動辦理") ?></h2>
                <h3>
                    <div class="s-item">
                        <p>
                            <?php get_eng_content('content', 2, "辦理活動，申請合作與補助") ?>
                        </p>
                        <ol>
                            <li><?php get_eng_item(2, 0, "舉辦創新創業講座。") ?></li>
                            <li><?php get_eng_item(2, 1, "舉辦創新創業人才交流聚會。") ?></li>
                            <li><?php get_eng_item(2, 2, "團隊交流會。") ?></li>
                            <li><?php get_eng_item(2, 3, "畢業學長姐創業歷程分享。") ?></li>
                            <li><?php get_eng_item(2, 4, "邀集團隊參與各式園區或校園發表會。") ?></li>
                        </ol>
                    </div>
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

function get_eng_title($zh){
    if(isEng()){
        global $json;
        $service = $json['service'];
        echo $service['title'];
        
    }else{
        echo $zh;
    }
}

function get_eng_content($item, $index, $zh){
    if(isEng()){
        global $json;
        $service = $json['service']['content'];
        echo $service[$index][$item];
        
    }else{
        echo $zh;
    }
}
function get_eng_item($index1, $index2, $zh){
    if(isEng()){
        global $json;
        $service = $json['service']['content'];
        echo $service[$index1]['item'][$index2];
        
    }else{
        echo $zh;
    }
}
?>

</html>