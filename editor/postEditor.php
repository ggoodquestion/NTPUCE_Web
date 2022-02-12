<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>文章撰寫</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="../assets/css/noscript.css" />
    </noscript>
</head>

<?php

include "./connect.php";

$id = 0;
$title = '';
$content = '';
$category = '';
$top = 0;
$usage = 'none';
$coverImg = '../images/bg.jpg'; //Just use to initialize
if (isset($_POST['usage']) && $_POST['usage'] == "edit") {
    $usage = 'edit';
    $id = $_POST['id'];
    $sql = "SELECT * FROM article WHERE id = '$id';";
    $result = mysql_query($sql);
    if (!$result) exit(mysql_error($link));

    $row = mysql_fetch_row($result);
    $title = $row[1];
    $category = $row[5];
    $top = $row[6];
    $content = $row[3];
    if (!empty($row[7])) {
        $coverImg = $row[7];
    }
}
?>

<style type="text/css">
    body {
        background-color: rgba(0, 0, 0, 0.541);
    }

    .align-right {
        align-items: right;
        align-content: right;
        text-align: right;
    }
</style>

<body>

    <script src="https://cdn.tiny.cloud/1/wbkj23gf0n88u14j6ykey1plgboqczi88rjg48ocsm4wqgtg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- Wrapper -->
    <div id="wrapper" class="my-5" style="margin-left: 10vw; margin-right: 10vw;">

        <!-- Main -->
        <div id="main" class="align-center">
            <form method="post" id="form">
                <div class="row">
                    <div class="col-3">
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="categoryChoice">
                            <option>選擇文章種類</option>
                            <?php
                            if ($usage == "edit") {
                                echo "<option value='$category' selected>預設</option>";
                            }
                            ?>
                            <option value="activity">活動</option>
                            <option value="notice">公告</option>
                            <option value="tidbits">花絮</option>
                            <option value="competition">競賽</option>
                            <option value="resource">資源</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <input class="form-check-input" type="checkbox" value="" id="onTop" <?php if ($top == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="onTop">
                            首頁置頂
                        </label>
                    </div>
                    <div class="mb-3 col">
                        <div class="row">
                            <div class="col">
                                <label for="formFile" class="form-label">設定封面圖片(無則預設)</label>
                                <input class="form-control" type="file" id="coverImg">
                            </div>
                            <div class="col">
                                <img src="<?php echo $coverImg ?>" id="cImg" style="width: 14rem;">
                            </div>
                        </div>

                    </div>
                </div>
                <input type="text" class="form-control my-3" id="title" placeholder="文章標題" value='<?php if ($usage == "edit") echo $title; ?>' required>
                <textarea id="editor"></textarea>
                <div class="align-right">
                    <div>
                        <a class="btn btn-lg btn-light mt-5 me-2" id="cancel">取消</a>
                        <input id="btnEditSubmit" type="submit" value="提交" class="btn btn-success mt-5 btn-lg"></input>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Scripts -->
    <script src="../bootstrap-5.1.0-dist/js/popper.min.js"></script>
    <script src="../bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/jquery.scrollex.min.js"></script>
    <script src="../assets/js/jquery.scrolly.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            auto_focus: "editor",
            height: 400,
            images_upload_url: 'imageUploadAccepter.php',
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
            init_instance_callback: "setEditorContent"
        });

        $("#cancel").click(function() {
            window.location.replace("./menu.php");
        })

        $("#form").submit(function(event) {
            event.preventDefault();
            var content = tinymce.get("editor").getContent({
                format: 'text'
            });
            var f_content = tinymce.get("editor").getContent();

            category = $("#categoryChoice").val();
            title = $("#title").val();
            onTop = 0;
            if ($('#onTop').is(":checked")) {
                onTop = 1;
            }
            coverImg = $('#cImg').attr('src');

            $.post("./savePost.php", {
                content: content,
                f_content: f_content,
                category: category,
                title: title,
                top: onTop,
                cover: coverImg
                <?php
                if ($usage == "edit") {
                    echo ",usage:'update', id: '$id'";
                }
                ?>
            }, function(data) {
                if (data == "success") {
                    window.location.replace("./menu.php");
                    // $("#form").reset();
                } else {
                    alert(data);
                }
            })
        })
        var setEditorContent = function() {
            <?php
            if ($usage == "edit") {
                $content = str_replace("\n", "", $content);
                echo "tinymce.get('editor').setContent('$content');";
            }
            ?>
        }

        $('#coverImg').change(function() {
            var fd = new FormData();
            var files = $('#coverImg')[0].files[0];
            fd.append('file', files);

            var imgUrl = '';
            $.ajax({
                url: './imageUploadAccepter.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response != 0) {
                        var obj = jQuery.parseJSON(response);
                        imgUrl = obj.location;
                        $('#cImg').attr('src', imgUrl);
                    }else{
                        alert('file not uploaded');
                    }
                },
                catch: function(e) {
                    alert("error");
                }
            });
            
        });
    </script>


</body>

</html>