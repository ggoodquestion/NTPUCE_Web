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
$num_per_page = 20;
if (isset($_GET['page'])) {
    $cur_page = $_GET['page'];
}
$data_start = ($page - 1) * $num_per_page;

$sql = "SELECT COUNT(*) as total FROM banner;";
$result = mysql_query($sql);
if (!$result) exit(mysql_error($link));
$row = mysql_fetch_row($result);
$total = ceil($row[0] / $num_per_page);

$sql = "SELECT * FROM banner ORDER BY date desc LIMIT $data_start, $num_per_page;";
$result = mysql_query($sql);
if (!$result) exit(mysql_error($link));
?>
<div class="row mt-5">
    <div class="col-2"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBanner">新增</button></div>

    <div class="modal fade" id="addBanner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" id="addBanner">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">新增Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form">
                        <div class="mb-3">
                            <label class="form-label">橫幅圖片</label>
                            <input type="file" class="form-control" id="hImgUpload">
                        </div>
                        <div class=" mb-3">
                            <label class="form-label">直幅圖片</label>
                            <input type="file" class="form-control" id="vImgUpload">
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
</div>

<div class="row mt-2">
    <div class="col table-responsive">
        <table class="table table-light table-striped table-hover table-bordered">
            <thead>
                <tr class="table-secondary tab-title" id="title">
                    <th scope="col">#</th>
                    <th scope="col">橫幅圖片</th>
                    <th scope="col">直幅圖片</th>
                    <th scope="col">連結</th>
                    <th scope="col">時間</th>
                    <th scope="col">啟用</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody id="dataTable">
                <?php
                while ($row = mysql_fetch_row($result)) { ?>
                    <tr id="<?php echo $row[0]; ?>" class="dataRow">
                        <th scope="row" name="id"><?php echo $row[0]; ?></th>
                        <td name="h_img"><img src="<?php echo $row[1]; ?>" class="image h"></td>
                        <td name="v_img"><img src="<?php echo $row[2]; ?>" class="image v"></td>
                        <td name="href"><?php echo $row[3]; ?></td>
                        <td name="date"><?php echo $row[5]; ?></td>
                        <td name="enable"><input class="form-check-input" name="enableCheck" type="checkbox" <?php echo ($row[4]) ? 'checked' : ''; ?>></td>
                        <td name="operations">
                            <button class="btn btn-sm" name="edit" data-bs-toggle="modal" data-bs-target="#editBanner" for="<?php echo $row[0]; ?>"><img src="./images/edit_black_24dp.svg"></button>
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
<div class="row">
    <div class="col">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
                <li class="page-item">
                    <a class="page-link" href="./menu.php?usage=banner&page=<?php echo ($page - 1 < 1) ?  $page :  $page - 1; ?>" id="previous">
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
                        echo "<li class='page-item disabled'><a class='page-link' href='./menu.php?usage=article&page=$i'>$i</a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='./menu.php?usage=article&page=$i'>$i</a></li>";
                    }
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="./menu.php?usage=banner&page=<?php echo ($page + 1 > $total) ?  $page :  $page + 1; ?>" id="next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<div class="modal fade" id="editBanner" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" id="editBanner">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">修改內容</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="post" action="./bannerSave.php">
                    <input type="hidden" name="id" value="" id="editId">
                    <div class="mb-3">
                        <label class="form-label">橫幅圖片</label>
                        <input type="file" class="form-control" id="editHImgUpload" name="hImg">
                    </div>
                    <div class=" mb-3">
                        <label class="form-label">直幅圖片</label>
                        <input type="file" class="form-control" id="editVImgUpload" name="vImg">
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
    $("#form").submit(function(event) {
        event.preventDefault();

        var fd1 = new FormData();
        var files1 = $('#hImgUpload')[0].files[0];
        fd1.append('file', files1);

        var fd2 = new FormData();
        var files2 = $('#vImgUpload')[0].files[0];
        fd2.append('file', files2);

        var hImgUrl = '';
        var vImgUrl = '';
        $.ajax({
            url: './imageUploadAccepter.php',
            type: 'post',
            data: fd1,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    var obj = jQuery.parseJSON(response);
                    hImgUrl = obj.location;
                    $.ajax({
                        url: './imageUploadAccepter.php',
                        type: 'post',
                        data: fd2,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            if (response != 0) {
                                var obj = jQuery.parseJSON(response);
                                vImgUrl = obj.location;

                                var href = $('#hrefInput').val().trim();

                                $.post("./bannerSave.php", {
                                    hImg: hImgUrl,
                                    vImg: vImgUrl,
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
            $.post("./deleteBanner.php", {
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

    $("input[name='refresh']").click(function() {
        $.post("./bannerSave.php", {
                usage: "refresh",
                id: $(this).val()
            },
            function(data) {
                if (data == "success") {
                    window.location.reload();
                } else {
                    alert("刪除時出現異常");
                }
            });
    });

    $("input[name='enableCheck']").change(function() {
        let chk = 0;
        if ($(this).is(":checked")) {
            chk = 1;
        }
        $.post("./bannerCheck.php", {
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
        href = tr.find("td[name='href']").text();
        $("#editHrefInput").val(href);
    });

    var UpdateData = function(hImg, vImg) { //For only update data
        var id = $("#editId").val().trim();
        var href = $('#editHrefInput').val().trim();
        $.post("./bannerSave.php", {
            id: id,
            hImg: hImg,
            vImg: vImg,
            href: href,
            usage: "update"
        }, function(data) {
            if (data == "success") {
                window.location.reload();
            } else {
                alert(data);
            }
        });
    };

    var UploadImage = function(formData, type, buf = "", callbacks = "") { //For update Img with different callbacks
        //Type 1 for hImg only,
        //Type 2 for vImg only,
        //Type 3 for both -1
        //Type 4 for both -2
        $.ajax({
            url: './imageUploadAccepter.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    var obj = jQuery.parseJSON(response);
                    imgUrl = obj.location;
                    if (type == 1) UpdateData(imgUrl, "");
                    else if (type == 2) UpdateData("", imgUrl);
                    else if (type == 3) callbacks(buf, 4, imgUrl);
                    else if (type == 4) UpdateData(buf, imgUrl);
                } else {
                    alert('file not uploaded');
                }
            },
            catch: function(e) {
                alert("error");
            }
        });
    };

    $("#editForm").submit(function(event) {
        event.preventDefault();

        var fd1 = new FormData();
        var files1 = $('#editHImgUpload')[0].files[0];
        fd1.append('file', files1);

        var fd2 = new FormData();
        var files2 = $('#editVImgUpload')[0].files[0];
        fd2.append('file', files2);

        if ($("#editHImgUpload").val() != "") {
            if ($("#editVImgUpload").val() != "") {
                UploadImage(fd1, 3, fd2, UploadImage);
            } else {
                UploadImage(fd1, 1);
            }
        } else {
            if ($("#editVImgUpload").val() != "") {
                UploadImage(fd2, 2);
            } else {
                UpdateData("", "");
            }
        }


    });
</script>