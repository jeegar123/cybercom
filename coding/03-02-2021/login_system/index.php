<?php

session_start();

if(isset($_SESSION['login_username'])){
   header("location:home.php") ;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <?php

        include 'error.inc.php';
        ?>
        <!-- login page -->
        <h1 class="text-center">login Page</h1>
        <form action="./core/check_user.php" method="post">
            <div class="form-group">
                <label for="">Username</label>
                <input type="email" class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="" required>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="" maxlength="8" required>
                <small id="helpId" class="form-text text-muted">Maximum 8 length</small>
            </div>
            <input type="submit" value="login" class="btn btn-primary">
        </form>
        <div class="text-center">
            <a href="./registration.php">click here to Register here</a>
        </div>

    </div>

</body>

</html>