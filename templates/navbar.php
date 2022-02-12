<?php 
session_start(); 
// phpinfo();exit();
$file = file_get_contents("./eng/config.json");
if(empty($file)) $file = file_get_contents("../eng/config.json");
$json = json_decode($file, true);
?>
<header id="header">
    <!-- <a href="/index.php" class="logo"><img src="/images/banner_logo.png" class="logo-banner"></a> -->
</header>

<nav id="nav">
    <ul class="links">
        <li class="nav-logo" style="width:10rem"><img src="/images/footer-logo.svg" class="image fit" style="height:100%; padding-left:1rem;"></li>
        <li id="News"><a href="/index.php"><?php get_eng_nav("news", 0, "最新消息") ?></a></li>
        <li id="Activity">
            <div class="dropdown">
                <a class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" data-bs-target="#act-col" disabled>
                    <?php get_eng_nav("activity", 0, "活動總覽") ?>
                </a>
                <ul class="dropdown-menu dp-op" aria-labelledby="dropdownMenuButton1" id="act-col">
                    <li><a href="/Activity/activity.php"><?php get_eng_nav("activity", 1, "學期活動") ?></a></li>
                    <li><a href="/Activity/tidbits.php"><?php get_eng_nav("activity", 2, "活動花絮") ?></a></li>
                    <li><a href="/Activity/DEA.php"><?php get_eng_nav("station", 1, "創新創業提案競賽") ?></a></li>
                </ul>
            </div>
        </li>
        <li id="Space">
            <div class="dropdown">
                <a class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" data-bs-target="#space-col" disabled>
                    <?php get_eng_nav("spaces", 0, "實體空間") ?>
                </a>
                <ul class="dropdown-menu dp-op" aria-labelledby="dropdownMenuButton1" id="space-col">
                    <li><a href="/Space/space.php"><?php get_eng_nav("spaces", 1, "實體空間") ?></a></li>
                    <li><a href="/Space/rent.php"><?php get_eng_nav("spaces", 2, "租借場地") ?></a></li>
                </ul>
            </div>
        </li>
        <li id="Station">
            <div class="dropdown">
                <a class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" data-bs-target="#station-col" disabled>
                    <?php get_eng_nav("station", 0, "進駐中心") ?>
                </a>
                <ul class="dropdown-menu dp-op" aria-labelledby="dropdownMenuButton1" id="station-col">
                    <li><a href="/Station/teams.php"><?php get_eng_nav("station", 2, "進駐團隊") ?></a></li>
                    <li><a href="/Station/QA.php"><?php get_eng_nav("station", 3, "常見問題Q&A") ?></a></li>
                    <li><a href="/Station/service.php"><?php get_eng_nav("station", 4, "服務項目") ?></a></li>
                </ul>
            </div>
        </li>
        <li id="About">
            <div class="dropdown">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-target="#about-col" disabled>
                <?php get_eng_nav("about", 0, "認識我們") ?>
                </a>
                <ul class="dropdown-menu dp-op" aria-labelledby="dropdownMenuButton1" id="about-col">
                    <li><a href="/AboutUs/about.php#about"><?php get_eng_nav("about", 1, "關於我們")?></a></li>
                    <li><a href="/AboutUs/about.php#destiny"><?php get_eng_nav("about", 2, "願景與使命")?></a></li>
                    <li><a href="/AboutUs/about.php#member"><?php get_eng_nav("about", 3, "中心成員")?></a></li>
                    <li><a href="/AboutUs/about.php#contact"><?php get_eng_nav("about", 4, "聯絡我們")?></a></li>
                </ul>
            </div>
        </li>
        <li id="Resource"><a href="/Regulation/regulation.php"><?php get_eng_nav("regulation", 0, "相關法規")?></a></li>
        <li id="Resource"><a href="/Resource/resource.php"><?php get_eng_nav("resource", 0, "相關資源")?></a></li>
    </ul>
    <ul class="icons">
        <li><a id="switch_lang" style="border-bottom: 0px; font-weight: bold; font-size: 0.9rem;">
        <?php 
        if(isset($_SESSION["lang"]) && $_SESSION["lang"] == 'eng'){
            echo "中文";
        }else{
            echo "English";
        }
        ?>
        </a></li>
        <li><a href="https://www.facebook.com/NTPUCIE/" class="icon brands fa-facebook-f" target="_blank"><span class="label">Facebook</span></a></li>
    </ul>
</nav>

<script src="/assets/js/jquery.min.js"></script>
<script>
    $("#switch_lang").click(function(){
        $.post("https://cie.ntpu.edu.tw/templates/switch_lang.php",{},
        function(data){
            window.location.reload();
        });
    });
</script>

<?php
function get_eng_nav($item, $index, $zh, $src){
    if(isEng()){
        global $json;
        $nav = $json['nav'];
        echo $nav[$item][$index];
        
    }else{
        echo $zh;
    }
}

function isEng(){
    if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'eng'){return true;}
    else{return false;}
}
?>