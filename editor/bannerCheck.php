<?php
include './connect.php';

$id = $_POST['id'];
$enable = $_POST['enable'];

$sql = "UPDATE banner SET enable=$enable WHERE id=$id;";
$result = mysql_query($sql);
if(!$result) exit(mysql_error($link));

echo "success";
?>