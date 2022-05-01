<?php
session_start();

unset($_SESSION['user']);
unset($_SESSION['admin']);

?>
<script>
    window.location.href = "./index.php";
</script>