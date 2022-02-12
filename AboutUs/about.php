<?php session_start();
// $file = file_get_contents("./eng/config.json");
// if(empty($file)) $file = file_get_contents("../eng/config.json");
// $json = json_decode($file, true); 
?>
<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>北大創創 - 認識我們</title>
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
    p {
        font-size: 1.2rem;
        line-height: 2rem;
    }
</style>

<body class="">

    <!-- Wrapper -->
    <div id="wrapper" class="fade-in">

        <?php include("../templates/navbar.php"); ?>

        <!-- Main -->
        <div id="main">
            <article class="post">
                <header id="about">
                    <h2><?php get_eng_about("about", 0, "關於我們") ?></h2>
                </header>
                <p>
                    <?php get_eng_about("about", 1, "創新創業中心主要培育國立臺北大學創業團隊，透過專業課程學習、專業人士交流、
                    創新創意活動舉辦，協助進駐團隊建立可行的商業模式並發展具體的行銷策略。不
                    僅致力於激發師生創新動能，更以活絡跨領域能量為目標，身兼軟硬實力培養交流
                    空間及跨單位整合平台，並透過招募甄選學生創業團隊，強化驗證循環，匯聚創新
                    創業資源再擴大社會影響力，達到學界、業界共好，為高等教育之人才培育、產學
                    接軌貢獻心力。") ?>
                </p>
                <ul class="alt list-none">
                    <li><strong><?php get_eng_about("about", 2, "跨領域工作坊") ?></strong>——<?php get_eng_about("about", 3, "實作能力、整合能力、策略能力") ?></li>
                    <br />
                    <li><strong><?php get_eng_about("about", 4, "跨單位整合平台") ?></strong>——<?php get_eng_about("about", 5, "創新創業學程、產學接軌、校友資訊") ?></li>
                    <br />
                    <li><strong><?php get_eng_about("about", 6, "創創座談") ?></strong>——<?php get_eng_about("about", 7, "創業歷程講座、創創小劇場、團隊經驗交流") ?></li>
                    <br />
                    <li><strong><?php get_eng_about("about", 8, "創業試驗場域") ?></strong>——<?php get_eng_about("about", 9, "業師輔導、鼓勵實作＆競賽、場地空間使用") ?></li>
                    <br />
                </ul>
                <br />
                <header id="destiny">
                    <h2><?php get_eng_about("vision", 0, "願景與使命") ?></h2>
                </header>
                <p>
                    <?php get_eng_about("vision", 1, "大學的主要任務在於秉持全人教育的理念以培育人才，積極從事研發創新、累積及傳播知識，並
                    承擔社會責任。本校有鑒於「創新創業人才」係台灣未來競爭力的重要資產，於是整合了各教學
                    研究與行政單位資源，並結合校友的經驗和人脈，積極成立創新創業中心。") ?>
                </p>

                <hr />

                <header class="" id="member">
                    <h2><?php get_eng_about("member", 0, "中心成員") ?></h2>
                </header>
                <p>
                    <span>
                        <strong>
                            <h3>創新創業中心主任 Director of CIE <br /><?php get_eng_about("member", 1, "江振宇 主任") ?></h3>
                        </strong>
                    </span>
                    <span class="row">
                        <div class="col-lg-9">
                            <h3 class="text text-secondary profile info">
                                <ul class="alt list-none">
                                    <li><?php get_eng_about("member", 2, "學歷：國立交通大學電信工程博士") ?> </li>
                                    <li><?php get_eng_about("member", 3, "聯絡電話：(02)8674-1111 分機68805") ?></li>
                                    <li style="text-transform: none ;"><?php get_eng_about("member", 6, "電子信箱：") ?>cychiang@gm.ntpu.edu.tw</li>
                                </ul>
                            </h3>
                        </div>
                        <div class="col-lg-3 align-right">
                        </div>
                    </span>
                </p>

                <p>
                    <span>
                        <strong>
                            <h3>專案經理 Project Manager<br /><?php get_eng_about("member", 4, "彭敏鳳") ?></h3>
                        </strong>
                    </span>
                    <span class="row">
                        <div class="col-lg-9">
                            <h3 class="text text-secondary profile info">
                                <ul class="alt list-none">
                                    <li><?php get_eng_about("member", 5, "聯絡電話：(02)8674-1111 分機68375") ?></li>
                                    <li style="text-transform: none ;"><?php get_eng_about("member", 6, "電子信箱：") ?>minfeng@gm.ntpu.edu.tw</li>
                                </ul>
                            </h3>
                        </div>
                        <div class="col-lg-3 align-right">
                        </div>
                    </span>
                </p>

                <br />

                <span class=" container row" id="contact">
                    <header class="">
                        <h2><?php get_eng_about("contact", 0, "聯絡我們") ?></h2>
                    </header>
                    <div class="col-lg-5">
                        <section>
                            <h3><?php get_eng_about("contact", 1, "校址") ?></h3>
                            <p><?php get_eng_about("contact", 2, "新北市三峽區大學路151號(圖書館B1)") ?></p>
                        </section>
                        <section>
                            <h3><?php get_eng_about("contact", 3, "電話") ?></h3>
                            <p><?php get_eng_about("contact", 4, "(02)8674-1111 分機68375") ?></p>
                        </section>
                    </div>
                    <div class="col-lg-5">
                        <section>
                            <h3><?php get_eng_about("contact", 5, "傳真") ?></h3>
                            <p>(02)8671-8000</p>
                        </section>
                        <section>
                            <h3><?php get_eng_about("contact", 6, "服務時間") ?></h3>
                            <p><?php get_eng_about("contact", 7, "週一～週五：9:00 - 17:00") ?></p>
                        </section>
                    </div>
                    <div class="col-lg-2">
                        <img src="../images/logo.svg" class="image fit">
                    </div>

                </span>
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

function get_eng_about($item, $index, $zh){
    if(isEng()){
        global $json;
        $about = $json['about'];
        echo $about[$item][$index];
        
    }else{
        echo $zh;
    }
}
?>

</html>