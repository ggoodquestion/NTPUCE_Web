<?php
include 'connect.php';

$usage = 'save';
$id = 0;
if(isset($_POST['usage'])) {
        $usage = $_POST['usage']; 
        $id = $_POST['id'];
}

$hImg = $_POST['hImg'];
$vImg = $_POST['vImg'];
$href = $_POST['href'];

$sql = "INSERT INTO banner(h_image, v_image, href) VALUES ".
        "('$hImg', '$vImg', '$href');";

if($usage == 'update'){
        $sql = "UPDATE banner SET";
        if($hImg != "") $sql .= " h_image='$hImg',";
        if($vImg != "") $sql .= " v_image='$vImg',";
        $sql .= " href='$href' WHERE id=$id;";
}else if($usage == refresh){
        $sql = "UPDATE banner SET date=CURRENT_TIMESTAMP() WHERE id=$id;";
}

$result = mysql_query($sql);
if(!$result) exit(mysql_error($link));

echo "success";
