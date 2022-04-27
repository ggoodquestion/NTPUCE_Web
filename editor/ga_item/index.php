<?php
$link = sql_connect();
$table_name = "ga_item";
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

$sql = "SELECT * FROM $table_name ORDER BY id desc LIMIT $data_start, $num_per_page;";
$result = sql_query($link, $sql);
if (!$result) exit(mysqli_error($link));
?>

<!-- 新增頁面 -->
<div class="row mt-5">
    <div class="col-2"><a class="btn btn-primary" href="./ga_item/postEditor.php">新增</a></div>
</div>

<!-- 顯示用table -->
<div class="row mt-2">
    <div class="col table-responsive">
        <table class="table table-light table-striped table-hover table-bordered">
            <thead>
                <!-- Table 欄位名稱 -->
                <tr class="table-secondary tab-title" id="title">
                    <th scope="col">#</th>
                    <th scope="col">項目標題</th>
                    <th scope="col">活動</th>
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
                        <td name="topic" for="<?php echo $row["topic"]; ?>"><?php echo id2Topic($row["topic"], $link); ?></td>
                        <td name="operations">
                            <button class="btn btn-sm" name="edit" for="<?php echo $row["id"]; ?>"><img src="./images/edit_black_24dp.svg"></button>
                            <input class="btn btn-sm" type="image" name="delete" value="<?php echo $row[0]; ?>" src="./images/delete_black_24dp.svg" />
                            <input class="btn btn-sm" type="image" name="refresh" value="<?php echo $row[0]; ?>" src="./images/update_black_24dp.svg" />
                            <input type="hidden" name="content" value="<?php echo $row["content"]; ?>">
                            <input type="hidden" name="href" value="<?php echo $row["href"]; ?>">
                            <input type="hidden" name="cover" value="<?php echo $row["cover"]; ?>">
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
                    <a class="page-link" href="./index.php?usage=ga_item&page=<?php echo ($page - 1 < 1) ?  $page :  $page - 1; ?>" id="previous">
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
                        echo "<li class='page-item disabled'><a class='page-link' href='./index.php?usage=ga_item&page=$i'>$i</a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='./index.php?usage=ga_item&page=$i'>$i</a></li>";
                    }
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="./index.php?usage=ga_item&page=<?php echo ($page + 1 > $total) ?  $page :  $page + 1; ?>" id="next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<script>
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

    // $("input[name='enableCheck']").change(function() {
    //     let chk = 0;
    //     if ($(this).is(":checked")) {
    //         chk = 1;
    //     }
    //     $.post("./post/check.php", {
    //         id: $(this).parent().parent().attr("id"),
    //         enable: chk
    //     }, function(data) {
    //         if (data == "success") {
    //             window.location.reload();
    //         } else {
    //             alert(data);
    //         }
    //     });
    // });

    $("button[name='edit']").click(function() {
        var id = $(this).attr("for");
        $("#editId").val(id);
        tr = $(this).parent().parent();

        title = tr.find("td[name='title']").text();
        topic = tr.find("td[name='topic']").attr("for");
        cid = $(this).parent().find("input[name='content']").val();
        href = $(this).parent().find("input[name='href']").val();
        cover = $(this).parent().find("input[name='cover']").val();

        // Make normally post request
        form = $('<form action="./ga_item/postEditor.php" method="POST">' +
            '<input type="hidden" name="id" value="'+id+'">' +
            '<input type="hidden" name="usage" value="edit">' +
            '<input type="hidden" name="title" value="' + title + '">' +
            '<input type="hidden" name="topic" value="' + topic + '">' +
            '<input type="hidden" name="cid" value="' + cid + '">' +
            '<input type="hidden" name="href" value="' + href + '">' +
            '<input type="hidden" name="cover" value="' + cover + '">' +
            '</form>');

        // Avoid error "Form submission canceled because the form is not connected"
        document.body.appendChild(form[0]);
        form.submit();
    });

    // $("#editForm").submit(function(event) {
    //     event.preventDefault();

    //     id = $("#editId").val();
    //     title = $("#editTitleInput").val();
    //     classes = $('#sel-class-edit').val();

    //     if (title == '') {
    //         alert("請填入標題");
    //         retrun;
    //     }
    //     if (classes.includes('--選擇')) {
    //         alert("請選擇分類");
    //         return;
    //     }

    //     // If replace to href
    //     if ($("#eReplaceHref").is(":checked")) {
    //         var href = $("#editReplaceHref").val();

    //         $.post("./post/save.php", {
    //             id: id,
    //             title: title,
    //             class: classes,
    //             type: 'href',
    //             href: href,
    //             usage: 'update'
    //         }, function(data) {
    //             if (data == "success") {
    //                 location.reload();
    //             } else {
    //                 alert("更新失敗: " + data);
    //             }
    //         });
    //     } else {
    //         var content = tinymce.get("editor-edit").getContent();

    //         $.post("./post/save.php", {
    //             id: id,
    //             title: title,
    //             class: classes,
    //             content: content,
    //             usage: 'update'
    //         }, function(data) {
    //             if (data == "success") {
    //                 location.reload();
    //             } else {
    //                 alert("更新失敗: " + data);
    //             }
    //         });
    //     }

    // });

    var enableHref = function(checkbox) {
        // do something
    }
</script>