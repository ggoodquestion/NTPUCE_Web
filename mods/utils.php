<?php
// Connection
function sql_connect(){
    $dbuser = "ntpuce";
    $dbpassword = "Cq2FprT6";
    $dbname = "ceweb";
    $host = "127.0.0.1";

    $link = mysqli_connect($host, $dbuser, $dbpassword, $dbname);
    if(!$link){
        echo(mysqli_connect_error());
        exit("Connection failed.");
    }
    return $link;
}

function sql_disconnect(&$link){
    mysqli_close($link);
}

// Select
function sql_query($link, $sql){
    $result = mysql_query($sql);
    if(!$result) exit(mysqli_error($link));
    return $result;
}

function sql_fetch($result){
    if($result){
        $row = mysqli_fetch_array($result);
    }else{
        $row = false;
    }
    return $row;
}

function ids2Mods($data, $link)
{
    $ids = explode(",", $data);
    $res = '';
    foreach ($ids as $id) {
        $sql = "SELECT * FROM mods WHERE id=$id;";
        $result = sql_query($link, $sql);
        $row = sql_fetch($result);
        $res .= $row['name'] . ',';
    }
    $res = substr($res, 0, strlen($res) - 1);
    return $res;
}

function id2Class($data, $link)
{
    if (empty($data)) return; // To be insure $data is not empty
    $sql = "SELECT * FROM class WHERE id=$data;";
    $result = sql_query($link, $sql);
    $row = sql_fetch($result);
    $res = $row['title'];
    return $res;
}

function generatePagination($totalPage, $currentPage, $main_url, $paramName){
    echo '<div class="pagination">';
    if($totalPage <= 5){ //EX 1 2 3
        for($i = 1; $i <= $totalPage; $i++){ // For metch to current page, so i=1
            $url = $main_url."&".$paramName."=$i";
            if($currentPage == $i){
                echo "<a href='$url' class='page active'>$i</a>";
            }else{
                echo "<a href='$url' class='page'>$i</a>";
            }
        }
    }else{
        if($currentPage > 3){ //EX 2 3 4 5 6
            for($i = $currentPage-2; $i <= $currentPage+2; $i++){
                $url = $main_url."&".$paramName."=$i";
                if($currentPage == $i){
                    echo "<a href='$url' class='page active'>$i</a>";
                }else{
                    echo "<a href='$url' class='page'>$i</a>";
                }
            }
        }else{ //EX 1 2 3 4 5
            for($i = 1; $i <= 5; $i++){ // For metch to current page, so i=1
                $url = $main_url."&".$paramName."=$i";
                if($currentPage == $i){
                    echo "<a href='$url' class='page active'>$i</a>";
                }else{
                    echo "<a href='$url' class='page'>$i</a>";
                }
            }
        }
    }
    echo '</div>';
}
?>