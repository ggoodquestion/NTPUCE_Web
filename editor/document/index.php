<?php
$page = 1;
$num_per_page = 20;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$data_start = ($page - 1) * $num_per_page;


$total = ceil($row[0] / $num_per_page);

?>

<!-- 新增頁面 -->
<div class="row mt-5">
    <div class="col-5">
        <div class="input-group">
            <input type="file" id="uploadFile" class="form-control" name="file">
            <button class="btn btn-primary">上傳</button>
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
                    <th scope="col">檔案名稱</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <!-- Table 欄位內容 -->
            <tbody id="dataTable">
                <?php
                while ($row = sql_fetch($result)) { ?>
                    <tr id="<?php echo $row["id"]; ?>" class="dataRow">
                        <th scope="row" name="id"><?php echo $row["id"]; ?></th>
                        <td name="name"><?php echo $row["name"]; ?></td>
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
                    <a class="page-link" href="./index.php?usage=mod&page=<?php echo ($page - 1 < 1) ?  $page :  $page - 1; ?>" id="previous">
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
                        echo "<li class='page-item disabled'><a class='page-link' href='./index.php?usage=mod&page=$i'>$i</a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='./index.php?usage=mod&page=$i'>$i</a></li>";
                    }
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="./index.php?usage=mod&page=<?php echo ($page + 1 > $total) ?  $page :  $page + 1; ?>" id="next">
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
            $.post("./mod/delete.php", {
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

</script>