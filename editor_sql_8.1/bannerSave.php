<?php
include 'connect.php';

$usage = 'save';
$id = 0;
if(isset($_POST['usage'])) {
        $usage = 'update'; 
        $id = $_POST['id'];
}

$hImg = $_POST['hImg'];
$vImg = $_POST['vImg'];
$href = $_POST['href'];

$sql = "INSERT INTO banner(h_image, v_image, href) VALUES ".
        "('$hImg', '$vImg', '$href');";

if($usage == 'update'){
        $sql = "UPDATE article SET title='$title', content='$content', category='$category', top=$top WHERE id=$id;";
}

$result = mysqli_query($link, $sql);
if(!$result) exit(mysqli_error($link));

echo "success";
