<?php
include '../utils.php';
$link = sql_connect();

$usage = 'save';
$id = 0;
if (isset($_POST['usage'])) {
    $usage = 'update';
    $id = $_POST['id'];
}

$title = $_POST['title'];
$parent = $_POST['parent'];
$mod = $_POST['mod'];

$sql = "INSERT INTO class(title, parent, mods) VALUES " .
    "('$title', $parent, '$mod');";

if ($usage == 'update') {
    $sql = "UPDATE class SET title='$title', parent=$parent, mods='$mod' WHERE id=$id;";
} 

$result = mysqli_query($link, $sql);
if (!$result) exit(mysqli_error($link));

echo "success";
?>