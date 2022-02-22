<?php
// Connection
function sql_connect(){
    $dbuser = "ntpuce";
    $dbpassword = "ceweb2021";
    $dbname = "ceweb";
    $host = "127.0.0.1";

    $link = mysqli_connect($host, $dbuser, $dbpassword, $dbname);
    if(!$link){
        exit(mysqli_connect_error());
        exit("Connection failed.");
    }
    return $link;
}

// Select
function sql_query($link, $sql){
    $result = mysqli_query($link, $sql);
    if(!$result) exit(mysqli_error($link));
    return $result;
}

function sql_fetch($result){
    if($result){
        $row = mysqli_fetch_array($result);
    }else{
        $row = false;
    }
    return $row;
}
?>