<?php
include '../utils.php';
$link = sql_connect();

$usage = 'save';
$id = 0;
if (isset($_POST['usage'])) {
    $usage = 'update';
    $id = $_POST['id'];
}

$name = $_POST['name'];

$sql = "INSERT INTO ga_topic(name) VALUES " .
    "('$name');";

if ($usage == 'update') {
    $sql = "UPDATE ga_topic SET name='$name' WHERE id=$id;";
} 

$result = mysqli_query($link, $sql);
if (!$result) exit(mysqli_error($link));

echo "success";
?>