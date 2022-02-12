<?php
$page = 1;
$num_per_page = 10;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$data_start = ($page - 1) * $num_per_page;

$sql = "SELECT COUNT(*) as total FROM article;";
$result = mysql_query($sql);
if (!$result) exit(mysql_error($link));
$row = mysql_fetch_row($result);
$total = ceil($row[0] / $num_per_page);

$sql = "SELECT * FROM article ORDER BY date desc LIMIT $data_start, $num_per_page;";
$result = mysql_query($sql);
if (!$result) exit(mysql_error($link));
?>
<div class="row mt-3">
    <div class="col-2"><a class="btn btn-primary " href="./postEditor.php">新增文章</a></div>
    <div class="col-3">
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <div class="btn-group" role="group">
                <!-- <button id="btnfilter" type="button" class="btn btn-light btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    篩選
                </button>
                <ul class="dropdown-menu px-2" aria-labelledby="btnfilter">
                    <li class="border-ul">

                    </li>
                    <li class="border-ul">

                    </li>
                    <li>
                        <button class="btn btn-light btn-outline-danger btn-sm" id="btnFilterClearPost">清除</button>
                    </li>
                </ul> -->
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col table-responsive">
        <table class="table  table-striped table-hover table-bordered">
            <thead>
                <tr class="table-secondary tab-title" id="title">
                    <th scope="col">#</th>
                    <th scope="col">標題</th>
                    <th scope="col">時間</th>
                    <th scope="col">分類</th>
                    <th scope="col">置頂</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody id="dataTable">
                <?php
                while ($row = mysql_fetch_row($result)) { ?>
                    <tr id="<?php echo $row[0]; ?>" class="dataRow">
                        <th scope="row" name="id"><?php echo $row[0]; ?></th>
                        <td name="title"><?php echo $row[1]; ?></td>
                        <td name="date"><?php echo $row[4]; ?></td>
                        <td name="category"><?php echo $row[5]; ?></td>
                        <td name="top"><?php echo ($row[6]) ? 'true' : 'false'; ?></td>
                        <td name="operations">
                            <form method="post" action="./postEditor.php">
                                <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
                                <input type="hidden" name="usage" value="edit">
                                <input class="btn btn-sm" type="image" name="edit" src="./images/edit_black_24dp.svg" />
                            </form>
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
                    <a class="page-link" href="./menu.php?usage=article&page=<?php echo ($page - 1 < 1) ?  $page :  $page - 1; ?>" id="previous">
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
                    <a class="page-link" href="./menu.php?usage=article&page=<?php echo ($page + 1 > $total) ?  $page :  $page + 1; ?>" id="next">
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
            $.post("./deletePost.php", {
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