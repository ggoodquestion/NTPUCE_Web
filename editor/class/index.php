<?php
$link = sql_connect();
$table_name = "class";
$page = 1;
$num_per_page = 20;
if (isset($_GET['page'])) {
    $cur_page = $_GET['page'];
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
    <div class="col-2"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">新增</button></div>

    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" id="add">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">新增類別</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form">
                        <div class="mb-3">
                            <label class="form-label">類別名稱</label>
                            <input type="text" class="form-control" id="titleInput" requried>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" id="sel-parent">
                                <option selected>--選擇分類--</option>
                                <?php
                                // Make select list of class parent
                                $sql = "SELECT * FROM class;";
                                $res = sql_query($link, $sql);
                                $count = 1;
                                while ($row = sql_fetch($res)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <select class="form-select" id="sel-mods">
                                <option selected>--選擇模組--</option>
                                <?php
                                // Make select list of mods
                                $sql = "SELECT * FROM mods;";
                                $res = sql_query($link, $sql);
                                $count = 1;
                                while ($row = sql_fetch($res)) {
                                    echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                }
                                ?>
                            </select>
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
                    <th scope="col">分類名稱</th>
                    <th scope="col">父分類</th>
                    <th scope="col">所屬模組</th>
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
                        <td name="parent" for="<?php echo $row["parent"]; ?>"><?php echo id2Class($row["parent"], $link); ?></td>
                        <td name="mods" for="<?php echo $row["mods"]; ?>"><?php echo ids2Mods($row["mods"], $link); ?></td>
                        <td name="operations">
                            <button class="btn btn-sm" name="edit" data-bs-toggle="modal" data-bs-target="#edit" for="<?php echo $row["id"]; ?>"><img src="./images/edit_black_24dp.svg"></button>
                            <input class="btn btn-sm" type="image" name="delete" value="<?php echo $row[0]; ?>" src="./images/delete_black_24dp.svg" />
                            <input class="btn btn-sm" type="image" name="refresh" value="<?php echo $row[0]; ?>" src="./images/update_black_24dp.svg" />
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
                    <a class="page-link" href="./index.php?usage=class&page=<?php echo ($page - 1 < 1) ?  $page :  $page - 1; ?>" id="previous">
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
                        echo "<li class='page-item disabled'><a class='page-link' href='./index.php?usage=article&page=$i'>$i</a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='./index.php?usage=article&page=$i'>$i</a></li>";
                    }
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="./index.php?usage=class&page=<?php echo ($page + 1 > $total) ?  $page :  $page + 1; ?>" id="next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<!-- 更新頁面 -->
<div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" id="edit">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">修改內容</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="post" action="./classSave.php">
                    <input type="hidden" name="id" value="" id="editId">
                    <input type="hidden" name="post" value="" id="editPost">
                    <div class="mb-3">
                        <label class="form-label">分類名稱</label>
                        <input type="text" class="form-control" id="editTitleInput" name="name">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="sel-parent-edit">
                            <option selected>--選擇分類--</option>
                            <?php
                            // Make select list of class parent
                            $sql = "SELECT * FROM class;";
                            $res = sql_query($link, $sql);
                            $count = 1;
                            while ($row = sql_fetch($res)) {
                                echo '<option value="' . $row['id'] . '">' . $row['title'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="sel-mods-edit">
                            <option selected>--選擇模組--</option>
                            <?php
                            // Make select list of mods
                            $sql = "SELECT * FROM mods;";
                            $res = sql_query($link, $sql);
                            $count = 1;
                            while ($row = sql_fetch($res)) {
                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                            }
                            ?>
                        </select>
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
    $("#form").submit(function(event) {
        event.preventDefault();

        title = $("#titleInput").val();
        parent = $("#sel-parent").val();
        if (parent.includes('--選擇')) parent = 'null';

        if (title == '') {
            alert("請填入名稱");
            return;
        }

        mod = $("#sel-mods").val();

        if (mod.includes('--選擇')) {
            alert("請選擇模組");
            return;
        }

        $.post("./class/save.php", {
            title: title,
            parent: parent,
            mod: mod
        }, function(data) {
            if (data == "success") {
                location.reload();
            } else {
                alert("新增失敗: " + data);
            }
        });
    });

    $("input[name='delete']").click(function() {
        var r = confirm("確定刪除?");
        if (r == true) {
            $.post("./class/delete.php", {
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
    //     $.post("./classCheck.php", {
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
        parent = tr.find("td[name='parent']").attr("for");
        mod = tr.find("td[name='mods']").attr("for");
        $("#editTitleInput").val(title);
        if (parent != null && !(parent < 1)) $("#sel-parent-edit").val(parent);
        $("#sel-mods-edit").val(mod);
    });

    $("#editForm").submit(function(event) {
        event.preventDefault();

        id = $("#editId").val();
        title = $("#editTitleInput").val();
        parent = $("#sel-parent-edit").val();
        if (parent.includes('--選擇')) parent = 'null';

        if (title == '') {
            alert("請填入名稱");
            return;
        }

        mod = $("#sel-mods-edit").val();

        if (mod.includes('--選擇')) {
            alert("請選擇模組");
            return;
        }
        $.post("./class/save.php", {
            id: id,
            title: title,
            parent: parent,
            mod: mod,
            usage: 'update'
        }, function(data) {
            if (data == "success") {
                location.reload();
            } else {
                alert("更新失敗: " + data);
            }
        });
    });
</script>