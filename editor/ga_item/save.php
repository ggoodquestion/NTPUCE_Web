<?php
include '../utils.php';
$link = sql_connect();

$usage = 'save';
$type = '';
$id = 0;
if (isset($_POST['usage'])) {
    $usage = 'update';
    $id = $_POST['id'];
}

if (isset($_POST['type'])) {
    $type = $_POST['type'];
    if($type == 'href'){
        $href = $_POST['href'];
    }
}

$title = $_POST['title'];
$topic = $_POST['topic'];
$content = $_POST['content'];
$cover = $_POST['cover'];

$path = $_SERVER['DOCUMENT_ROOT'] . "/editor/doc/";
$fn = uniqid();

if ($type == 'href') {
    // If is href mode, also give a fn_id in order to necesity of add article in future
    file_put_contents($path . $fn . '.php', "");
    $sql = "INSERT INTO ga_item(title, topic, content, href, cover) VALUES " .
        "('$title', $topic, '$fn', '$href', '$cover');";
        
} else {
    
    file_put_contents($path . $fn . '.php', $content);

    $sql = "INSERT INTO ga_item(title, topic, content, cover) VALUES " .
        "('$title', $topic, '$fn', '$cover');";
    
}

if ($usage == 'update') {
    $sql = "SELECT content FROM ga_item WHERE id=$id;";
    $res = sql_query($link, $sql);

    if ($type == 'href') {
        $sql = "UPDATE ga_item SET title='$title', topic=$topic, href='$href' WHERE id=$id;";

    } else {
        $fn = $path . sql_fetch($res)['content'];
        $fp = fopen($fn . '.php', 'w');
        fwrite($fp, $content);
        fclose($fp);

        $sql = "UPDATE ga_item SET title='$title', topic=$topic, href=NULL WHERE id=$id;";
        // Here href need to clean up to NULL
    }
    $cover_sql = "UPDATE ga_item SET cover='$cover' WHERE id=$id;";
    $result = mysqli_query($link, $cover_sql);
    if (!$result) exit(mysqli_error($link));
}

$result = mysqli_query($link, $sql);
if (!$result) exit(mysqli_error($link));

echo "success";
?>