<?php

session_start();

echo  $_SESSION['login'];

if (isset($_GET['logout'])) {
    $current_time = time();
    $_SESSION['logout'] = $_SESSION['username'] . " logout at " . date('M d Y H:i:s', $current_time);
    header('location:login.php');
}

?>





<form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
    <input type="submit" value="logout" name="logout">
</form>