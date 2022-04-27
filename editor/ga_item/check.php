<?php
include '../utils.php';
$link = sql_connect();

$id = $_POST['id'];
$enable = $_POST['enable'];

$sql = "UPDATE ga_item SET enable=$enable WHERE id=$id;";
$result = mysqli_query($link, $sql);
if(!$result) exit(mysqli_error($link));

echo "success";
?>