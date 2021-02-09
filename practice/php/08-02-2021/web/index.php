<?php
session_start();
    if(isset($_SESSION['login'])){
        header("location:./home/home.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="./vendor/icons/fontawesome/css/all.css">
<link rel="stylesheet" href="./css/style.css">
</head>
<body>
   <nav class="navbar navbar-dark bg-info w-100">
       <div class="font-weight-bold d-inline-block header">CURD PRACTICE</div>
       <a class="mr-0 " id="login-a" href="./login/login.php">Login</a>
   </nav>
    <div class="conatiner">
        Welcome

    
    </div>
</body>
</html>