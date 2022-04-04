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
$class = $_POST['class'];
$content = $_POST['content'];

$path = $_SERVER['DOCUMENT_ROOT'] . "/editor/doc/";
$fn = uniqid();
file_put_contents($path . $fn . '.php', $content);

$sql = "INSERT INTO post(title, class, content) VALUES " .
    "('$title', $class, '$fn');";

if ($usage == 'update') {
    $sql = "SELECT content FROM post WHERE id=$id;";
    $res = sql_query($link, $sql);
    $fn = $path . sql_fetch($res)['content'];
    $fp = fopen($fn . '.php', 'w');
    fwrite($fp, $content);
    fclose($fp);

    $sql = "UPDATE post SET title='$title', class=$class WHERE id=$id;";
} 

$result = mysqli_query($link, $sql);
if (!$result) exit(mysqli_error($link));

echo "success";
?>