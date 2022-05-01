<?php
include '../utils.php';
$link = sql_connect();

$usage = 'save';
$id = 0;
if (isset($_POST['usage'])) {
    $usage = 'update';
    $id = $_POST['id'];
}

$url = $_POST['url'];
$href = $_POST['href'];
$mod = $_POST['mod'];

$sql = "INSERT INTO carousel(url, href, mods) VALUES " .
    "('$url', '$href', '$mod');";

if ($usage == 'update') {
    $sql = "UPDATE carousel SET url='$url', href='$href', mods='$mod' WHERE id=$id;";
} 

$result = mysqli_query($link, $sql);
if (!$result) exit(mysqli_error($link));

echo "success";
?>