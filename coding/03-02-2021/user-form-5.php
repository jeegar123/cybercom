<?php


require './db/db_user_operation.php';;
require './validation/validation.php';


$username = $password = null;
$userData = [];
$is_added = false;
$error_message = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    // validate data
    if ($username) {
        if ($email = validateEmail($username)) {
            $userData['email'] = $username;
        } else {
            array_push($error_messages, '*email is invalid');
        }
    } else {
        array_push($error_messages, '*email is required');
    }


    if ($password) {
        if ($password = validatePassword($password)) {
            $userData['password'] = password_hash($password, PASSWORD_DEFAULT);
        } else {
            array_push($error_message, '*password is invalid');
        }
    } else {
        array_push($error_message, '*password is required');
    }

    if (count($userData) == 2) {
        addUser($userData, $is_added);
    }
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
    <div class="error">
        <?php
        if ($error_message) {
            echo "<ul>";
            foreach ($error_message as  $message) {
                echo "$message<br>";
            }
            echo "</ul>";
        }
        ?>
    </div>
    <div class="success">
        <?php

        if ($is_added) {
            echo "user added in database";
        }
        ?>
    </div>
    <div class="body">
        <div class="header">
            <img src="https://img.icons8.com/metro/26/ffffff/lock-2.png" /> Sign In
        </div>
        <form action="" method="post">
            <label for="email">E-mail address</label>
            <input type="email" name="email" id="email" placeholder="mail@address.com">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="*********" maxlength="8">
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
    <a href="./index.php">Go back</a>
    <script src="./js/user-form-5.js"></script>
</body>

</html>