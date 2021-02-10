<?php

session_start();

use blogapp\useclass\Database;
use blogapp\useclass\FormValidation;

require '../class/Database.php';
require '../class/FormValidation.php';
require 'databaseConfig.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;

    $erros_msg = [];

    $formValidation = new FormValidation();
    $userData = [];

    // server validation
    if ($username) {
        if ($username = $formValidation->validateEmail($username)) {
            $userData['email'] = $username;
        } else {
            array_push($erros_msg, "plz enter valid username");
        }
    } else {
        array_push($erros_msg, "plz enter username");
    }

    if ($password) {
        if ($password = $formValidation->validatePassword($password)) {
            $userData['password_hash'] = $password;
        } else {
            array_push($erros_msg, "plz enter valid username");
        }
    } else {
        array_push($erros_msg, "plz enter username");
    }


    if (count($erros_msg) >= 1) {
        // redirect to login with message
    } else {
        // go to database
        $database = new Database($database_host, $datbase_username, $datbase_password, $database_name);
        $response = $database->checkUser("user", $userData);
        $messgae = "";
        if ($response == 0) {
            $messgae = "username not found";
        } else if ($response == -1) {
            $messgae = "password is incorrect";
        } else {
            // store in session
            $_SESSION['user'] = $response;
            $database->updateLoginTime("user", $response);
            header("location:../blogs/blogs.php");
            exit();
        }

        header("location:../index.php?error=$messgae");
        exit();
    }
} else {
    // redirect to error page
}
