<?php

session_start();

if (isset($_SESSION['user'])) {
    header("location:./blogs/blogs.php");
}


$msg = null;

if (isset($_GET['error'])) {
    $msg = $_GET['error'];
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="./vendor//bootstrap/css/bootstrap.min.css">
</head>

<body>

    <div class="conatiner">
        <?php
        if ($msg)
            include './includes/error.inc.php';
        ?>

        <div class="text-center">
            <img src="./vendor/images/cybercom creation_logo.ico" alt="cybercom creation logo">
        </div>
        <h1 class="text-center">LOGIN</h1>
        <div class="row dflex justify-content-center">

            <div class="col-8">
                <form action="./db/checkUser.php" method="POST" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="email" name="username" id="username" class="form-control">
                        <span class="alert-danger mt-5 error" id="error-username"></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                        <span class="alert-danger mt-5 error" id="error-password"></span>
                    </div>

                    <input type="submit" value="Login" class="btn btn-primary col-3">
                    <a type="submit" class="btn btn-primary col-3" href="./register/register.php">Register</a>

                </form>
            </div>

        </div>
    </div>

    <script src="./js/index.js"></script>
</body>

</html>