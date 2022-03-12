<?php
session_start();
// phpinfo();exit();
$file = file_get_contents("./eng/config.json");
if (empty($file)) $file = file_get_contents("../eng/config.json");
$json = json_decode($file, true);
?>
<!-- <header id="header">
    <a href="/index.php" class="logo"><img src="/images/banner_logo.png" class="logo-banner"></a>
</header> -->

<nav id="nav">
    <ul id="nav-ul" class="links d-flex justify-content-center" align="center" valign="center" >
        <li id="home"><a href="/index.php">Home</a></li>
        <!-- <li class="nav-logo" style="width:10rem"><img src="/images/footer-logo.svg" class="image fit" style="height:100%; padding-left:1rem;"></li> -->
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/mods/utils.php";
        $link = sql_connect();
        $sql = "SELECT id FROM mods WHERE name='nav';";
        $result = sql_query($link, $sql);
        $mid = sql_fetch($result)['id'];

        $sql = "SELECT * FROM class WHERE mods='$mid';";
        $result = sql_query($link, $sql);
        while ($row = sql_fetch($result)) {
            echo '<li><a href="/mods/basic/content.php?class=' . $row['id'] . '">' . $row['title'] . '</a></li>';
        }
        ?>
        <!-- <li id="home"><a href="/index.php">Home</a></li>
        <li id="introduction"><a href="/index.php">系所簡介</a></li>
        <li id="edu"><a href="/index.php">教育目標</a></li>
        <li id="teacher"><a href="/index.php">師資介紹</a></li>
        <li id="adminssion"><a href="/index.php">招生資訊</a></li>
        <li id="lecture"><a href="/index.php">課程規劃</a></li>
        <li id="lab"><a href="/index.php">實驗室介紹</a></li>
        <li id="ieet"><a href="/index.php">IEET認證</a></li>
        <li id="resource"><a href="/index.php">相關資源</a></li>
        <li id="tidbits"><a href="/index.php">活動剪影</a></li>
        <li id="intern"><a href="/index.php">實習徵才</a></li> -->
    </ul>
</nav>

<script src="/assets/js/jquery.min.js"></script>
<script>
    // $("#switch_lang").click(function(){
    //     $.post("https://cie.ntpu.edu.tw/templates/switch_lang.php",{},
    //     function(data){
    //         window.location.reload();
    //     });
    // });
</script>

<?php
sql_disconnect($link);
// function get_eng_nav($item, $index, $zh, $src){
//     if(isEng()){
//         global $json;
//         $nav = $json['nav'];
//         echo $nav[$item][$index];

//     }else{
//         echo $zh;
//     }
// }

// function isEng(){
//     if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'eng'){return true;}
//     else{return false;}
// }
?>