<?php
include "../utils.php";

$link = sql_connect();
$id = $_POST['id'];
$sql = "DELETE FROM ga_item WHERE id = $id;";
$result = mysqli_query($link, $sql);
if(!$result) exit("error");
else echo("success");
?>