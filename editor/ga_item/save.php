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
$class = $_POST['class'];
$content = $_POST['content'];

$path = $_SERVER['DOCUMENT_ROOT'] . "/editor/doc/";
$fn = uniqid();

if ($type == 'href') {
    // If is href mode, also give a fn_id in order to necesity of add article in future
    file_put_contents($path . $fn . '.php', "");
    $sql = "INSERT INTO post(title, class, content, href) VALUES " .
        "('$title', $class, '$fn', '$href');";
        
} else {
    
    file_put_contents($path . $fn . '.php', $content);

    $sql = "INSERT INTO post(title, class, content) VALUES " .
        "('$title', $class, '$fn');";
    
}

if ($usage == 'update') {
    $sql = "SELECT content FROM post WHERE id=$id;";
    $res = sql_query($link, $sql);

    if ($type == 'href') {
        $sql = "UPDATE post SET title='$title', class=$class, href='$href' WHERE id=$id;";

    } else {
        $fn = $path . sql_fetch($res)['content'];
        $fp = fopen($fn . '.php', 'w');
        fwrite($fp, $content);
        fclose($fp);

        $sql = "UPDATE post SET title='$title', class=$class, href=NULL WHERE id=$id;";
        // Here href need to clean up to NULL
    }
}

$result = mysqli_query($link, $sql);
if (!$result) exit(mysqli_error($link));

echo "success";
?>