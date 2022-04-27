<?php
// Connection
function sql_connect(){
    $dbuser = "ntpuce";
    $dbpassword = "ceweb2021";
    $dbname = "ceweb";
    $host = "127.0.0.1";

    $link = mysqli_connect($host, $dbuser, $dbpassword, $dbname);
    if(!$link){
        echo(mysqli_connect_error());
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

function ids2Mods($data, $link)
{
    $ids = explode(",", $data);
    $res = '';
    foreach ($ids as $id) {
        $sql = "SELECT * FROM mods WHERE id=$id;";
        $result = sql_query($link, $sql);
        $row = sql_fetch($result);
        $res .= $row['name'] . ',';
    }
    $res = substr($res, 0, strlen($res) - 1);
    return $res;
}

function id2Class($data, $link)
{
    if (empty($data)) return; // To be insure $data is not empty
    $sql = "SELECT * FROM class WHERE id=$data;";
    $result = sql_query($link, $sql);
    $row = sql_fetch($result);
    $res = $row['title'];
    return $res;
}

function id2Topic($data, $link)
{
    if (empty($data)) return; // To be insure $data is not empty
    $sql = "SELECT * FROM ga_topic WHERE id=$data;";
    $result = sql_query($link, $sql);
    $row = sql_fetch($result);
    $res = $row['name'];
    return $res;
}
?>