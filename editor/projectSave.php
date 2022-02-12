<?php
include 'connect.php';

$usage = 'save';
$id = 0;
if(isset($_POST['usage'])) {
        $usage = 'update'; 
        $id = $_POST['id'];
}

$cover = $_POST['cover'];
$title = $_POST['title'];
$href = $_POST['href'];

$sql = "INSERT INTO project(title, cover, href) VALUES ".
        "('$title', '$cover', '$href');";

if($usage == 'update'){
        if($cover == ""){
                $sql = "UPDATE project SET title='$title', href='$href' WHERE id=$id;";
        }else{
                $sql = "UPDATE project SET cover='$cover', title='$title', href='$href' WHERE id=$id;";
        }
}

$result = mysql_query($sql);
if(!$result) exit(mysql_error($link));

echo "success";
