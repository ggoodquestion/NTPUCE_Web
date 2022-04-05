<?php
$link = sql_connect();
$table_name = "post";
$page = 1;
$num_per_page = 20;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$data_start = ($page - 1) * $num_per_page;

$sql = "SELECT COUNT(*) as total FROM $table_name;";
$result = sql_query($link, $sql);
if (!$result) exit(mysqli_error($link));
$row = sql_fetch($result);
$total = ceil($row[0] / $num_per_page);

$sql = "SELECT * FROM $table_name ORDER BY published desc LIMIT $data_start, $num_per_page;";
$result = sql_query($link, $sql);
if (!$result) exit(mysqli_error($link));
?>

<!-- 新增頁面 -->
<div class="row mt-5">
    <div class="col-2"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">新增</button></div>

    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" id="add">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">撰寫文章</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                            <button type="button" class="btn btn-secondary ms-3" data-bs-dismiss="modal">取消</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 顯示用table -->
<div class="row mt-2">
    <div class="col table-responsive">
        <table class="table table-light table-striped table-hover table-bordered">
            <thead>
                <!-- Table 欄位名稱 -->
                <tr class="table-secondary tab-title" id="title">
                    <th scope="col">#</th>
                    <th scope="col">文章標題</th>
                    <th scope="col">分類</th>
                    <th scope="col">發布時間</th>
                    <th scope="col">啟用</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <!-- Table 欄位內容 -->
            <tbody id="dataTable">
                <?php
                while ($row = sql_fetch($result)) { ?>
                    <tr id="<?php echo $row["id"]; ?>" class="dataRow">
                        <th scope="row" name="id"><?php echo $row["id"]; ?></th>
                        <td name="title"><?php echo $row["title"]; ?></td>
                        <td name="class" for="<?php echo $row["class"]; ?>"><?php echo id2Class($row["class"], $link); ?></td>
                        <td name="published"><?php echo $row["published"]; ?></td>
                        <td name="enable"><input class="form-check-input" name="enableCheck" type="checkbox" <?php echo ($row['enable']) ? 'checked' : ''; ?>></td>
                        <td name="operations">
                            <button class="btn btn-sm" name="edit" data-bs-toggle="modal" data-bs-target="#edit" for="<?php echo $row["id"]; ?>"><img src="./images/edit_black_24dp.svg"></button>
                            <input class="btn btn-sm" type="image" name="delete" value="<?php echo $row[0]; ?>" src="./images/delete_black_24dp.svg" />
                            <input class="btn btn-sm" type="image" name="refresh" value="<?php echo $row[0]; ?>" src="./images/update_black_24dp.svg" />
                            <input type="hidden" name="content" value="<?php echo $row["content"]; ?>">
                            <input type="hidden" name="href" value="<?php echo $row["href"]; ?>">
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- 翻頁 -->
<div class="row">
    <div class="col">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
                <li class="page-item">
                    <a class="page-link" href="./index.php?usage=post&page=<?php echo ($page - 1 < 1) ?  $page :  $page - 1; ?>" id="previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                $start = $page - 2;
                $stop = $page + 2;
                if ($page < 3) {
                    $start = 1;
                    $stop = $start + 4;
                } else if ($total - $page < 2) {
                    $start = $total - 4;
                    $stop = $total;
                }
                if ($total < 5) {
                    $start = 1;
                    $stop = $total;
                }

                for ($i = $start; $i <= $stop; $i++) {
                    if ($page == $i) {
                        echo "<li class='page-item disabled'><a class='page-link' href='./index.php?usage=post&page=$i'>$i</a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='./index.php?usage=post&page=$i'>$i</a></li>";
                    }
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="./index.php?usage=post&page=<?php echo ($page + 1 > $total) ?  $page :  $page + 1; ?>" id="next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<!-- 更新頁面 -->
<div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" id="edit">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">編輯文章</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="post" action="">
                    <input type="hidden" name="id" value="" id="editId">
                    <input type="hidden" name="post" value="" id="editPost">
                    <div class="mb-3">
                        <label class="form-label">文章標題</label>
                        <input type="text" class="form-control" id="editTitleInput" name="name">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="sel-class-edit">
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
                        <input class="form-check-input" type="checkbox" value="" id="eReplaceHref" onclick="enableHref(this);">
                        <label class="form-check-label" for="eReplaceHref">
                            啟用重新導向至：
                        </label>
                        <input type="text" class="form-control" id="editReplaceHref" placeholder="EX: http://example.com">
                    </div>
                    <div class="mb-3">
                        <textarea id="editor-edit"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" class="btn btn-primary" id="editInput" value="修改"></input>
                        <button type="button" class="btn btn-secondary ms-3" data-bs-dismiss="modal">取消</button>
                        <input type="hidden" name="usage" value="update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    tinymce.init({
        selector: 'textarea',
        height: 800,
        images_upload_url: 'imageUploadAccepter.php',
        content_css: "../assets/css/common.css",
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'table emoticons template paste help'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
    });

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

        // If replace to href
        if ($("#replaceHref").is(":checked")) {
            var href = $("#inputReplaceHref").val();

            $.post("./post/save.php", {
                title: title,
                class: classes,
                type: 'href',
                href: href
            }, function(data) {
                if (data == "success") {
                    location.reload();
                } else {
                    alert("新增失敗: " + data);
                }
            });
        } else {
            var content = tinymce.get("editor").getContent();

            $.post("./post/save.php", {
                title: title,
                class: classes,
                content: content
            }, function(data) {
                if (data == "success") {
                    location.reload();
                } else {
                    alert("新增失敗: " + data);
                }
            });
        }
    });

    $("input[name='delete']").click(function() {
        var r = confirm("確定刪除?");
        if (r == true) {
            $.post("./post/delete.php", {
                    id: $(this).val()
                },
                function(data) {
                    if (data == "success") {
                        alert("刪除成功");
                        window.location.reload();
                    } else {
                        alert("刪除時出現異常");
                    }
                });
        }
    });

    $("input[name='enableCheck']").change(function() {
        let chk = 0;
        if ($(this).is(":checked")) {
            chk = 1;
        }
        $.post("./post/check.php", {
            id: $(this).parent().parent().attr("id"),
            enable: chk
        }, function(data) {
            if (data == "success") {
                window.location.reload();
            } else {
                alert(data);
            }
        });
    });

    $("button[name='edit']").click(function() {
        var id = $(this).attr("for");
        $("#editId").val(id);
        tr = $(this).parent().parent();

        title = tr.find("td[name='title']").text();
        classes = tr.find("td[name='class']").attr("for");
        cid = $(this).parent().find("input[name='content']").val();
        href = $(this).parent().find("input[name='href']").val();

        $("#editTitleInput").val(title);
        $("#sel-class-edit").val(classes);

        if (href != '') {
            $("#eReplaceHref").prop('checked', true);
            $("#editReplaceHref").val(href);
        } else {
            $("#eReplaceHref").prop('checked', false);
        }

        $.get("./doc/" + cid + ".php", function(data) {
            tinymce.get("editor-edit").setContent(data);
        });
    });

    $("#editForm").submit(function(event) {
        event.preventDefault();

        id = $("#editId").val();
        title = $("#editTitleInput").val();
        classes = $('#sel-class-edit').val();

        if (title == '') {
            alert("請填入標題");
            retrun;
        }
        if (classes.includes('--選擇')) {
            alert("請選擇分類");
            return;
        }

        // If replace to href
        if ($("#eReplaceHref").is(":checked")) {
            var href = $("#editReplaceHref").val();

            $.post("./post/save.php", {
                id: id,
                title: title,
                class: classes,
                type: 'href',
                href: href,
                usage: 'update'
            }, function(data) {
                if (data == "success") {
                    location.reload();
                } else {
                    alert("更新失敗: " + data);
                }
            });
        } else {
            var content = tinymce.get("editor-edit").getContent();

            $.post("./post/save.php", {
                id: id,
                title: title,
                class: classes,
                content: content,
                usage: 'update'
            }, function(data) {
                if (data == "success") {
                    location.reload();
                } else {
                    alert("更新失敗: " + data);
                }
            });
        }

    });

    var enableHref = function(checkbox) {
        // do something
    }
</script>