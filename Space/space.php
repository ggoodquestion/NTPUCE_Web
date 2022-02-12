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
                <header  id="about">
                    <h2 align="center"><?php get_eng_space("title", "實體空間") ?></h2>
                    <p>
                    <h3><?php get_eng_space("intro", "本校創新創業中心於2014年係籌備處，經由2017年11月8日校務會議決議通過，2018年2月正式隸屬於「研究發展處之二級單位」，期許讓臺北大學成為一所培育創新創業人才的頂尖大學。
                        實體空間共有三個區域，分別為創創講堂、創創聚場、會議室。") ?></h3>
                    </p>
                </header>

                <div class="row">
                    <div class="card col-6 ">
                        <img src="../images/space01.png" class="card-img-top space img">
                        <div class="card-body">
                            <p class="card-text">
                            <h2><?php get_eng_room(0, "name", "創創講堂") ?></h2>
                            <p class="text text-secondary"><?php get_eng_room(0, "intro", "可容納60人，用於新創公司分享講座、舉辦工作坊等") ?></p>
                            </p>
                        </div>
                    </div>
                    <div class="card col-6 ">
                        <img src="../images/space02.png" class="card-img-top space img">
                        <div class="card-body">
                            <p class="card-text">
                            <h2><?php get_eng_room(1, "name", "創創聚場") ?></h2>
                            <p class="text text-secondary"><?php get_eng_room(1, "intro", "可容納40人，舉辦實作型工作坊，給未成形團隊更有善的討論及執行prototype的空間") ?></p>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card" style="width: 50%">
                        <img src="../images/space03.png" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">
                            <h2><?php get_eng_room(2, "name", "蘇格拉底會議室") ?></h2>
                            <p class="text text-secondary"><?php get_eng_room(2, "intro", "可容納14人，主要給正在前期發展之團隊使用") ?></p>
                            </p>
                        </div>
                    </div>
                    <div class="card" style="width: 50%">
                        <img src="../images/space04.jpg" class="card-img-top">
                        <div class="card-body">
                            <p class="card-text">
                            <h2><?php get_eng_room(3, "name", "彼得 ‧ 杜拉克會議室") ?></h2>
                            <p class="text text-secondary"><?php get_eng_room(3, "intro", "可容納10人，主要給正在前期發展之團隊使用") ?></p>
                            </p>
                        </div>
                    </div>
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

<?php
function get_eng_space($item, $zh){
    if(isEng()){
        global $json;
        $space = $json['space'];
        echo $space[$item];
        
    }else{
        echo $zh;
    }
}

function get_eng_room($index, $item, $zh){
    if(isEng()){
        global $json;
        $room = $json['space']['room'];
        echo $room[$index][$item];
        
    }else{
        echo $zh;
    }
}
?>

</html>