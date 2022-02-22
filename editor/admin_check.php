<?php
session_start();

if (isset($_POST['usage'])) {
    if ($_POST['usage'] == 'verify') {
        include 'utils.php';
        $user = trim($_POST['user']);
        $password = trim($_POST['password']);
        $link = sql_connect();

        $sql = "SELECT password FROM ce_admin WHERE user='$user';";
        $result = mysqli_query($link, $sql);
        if(!$result) exit('error');
        
        $row = mysqli_fetch_array($result);
        var_dump($row);
        if(password_verify($password, $row['password'])){ //Password correct
           $_SESSION['admin'] = true;
           $_SESSION['user'] = $user; 
           header('Location: https://ce.ntpu.edu.tw/editor/');
           exit();
        }else{ //Password wrong
           echo("帳號或密碼錯誤");
           ?>
            <script>
                setTimeout(function(){
                    window.location.href = "./menu.php";
                }, 1500);
            </script>
           <?php
        }
    }
} else {
    //If not admin login or available
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
?>
        <div style="transform: translateY(30vh)">
            <h3 class="text" style="font-size: 36px;" align="center">後臺文章管理系統 <br />登入頁面</h3>
            <div align="center" class="" style="padding-right: 40%; padding-left: 40%;">
                <form method="post" action="./admin_check.php">
                    <input type="text" class="form-control mb-2" placeholder="帳號" name="user" required>
                    <input type="password" class="form-control" placeholder="密碼" name="password" required>
                    <input type="hidden" name="usage" value="verify">
                    <input type="submit" class="btn btn-primary mt-3" align="center" value="登入">
                </form>
            </div>
        </div>
<?php
        exit();
    }
}
?>