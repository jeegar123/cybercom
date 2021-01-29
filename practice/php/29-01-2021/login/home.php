<?php


session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");
}

$username =$_SESSION['username']??null;

if($username){
    echo "Welcome <b>".explode('@',$username)[0]."</b>, and You login at ".$_SESSION['login_time'];
}else{
    header('location:login.php');
}


?>


<form action="logout.php" method="get">
    <input type="submit" value="logout">
</form>