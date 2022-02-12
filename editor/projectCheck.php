<?php
include './connect.php';

$id = $_POST['id'];
$enable = $_POST['enable'];

$sql = "UPDATE project SET enable=$enable WHERE id=$id;";
$result = mysql_query($sql);
if(!$result) exit(mysql_error($link));

echo "success";
?>