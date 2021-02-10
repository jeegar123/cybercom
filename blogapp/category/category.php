<?php



session_start();




if (!isset($_SESSION['user'])) {
    header("location:../index.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blogs</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">

</head>

<body>

    <nav class="navbar navbar-light bg-light justify-content-end">

        <a href="#" class="bg-success btn mr-1 ">Manage Category</a>
        <a href="#" class="bg-primary btn mr-1 ">My Profile</a>
        <a href="./logout.php" class="bg-danger btn  mr-1">logout</a>

    </nav>
    <?php

        if(isset($_GET['success'])){
            $msg=$_GET['success'];
            include '../includes/success.inc.php';
        }

    ?>


    <div class="container-fluid">
        <h1>Blog Catgeory</h1>
        <a name="" id="" class="btn bg-success" href="../category/add_category/add_category.php">Add Catgeory</a>
    </div>

    <div id="display-data">


    </div>

    <script src="../vendor/js/jquery.js"></script>
    <script src="./js/category.js"></script>
</body>

</html>