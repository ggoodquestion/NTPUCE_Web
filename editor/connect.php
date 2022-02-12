<?php
$dbuser = "ciewebadmin";
$dbpassword = "cientpu2021";
$dbname = "ciewebadmin";
$host = "127.0.0.1";

$link = mysql_connect($host, $dbuser, $dbpassword);
mysql_select_db("ciewebadmin");
if($link){
    mysql_query("SET NAMES utf8");
}else{
    // exit(mysql_connect_error());
    exit("Connection failed.");
}
?>