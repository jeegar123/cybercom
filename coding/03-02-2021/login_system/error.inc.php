<?php


if(isset($_SESSION['failed'])){
    echo "<div class='alert alert-danger'>";
    echo $_SESSION['failed'];
    echo "</div>";
    unset($_SESSION['failed']);
}
?>


