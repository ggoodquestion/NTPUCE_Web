<?php
$fn = $_GET['fn'];
# 原始檔案位置
$filePath = '../doc/'.$fn;

# 檔案類型（一般性檔案）
$contentType = "application/octet-stream";

# 下載後的檔名
$newFileName = $fn;

# 各種檔案標頭
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Type: " . $contentType);
header("Content-Length: " . (string)(filesize($filePath)));
header("Content-Transfer-Encoding: binary\n");

# 以附件方式下載檔案，並指定下載後的預設檔名
header('Content-Disposition: attachment; filename="' . $newFileName . '"');

# 輸出檔案內容
readfile($filePath);

exit();
?>