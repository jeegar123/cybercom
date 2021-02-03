<?php


session_start();

require '../db/user_db_operation.php';
require 'validation.php';




if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    $error_messages = [];

    $user = [];


    if ($username) {
        if ($username = validateEmail($username)) {
            // valid username
            $user['username'] = $username;
        } else {
            array_push($error_messages, "invalid username ");
        }
    } else {
        array_push($error_messages, "username is required");
    }

    if ($password) {
        if ($password = validatePassword($password)) {
            // valid password
            $user['password'] = $password;
        } else {
            array_push($error_messages, "invalid password ");
        }
    } else {
        array_push($error_messages, "password is required");
    }


    if (count($user) == 2) {
        if (checkUser($user)) {
            header("location:../home.php");
            $_SESSION['login_username']=$user['username'];
            exit();
        } else {
            $_SESSION['failed']="Sorry Invalid User";
            header("location:../index.php");
            exit();
        }
    }
}
