
<?php 
function generatePagination($totalPage, $currentPage, $main_url, $paramName){
    echo '<div class="pagination">';
    if($totalPage <= 5){ //EX 1 2 3
        for($i = 1; $i <= $totalPage; $i++){ // For metch to current page, so i=1
            $url = $main_url."?".$paramName."=$i";
            if($currentPage == $i){
                echo "<a href='$url' class='page active'>$i</a>";
            }else{
                echo "<a href='$url' class='page'>$i</a>";
            }
        }
    }else{
        if($currentPage > 3){ //EX 2 3 4 5 6
            for($i = $currentPage-2; $i <= $currentPage+2; $i++){
                $url = $main_url."?".$paramName."=$i";
                if($currentPage == $i){
                    echo "<a href='$url' class='page active'>$i</a>";
                }else{
                    echo "<a href='$url' class='page'>$i</a>";
                }
            }
        }else{ //EX 1 2 3 4 5
            for($i = 1; $i <= 5; $i++){ // For metch to current page, so i=1
                $url = $main_url."?".$paramName."=$i";
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