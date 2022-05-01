<?php
$link = sql_connect();
$table_name = "carousel";
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
    <div class="col-2"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">新增</button></div>

    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" id="add">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">新增圖片</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form">
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <input class="form-check-input" name="hrefRadio" type="radio" for="imgUrl">
                                    <label for="formFile" class="form-check-label">圖片位址</label>
                                    <input class="form-control" type="text" id="imgUrl">
                                </div>
                                <div class="col">
                                    <input class="form-check-input" name="hrefRadio" type="radio" for="imgUploadUrl">
                                    <label for="formFile" class="form-check-label">上傳圖片</label>
                                    <input class="form-control" type="file" id="imgUpload">
                                    <input type="hidden" id="imgUploadUrl">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col">
                            <label class="form-label">
                                外部連結(預設無)：
                            </label>
                            <input type="text" class="form-control" id="inputHref" placeholder="EX: http://example.com">
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
                    <th scope="col">圖片</th>
                    <th scope="col">所屬模組</th>
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
                        <td name="url"><img class="img-fluid" width="10%" src="<?php echo $row["url"]; ?>"></td>
                        <td name="mods" for="<?php echo $row["mods"]; ?>"><?php echo ids2Mods($row["mods"], $link); ?></td>
                        <td name="enable"><input class="form-check-input" name="enableCheck" type="checkbox" <?php echo ($row['enable']) ? 'checked' : ''; ?>></td>
                        <td name="operations">
                            <button class="btn btn-sm" name="edit" data-bs-toggle="modal" data-bs-target="#edit" for="<?php echo $row["id"]; ?>"><img src="./images/edit_black_24dp.svg"></button>
                            <input class="btn btn-sm" type="image" name="delete" value="<?php echo $row[0]; ?>" src="./images/delete_black_24dp.svg" />
                            <input class="btn btn-sm" type="image" name="refresh" value="<?php echo $row[0]; ?>" src="./images/update_black_24dp.svg" />
                            <input type="hidden" name="href" value="<?php echo $row['href']; ?>">
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
                    <a class="page-link" href="./index.php?usage=carousel&page=<?php echo ($page - 1 < 1) ?  $page :  $page - 1; ?>" id="previous">
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
                        echo "<li class='page-item disabled'><a class='page-link' href='./index.php?usage=carousel&page=$i'>$i</a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='./index.php?usage=carousel&page=$i'>$i</a></li>";
                    }
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="./index.php?usage=carousel&page=<?php echo ($page + 1 > $total) ?  $page :  $page + 1; ?>" id="next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<!-- 更新頁面 -->
<div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" id="edit">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">修改內容</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="post">
                    <input type="hidden" name="id" value="" id="editId">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <input class="form-check-input" name="editHrefRadio" type="radio" for="editImgUrl" id="editRadioUrl">
                                <label for="formFile" class="form-check-label">圖片位址</label>
                                <input class="form-control" type="text" id="editImgUrl">
                            </div>
                            <div class="col">
                                <input class="form-check-input" name="editHrefRadio" type="radio" for="editImgUploadUrl" id="editRadioUpload">
                                <label for="formFile" class="form-check-label">上傳圖片</label>
                                <input class="form-control" type="file" id="editImgUpload">
                                <input type="hidden" id="editImgUploadUrl">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col">
                        <label class="form-label">
                            外部連結(預設無)：
                        </label>
                        <input type="text" class="form-control" id="editInputHref" placeholder="EX: http://example.com">
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

        radioFor = $("input[name='hrefRadio']:checked").attr('for');
        if (!radioFor) { // Check if select a way for img
            alert("請輸入圖片位址或上傳圖片");
            return;
        }

        url = $('#' + radioFor).val();

        href = $('#inputHref').val();

        mod = $("#sel-mods").val();

        if (mod.includes('--選擇')) {
            alert("請選擇模組");
            return;
        }

        $.post("./carousel/save.php", {
            url: url,
            href: href,
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
            $.post("./carousel/delete.php", {
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

    // Process uplaod file
    $('#imgUpload').change(function() {
        var fd = new FormData();
        var files = $('#imgUpload')[0].files[0];
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
                    $('#imgUploadUrl').val(imgUrl);
                } else {
                    alert('file not uploaded');
                }
            },
            catch: function(e) {
                alert("error");
            }
        });

    });

    $('#editImgUpload').change(function() {
        var fd = new FormData();
        var files = $('#editImgUpload')[0].files[0];
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
                    $('#editImgUploadUrl').val(imgUrl);
                } else {
                    alert('file not uploaded');
                }
            },
            catch: function(e) {
                alert("error");
            }
        });

    });

    $("input[name='enableCheck']").change(function() {
        let chk = 0;
        if ($(this).is(":checked")) {
            chk = 1;
        }
        $.post("./carousel/check.php", {
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

        url = tr.find("td[name='url']").find('img').attr("src");
        href = $(this).parent().find("input[name='href']").val();
        mod = tr.find("td[name='mods']").attr("for");


        $("#editRadioUrl").prop('checked', true);
        $("#editImgUrl").val(url);
        $("#editInputHref").val(href);
        $("#sel-mods-edit").val(mod);
    });

    $("#editForm").submit(function(event) {
        event.preventDefault();

        id = $("#editId").val();

        radioFor = $("input[name='editHrefRadio']:checked").attr('for');
        if (!radioFor) { // Check if select a way for img
            alert("請輸入圖片位址或上傳圖片");
            return;
        }
        url = $('#' + radioFor).val();

        href = $('#editInputHref').val();
        console.log(href);

        mod = $("#sel-mods-edit").val();

        if (mod.includes('--選擇')) {
            alert("請選擇模組");
            return;
        }
        $.post("./carousel/save.php", {
            id: id,
            url: url,
            href: href,
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