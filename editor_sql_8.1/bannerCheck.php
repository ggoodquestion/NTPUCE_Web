<?php
include './connect.php';

$id = $_POST['id'];
$enable = $_POST['enable'];

$sql = "UPDATE banner SET enable=$enable WHERE id=$id;";
$result = mysqli_query($link, $sql);
if(!$result) exit(mysqli_error($link));

echo "success";
?>