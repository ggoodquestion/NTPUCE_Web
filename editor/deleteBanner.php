<?php
include "./connect.php";

$id = $_POST['id'];
$sql = "DELETE FROM banner WHERE id = $id;";
$result = mysql_query($sql);
if(!$result) exit("error");
else echo("success");
?>