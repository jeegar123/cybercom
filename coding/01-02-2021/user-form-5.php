<?php
$username = $password = null;

if (isset($_SERVER['REQUEST_METHOD']) == "POST") {

    $username = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form-5</title>
    <link rel="stylesheet" href="./css/user-form-5.css">
</head>

<body>

    <div class="body">
        <div class="header">
        <img src="https://img.icons8.com/metro/26/ffffff/lock-2.png"/>   Sign In
        </div>
        <form action="" method="post">
            <label for="email">E-mail address</label>
            <input type="email" name="email" id="email" placeholder="mail@address.com">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="*********">
            <input type="submit" value="sign in">

        </form>
    </div>


    <div>
        <?php
        if ($username and $password) {
            echo "Your Logins credentials<br>";
            echo  "Your username is $username<br>";
            echo "Your Password is $password";
        }
        ?>
    </div>
<script src="./js/user-form-5.js"></script>
</body>

</html>