<!DOCTYPE HTML>
<!-- This file is used in additional function for write a post -->
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

    <noscript>
        <link rel="stylesheet" href="/assets/css/noscript.css" />
    </noscript>
</head>

<?php

include $_SERVER["DOCUMENT_ROOT"] . "/editor/utils.php";

$link = sql_connect();

$id = 0;
$title = '';
$cid = '';
$class = '';
$href = '';
$usage = 'none';
if (isset($_POST['usage']) && $_POST['usage'] == "edit") {
    $usage = 'edit';
    $id = $_POST['id'];

    $row = sql_fetch($result);
    $title = $_POST["title"];
    $class = $_POST["class"];
    $cid = $_POST["cid"];
    $href = $_POST["href"];
}
?>

<style type="text/css">
    body {
        background-color: rgba(200, 200, 200);
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
        <form method="post" id="form">
            <div class="r">
                <h5 class="" id="exampleModalLabel">撰寫文章</h5>
            </div>
            <div class="">
                <form id="form">
                    <div class="mb-3">
                        <label class="form-label">文章標題</label>
                        <input type="text" class="form-control" id="titleInput">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="sel-class">
                            <option selected>--選擇分類--</option>
                            <?php
                            // Make select list of class parent
                            $sql = "SELECT * FROM class;";
                            $res = sql_query($link, $sql);
                            while ($row = sql_fetch($res)) {
                                echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="replaceHref" onclick="enableHref(this);">
                        <label class="form-check-label" for="replaceHref">
                            啟用重新導向至：
                        </label>
                        <input type="text" class="form-control" id="inputReplaceHref" placeholder="EX: http://example.com">
                    </div>
                    <div class="mb-3">
                        <textarea id="editor"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" class="btn btn-primary" id="save" value="儲存"></input>
                        <button type="button" class="btn btn-secondary ms-3" id="cancel">取消</button>
                    </div>
                </form>
            </div>
        </form>
    </div>


    <!-- Scripts -->
    <script src="/bootstrap-5.1.0-dist/js/popper.min.js"></script>
    <script src="/bootstrap-5.1.0-dist/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/jquery.scrollex.min.js"></script>
    <script src="/assets/js/jquery.scrolly.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            auto_focus: "editor",
            height: 800,
            images_upload_url: '../imageUploadAccepter.php',
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
            init_instance_callback: "setEditorContent"
        });

        $("#cancel").click(function() {
            window.location.replace("../index.php?usage=post");
        })

        $("#form").submit(function(event) {
            event.preventDefault();

            title = $("#titleInput").val();
            if (title == '') {
                alert("請填入名稱");
                retrun;
            }
            classes = $("#sel-class").val();
            if (classes.includes('--選擇')) {
                alert("請選擇分類");
                return;
            }

            var json;
            // If replace to href
            if ($("#replaceHref").is(":checked")) {
                var href = $("#inputReplaceHref").val();

                json = {
                    title: title,
                    class: classes,
                    type: 'href',
                    href: href
                };
            } else {
                var content = tinymce.get("editor").getContent();

                json = {
                    title: title,
                    class: classes,
                    content: content
                };
            }

            <?php
            if ($usage == "edit") {
                echo "json['id'] = $id ;";
                echo "json['usage'] = 'update';";
            }
            ?>

            $.post("../post/save.php", json, function(data) {
                    if (data == "success") {
                        window.location.replace("../index.php?usage=post");
                    } else {
                        alert("新增失敗: " + data);
                    }
                });
        });

        var setEditorContent = function() {
            <?php
            if ($usage == "edit") {
            ?>
                $("#titleInput").val('<?php echo $title; ?>');
                $("#sel-class").val('<?php echo $class; ?>');

                var href = "<?php echo $href; ?>";
                var cid = "<?php echo $cid; ?>";

                if (href != '') {
                    $("#replaceHref").prop('checked', true);
                    $("#inputReplaceHref").val(href);
                } else {
                    $("#replaceHref").prop('checked', false);
                }

                $.get("../doc/" + cid + ".php", function(data) {
                    tinymce.get("editor").setContent(data);
                });
            <?php
            }
            ?>
        }
    </script>
</body>

</html>