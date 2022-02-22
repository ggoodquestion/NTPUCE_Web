<?php
include '../utils.php';
$link = sql_connect();

$usage = 'save';
$id = 0;
$post_id = 0;
if (isset($_POST['usage'])) {
    $usage = 'update';
    $id = $_POST['id'];
    $post_id = $_POST['post_id'];
}

$name = $_POST['name'];
$content = $_POST['content'];

$timeStamp = date("Y-m-d_H-i-s");
$fn = $timeStamp . ".php";

$sql = "INSERT INTO nav_item(name, post) VALUES " .
    "('$name', '$timeStamp');";

if ($usage == 'update') {
    $sql = "UPDATE nav_item SET name='$name' WHERE id=$id;";
    $fp = fopen("../doc/nav_item/" . $post_id . ".php", 'w');
    if (!$fp) exit("寫檔失敗");
    fwrite($fp, $content);
    fclose($fp);
} else {
    $fp = fopen("../doc/nav_item/" . $fn, 'w');
    if (!$fp) exit("寫檔失敗");
    fwrite($fp, $content);
    fclose($fp);
}

$result = mysqli_query($link, $sql);
if (!$result) exit(mysqli_error($link));

echo "success";
?>