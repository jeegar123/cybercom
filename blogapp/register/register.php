<?php


session_start();


if (isset($_SESSION['user'])) {
    header("location../blogs/blogs.php");
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
    <title>register</title>
    <link rel="stylesheet" href="../vendor//bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">

        <?php
        if ($msg)
            include '../includes/error.inc.php';
        ?>

        <h1 class="text-center">Register</h1>
        <form action="../db/addUser.php" method="post" onsubmit="return validateForm()">
            <div class="form-inline">
                <label>Prefix</label> 
                <select name="prefix" id="prefix">
                    <option value=""></option>
                    <option value="mr">Mr</option>
                    <option value="mrs">Mrs</option>
                </select><span class="alert-danger error" id="error-prefix"></span>
            </div>
            <div class="form-inline">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control col-4"><span class="alert-danger error" id="error-first_name"></span>
            </div>
            <div class="form-inline">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control col-4"><span class="alert-danger error" id="error-last_name"></span>
            </div>
            <div class="form-inline">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control col-4"><span class="alert-danger error" id="error-email"></span>
            </div>
            <div class="form-inline">
                <label for="mobile_number">Mobile Number</label>
                <input type="tel" name="mobile_number" id="mobile_number" class="form-control col-4"><span class="alert-danger error" id="error-mobilenumber"></span>
            </div>

            <div class="form-inline">
                <label for="password">Password</label>
                </span>
                <input type="password" name="password" id="password" class="form-control" class="form-control col-4"><span class="alert-danger error" id="error-password">
            </div>
            <div class="form-inline">
                <label for="confirmpassword">Confirm Password</label>
                <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" class="form-control col-4"><span class="alert-danger error" id="error-confirmpassword"></span>
            </div>
            <div class="form-inline mt-2">
                <label for="information">Information</label>
                <textarea cols="30" id="information" name="information"></textarea><span class="alert-danger error" id="error-information"></span>
            </div>
            <div class="form-inline">
                <input type="checkbox" name="is_agree" id="is_agree" value="checked">
                Hereby,I Accept terms & Conditions<span class="alert-danger error" id="error-is_agree"></span>
            </div>

            <input type="submit" value="SUBMIT" class="btn btn-primary">



        </form>



    </div>

    <script src="./register.js"></script>

</body>

</html>