<?php
// $page = 1;
// $num_per_page = 20;
// if (isset($_GET['page'])) {
//     $page = $_GET['page'];
// }
// $data_start = ($page - 1) * $num_per_page;


// $total = ceil($row[0] / $num_per_page);

?>

<!-- 新增頁面 -->
<div class="row mt-5">
    <form class="col-5" id="uploadForm">
        <div class="input-group">
            <input type="file" id="uploadFile" class="form-control" name="file">
            <input type="submit" class="btn btn-primary" id="submit" value="上傳"></input>
        </div>
    </form>
    <div class="col-5">
        此處僅做為簡易檔案瀏覽與路徑複製之用，如需較為複雜之功能請使用filezilla!
    </div>


</div>

<!-- Data列表 -->
<div class="contain mt-2">
    <?php
    $root = $_SERVER['DOCUMENT_ROOT'] . '/';
    $base_dir = "files/";
    $port = 8080;

    if ($handle = opendir($root . $base_dir)) {
        while (false !== ($file = readdir($handle))) {
            if ('.' === $file) continue;
            if ('..' === $file) continue;

            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https://" : "http://";

            $full_path = "/$base_dir$file";
            echo "<div class='d-flex flex-row bd-highlight'><a href='$full_path'>$file</a><button class='btn btn-light' onclick='copy(this);' value='$full_path'><img src='./images/content_copy_black_24dp.svg'></button></div>";
        }
        closedir($handle);
    } else {
        exit("can't open folder");
    }
    ?>
</div>
<script>
    $("#uploadForm").submit(function(e) {
        e.preventDefault();
        var fd = new FormData();
        var files = $('#uploadFile')[0].files[0];
        fd.append('file', files);

        $.ajax({
            url: 'fileUploadAccepter.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != "success") {
                    alert(response);
                } else {
                    location.reload();
                }
            },
            catch: function(e) {
                alert(e);
            }
        });
    })


    var copy = function(button) {
        var sampleTextarea = document.createElement("textarea");
        document.body.appendChild(sampleTextarea);
        sampleTextarea.value = $(button).val(); //save main text in it
        sampleTextarea.select(); //select textarea contenrs
        document.execCommand("copy");
        document.body.removeChild(sampleTextarea);
    }
</script>