<?php
session_start();

if(isset($_SESSION['lang'])){
    if($_SESSION['lang'] == 'zh'){
        $_SESSION['lang'] = "eng";
    }else{
        $_SESSION['lang'] = "zh";
    }
}else{
    $_SESSION['lang'] = "eng";
}
?>