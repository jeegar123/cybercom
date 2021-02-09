<?php
session_start();

require '../class/User.php';


if (isset($_SESSION['login'])) {
    header("location:../home/home.php");
}



$errors = null;
// $user=null;
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    // $user =$_SESSION['user'];
    unset($_SESSION['errors']);
    unset($_SESSION['user']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/icons/fontawesome/css/all.css">
</head>

<body>
    <div class="container">
        <?php
        if (isset($_GET['error'])) {
            $msg = $_GET['error'];
            @include '../include/error.inc.php';
        }
        ?>
        <h1 class="text-center">Register Here</h1>
        <form action="../db/addUser.php" method="POST" class="mt-5" onsubmit="return formvalidate()">

            <div class="row">
                <div class="form-group col">
                    <label for="firstname">First Name</label><span class="alert-danger mt-5 error" id="error-firstname"><?= isset($errors['error-firstname']) ? $errors['error-firstname'] : "" ?></span>
                    <input type="text" name="firstname" id="firstname" class="form-control">
                </div>
                <div class="form-group col">
                    <label for="lastname">Last Name</label><span class="alert-danger ml-1 error" id="error-lastname"><?= isset($errors['error-lastname']) ? $errors['error-lastname'] : "" ?></span>
                    <input type="text" name="lastname" id="lastname" class="form-control">
                </div>

            </div>


            <div class="form-group">
                <label for="username">Username</label><span class="alert-danger mt-5 error" id="error-username">
                    <?= isset($errors['error-username']) ? $errors['error-username'] : "" ?>
                </span>
                <input type="email" name="username" id="username" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password</label><span class="alert-danger mt-5 error" id="error-password">
                    <?= isset($errors['error-password']) ? $errors['error-firstname'] : "" ?>
                </span>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="confirmpassword">Confirm Password</label><span class="alert-danger mt-5 error" id="error-confirm-password"></span>
                <input type="password" name="confirmpassword" id="confirmpassword" class="form-control">
            </div>
            <div class="form-group">
                <label for="dob">BirthDate</label><span class="alert-danger mt-5 error" id="error-dob">
                    <?= isset($errors['error-firstname']) ? $errors['error-dob'] : "" ?>
                </span>
                <input type="date" name="dob" id="dob" class="form-control">
            </div>
            <input type="submit" value="Regsiter" class="btn btn-primary">
        </form>
        <a href="../login/login.php" class="d-flex justify-content-center">Already Register?click here</a>
    </div>

    <script src="./register.js"></script>
</body>

</html>