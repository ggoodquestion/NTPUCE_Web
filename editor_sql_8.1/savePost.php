<?php
include 'connect.php';

$usage = 'save';
$id = 0;
if(isset($_POST['usage'])) {
        $usage = 'update'; 
        $id = $_POST['id'];
}

$content = $_POST['content'];
$f_content = $_POST['f_content'];
$title = $_POST['title'];
$category = $_POST['category'];
$top = $_POST['top'];
$timeStamp = date("Y-m-d_H-i-s");
$fn = $timeStamp . ".php";

$fp = fopen("./doc/".$fn, 'w');
fwrite($fp, $f_content);
fclose($fp);

$sql = "INSERT INTO article(title, content, filename, category, top) VALUES ".
        "('$title', '$content', '$fn', '$category', $top);";

if($usage == 'update'){
        $sql = "UPDATE article SET title='$title', content='$content', category='$category', top=$top WHERE id=$id;";
}

$result = mysqli_query($link, $sql);
if(!$result) exit(mysqli_error($link));

echo "success";
?>