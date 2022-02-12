<?php
function get_eng_nav($item, $index, $zh){
    if(isEng()){
        $file = file_get_contents("https://cie.ntpu.edu.tw/eng/config.json");
        $json = json_decode($file, true);
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