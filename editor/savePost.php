<?php
include 'connect.php';

$usage = 'save';
$id = 0;
if(isset($_POST['usage'])) {
        $usage = 'update'; 
        $id = $_POST['id'];
}

$content = $_POST['content'];
$f_content = str_replace("\n", "", $_POST['f_content']);
$title = $_POST['title'];
$category = $_POST['category'];
$top = $_POST['top'];
$cover = $_POST['cover'];
$timeStamp = date("Y-m-d_H-i-s");
$fn = $timeStamp . ".php";

// $fp = fopen("./doc/".$fn, 'w');
// fwrite($fp, $f_content);
// fclose($fp);

$sql = "INSERT INTO article(title, content, full_content, category, top, cover) VALUES ".
        "('$title', '$content', '$f_content', '$category', $top, '$cover');";

if($usage == 'update'){
        $sql = "UPDATE article SET title='$title', content='$content', full_content='$f_content', category='$category', top=$top, cover='$cover' WHERE id=$id;";
}

$result = mysql_query($sql);
if(!$result) exit(mysql_error($link));

echo "success";
?>