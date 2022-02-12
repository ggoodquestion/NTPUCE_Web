<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>北大創創 - 進駐團隊</title>
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
        line-height: 1.5rem;
    }
</style>

<body class="">

    <!-- Wrapper -->
    <div id="wrapper" class="fade-in">

        <?php include("../templates/navbar.php"); ?>

        <!-- Main -->
        <div id="main">
            <header>
                <h1 align="center"><?php get_eng_info("title", "進駐團隊") ?></h1>
                <h3 align="center"><?php get_eng_info("intro", "我們幫助團隊順利進行前期規劃，使他們順利茁壯以致成功。") ?></h3>
            </header>

                <span class="row">
                    <a href="https://www.twentythree.com.tw/" target="_blank" class='col-lg-4' style="text-decoration: none"><img src="../images/team02.png" style="width:100%;" border="0"></a>
                    <div class="col-lg-8">
                        <header>
                            <h2>
                            <?php get_eng_team(1, "year", "110年進駐團隊") ?><br />
                                <a href="https://www.twentythree.com.tw/"><?php get_eng_team(1, "title", "二拾衫") ?></a>
                            </h2>
                        </header>
                        <p><?php get_eng_team(1, "content", "榮獲
                            教育部青年發展署U-start計畫補助款及第五屆創業之星選秀大賽學生組冠軍的二拾衫團隊，其創業主旨為給予
                            閒置衣物新生命，讓穿不到的衣服以合理價格售出並減少碳足跡，或是捐贈給需要幫助的人回饋社會，不以商業
                            為主軸，而是追求循環時尚與永續經濟的平衡") ?>
                            <br/><br/>
                            <span class="image right"><img src="../images/110年度ustart中心獲獎感謝狀.jpeg" style="width:70%"/></span>
                            <?php get_eng_team(1, "award", "國立臺北大學創新創業中心辦理教育部110年度「U-start創新創業計畫」團隊輔導及服務工作，獲頒感謝狀。") ?>
                        </p>
                    </div>
                </span>
            </article>

            <article class="post">

                <span class="row">
                    <img src="../images/team01.jpg" class="col-lg-4 mt-3" style="height:100%">
                    <div class="col-lg-8">
                        <header>
                            <h2>
                            <?php get_eng_team(0, "year", "109年進駐團隊") ?><br />
                            <?php get_eng_team(0, "title", "uCare中醫智能復健理療平台") ?>
                            </h2>
                        </header>
                        <p><?php get_eng_team(0, "content", "uCare中醫智能復健理療平台，榮獲109年度教育部青年發展署U-start計畫補助款，致力於成為符合世界趨勢的
                            復健動氣理療輔助智能應用平台方案提供者，我們提供用戶或中西醫復健病人，在任何地方都可透過 VR虛擬實境
                            O2O App 裝置自由舒緩、輔助肢體復健") ?></p>
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
function get_eng_info($item, $zh){
    if(isEng()){
        global $json;
        $borrow = $json['teams'][$item];
        echo $borrow;
        
    }else{
        echo $zh;
    }
}

function get_eng_team($index, $item, $zh){
    if(isEng()){
        global $json;
        $borrow = $json['teams']['teams'];
        echo $borrow[$index][$item];
        
    }else{
        echo $zh;
    }
}
?>

</html>