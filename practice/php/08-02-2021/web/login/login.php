<?php
session_start();
    if(isset($_SESSION['login'])){
        header("location:../home/home.php");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">

</head>

<body>
    <div class="container">

        <?php
        if (isset($_GET['sucess'])) {
            $msg = $_GET['sucess'];
            @include '../include/success.inc.php';
        }
        if (isset($_GET['error'])) {
            $msg = $_GET['error'];
            @include '../include/error.inc.php';
        }
        ?>
        <h1 class="text-center">Login Here</h1>
        <form action="../db/checkUser.php" method="POST" onsubmit="return validateForm()">
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
            <input type="submit" value="Login" class="btn btn-primary">
        </form>

        <div class="text-center"><a href="../register/register.php">New User?Register Here</a></div>
    </div>



    <script src="home.js"></script>

</body>



</html>