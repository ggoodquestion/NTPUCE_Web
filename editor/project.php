<style>
    .image.h {
        width: 200px;
    }

    .image.v {
        height: 200px;
    }
</style>

<?php
$page = 1;
$num_per_page = 5;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$data_start = ($page - 1) * $num_per_page;

$sql = "SELECT COUNT(*) as total FROM project;";
$result = mysql_query($sql);
if (!$result) exit(mysql_error($link));
$row = mysql_fetch_row($result);
$total = ceil($row[0] / $num_per_page);

$sql = "SELECT * FROM project ORDER BY id desc LIMIT $data_start, $num_per_page;";
$result = mysql_query($sql);
if (!$result) exit(mysql_error($link));
?>
<div class="row mt-5">
    <div class="col-2"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProject">新增</button></div>

    <div class="modal fade" id="addProject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" id="addProject">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">新增相關資源</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form">
                        <div class="mb-3">
                            <label class="form-label">圖片</label>
                            <input type="file" class="form-control" id="coverUpload">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">顯示名稱</label>
                            <input type="text" class="form-control" id="titleInput" placeholder="顯示名稱">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">連結網址</label>
                            <input type="text" class="form-control" id="hrefInput" placeholder="連結網址">
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

    <div class="row mt-2">
        <div class="col table-responsive">
            <table class="table table-light table-striped table-hover table-borderless">
                <thead>
                    <tr class="table-secondary tab-title" id="title">
                        <th scope="col">#</th>
                        <th scope="col">圖片</th>
                        <th scope="col">名稱</th>
                        <th scope="col">連結</th>
                        <th scope="col">啟用</th>
                        <th scope="col">操作</th>
                    </tr>
                </thead>
                <tbody id="dataTable">
                    <?php
                    while ($row = mysql_fetch_row($result)) { ?>
                        <tr id="<?php echo $row[0]; ?>" class="dataRow">
                            <th scope="row" name="id"><?php echo $row[0]; ?></th>
                            <td name="cover"><img src="<?php echo $row[2]; ?>" class="image h"></td>
                            <td name="title"><?php echo $row[1]; ?></td>
                            <td name="href"><?php echo $row[3]; ?></td>
                            <td name="enable"><input class="form-check-input" name="enableCheck" type="checkbox" <?php echo ($row[4]) ? 'checked' : ''; ?>></td>
                            <td name="operations">
                                <button class="btn btn-sm" name="edit" data-bs-toggle="modal" data-bs-target="#editProject" for="<?php echo $row[0]; ?>"><img src="./images/edit_black_24dp.svg"></button>
                                <input class="btn btn-sm" type="image" name="delete" value="<?php echo $row[0]; ?>" src="./images/delete_black_24dp.svg" />
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <a class="page-link" href="./menu.php?usage=project&page=<?php echo ($page - 1 < 1) ?  $page :  $page - 1; ?>" id="previous">
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
                            echo "<li class='page-item disabled'><a class='page-link' href='./menu.php?usage=project&page=$i'>$i</a></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link' href='./menu.php?usage=project&page=$i'>$i</a></li>";
                        }
                    }
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="./menu.php?usage=project&page=<?php echo ($page + 1 > $total) ?  $page :  $page + 1; ?>" id="next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="modal fade" id="editProject" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" id="editProject">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">修改內容</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="post" action="./projectSave.php">
                        <input type="hidden" name="id" value="" id="editId">
                        <div class="mb-3">
                            <label class="form-label">圖片</label>
                            <input type="file" class="form-control" name="cover" id="editCoverUpload">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">顯示名稱</label>
                            <input type="text" class="form-control" id="editTitleInput" name="title" placeholder="顯示名稱">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">連結網址</label>
                            <input type="text" class="form-control" id="editHrefInput" name="href" placeholder="連結網址">
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
        var upLoadImage = function(fd) {

        }

        $("#form").submit(function(event) {
            event.preventDefault();

            var fd = new FormData();
            var files = $('#coverUpload')[0].files[0];
            fd.append('file', files);

            var coverUrl = '';
            $.ajax({
                url: './imageUploadAccepter.php',
                type: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response != 0) {
                        var obj = jQuery.parseJSON(response);
                        coverUrl = obj.location;
                        var href = $('#hrefInput').val().trim();
                        var title = $('#titleInput').val().trim();

                        $.post("./projectSave.php", {
                            cover: coverUrl,
                            title: title,
                            href: href
                        }, function(data) {
                            if (data == "success") {
                                window.location.reload();
                            } else {
                                alert(data);
                            }
                        });
                    } else {
                        alert('file not uploaded');
                    }
                },
                catch: function(e) {
                    alert("error");
                }
            });


        });

        $("input[name='delete']").click(function() {
            var r = confirm("確定刪除?");
            if (r == true) {
                $.post("./deleteProject.php", {
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
            $.post("./projectCheck.php", {
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
            cover = tr.find("td[name='cover']").find("img").attr("src");
            title = tr.find("td[name='title']").text();
            href = tr.find("td[name='href']").text();
            $("#editTitleInput").val(title);
            $("#editHrefInput").val(href);
        });

        $("#editForm").submit(function(event) {
            event.preventDefault();

            var fd = new FormData();
            var files = $('#editCoverUpload')[0].files[0];
            fd.append('file', files);
            
            if ($("#editCoverUpload").val() != "") {

                var coverUrl = '';
                $.ajax({
                    url: './imageUploadAccepter.php',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response != 0) {
                            var obj = jQuery.parseJSON(response);
                            coverUrl = obj.location;
                            var id = $("#editId").val().trim();
                            var href = $('#editHrefInput').val().trim();
                            var title = $('#editTitleInput').val().trim();

                            $.post("./projectSave.php",
                                {
                                    id: id,
                                    cover: coverUrl,
                                    title: title,
                                    href: href,
                                    usage: "update"
                                },
                                function(data) {
                                    if (data == "success") {
                                        window.location.reload();
                                    } else {
                                        alert(data);
                                    }
                                });
                        } else {
                            alert('file not uploaded');
                        }
                    },
                    catch: function(e) {
                        alert("error");
                    }
                });
            } else {
                $.post("./projectSave.php",
                    $("#editForm").serialize(),
                    function(data) {
                        if (data == "success") {
                            window.location.reload();
                        } else {
                            alert(data);
                        }
                    });
            }

        });
    </script>