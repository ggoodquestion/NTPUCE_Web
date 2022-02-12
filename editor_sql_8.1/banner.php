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
$result = mysqli_query($link, $sql);
if (!$result) exit(mysqli_error($link));
$total = ceil(mysqli_fetch_assoc($result)['total'] / $num_per_page);

$sql = "SELECT * FROM banner ORDER BY date desc LIMIT $data_start, $num_per_page;";
$result = mysqli_query($link, $sql);
if (!$result) exit(mysqli_error($link));
?>
<div class="row mt-5">
    <div class="col-2"><button class="btn btn-light btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addBanner">新增</button></div>

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
        <table class="table table-secondary table-striped table-hover table-borderless">
            <thead>
                <tr class="table-dark tab-title" id="title">
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
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr id="<?php echo $row['id']; ?>" class="dataRow">
                        <th scope="row" name="id"><?php echo $row['id']; ?></th>
                        <td name="h_img"><img src="<?php echo $row['h_image']; ?>" class="image h"></td>
                        <td name="v_img"><img src="<?php echo $row['v_image']; ?>" class="image v"></td>
                        <td name="href"><?php echo $row['href']; ?></td>
                        <td name="date"><?php echo $row['date']; ?></td>
                        <td name="enable"><input class="form-check-input" name="enableCheck" type="checkbox" <?php echo ($row['enable']) ? 'checked' : ''; ?>></td>
                        <td name="operations">
                            <form method="post" action="./postEditor.php">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="hidden" name="usage" value="edit">
                                <input class="btn btn-sm" type="image" name="edit" src="./images/edit_black_24dp.svg" />
                            </form>
                            <input class="btn btn-sm" type="image" name="delete" value="<?php echo $row['id']; ?>" src="./images/delete_black_24dp.svg" />
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

<script>
    var upLoadImage = function(fd) {

    }

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
</script>