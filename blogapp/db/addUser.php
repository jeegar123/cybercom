<?php

session_start();

use blogapp\useclass\Database;
use blogapp\useclass\FormValidation;

require '../class/Database.php';
require '../class/FormValidation.php';
require 'databaseConfig.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // form data
    $prefix = $_POST['prefix'] ?? null;
    $first_name = $_POST['first_name'] ?? null;
    $last_name = $_POST['last_name'] ?? null;
    $email = $_POST['email'] ?? null;
    $mobile_number = $_POST['mobile_number'] ?? null;
    $password = $_POST['password'] ?? null;
    $confirmpassword = $_POST['confirmpassword'] ?? null;
    $information = $_POST['information'] ?? null;
    $is_agree = $_POST['is_agree'] ?? null;


    // form validation
    $errors = [];
    $validation = new FormValidation();
    $user = [];

    if ($prefix) {
        $user['prefix'] = $prefix;
    } else {
        array_push($errors, "prefix is required");
    }

    if ($first_name) {
        if (!$first_name = $validation->validateName($first_name)) {
            array_push($errors, "invalid first name");
        } else {
            $user['first_name'] = $first_name;
        }
    } else {
        array_push($errors, "firstname is required");
    }

    if ($last_name) {
        if (!$last_name = $validation->validateName($last_name)) {
            array_push($errors, "invalid last name");
        } else {
            $user['last_name'] = $first_name;
        }
    } else {
        array_push($errors, "last is required");
    }

    if ($email) {
        if (!$email = $validation->validateEmail($email)) {
            array_push($errors, "email invalid");
        } else {
            $user['email'] = $email;
        }
    } else {
        array_push($errors, "email is required");
    }

    if ($mobile_number) {
        if (!$mobile_number = $validation->validateMobileNumber($mobile_number)) {
            array_push($errors, "mobile number is invalid");
        } else {
            $user['mobile'] = $mobile_number;
        }
    } else {
        array_push($errors, "mobile is required");
    }

    if ($password) {
        if ($confirmpassword and $password == $confirmpassword) {
            $user['password_hash'] = $validation->validatePassword($password);
        } else {
            array_push($errors, "password didn't match");
        }
    } else {
        array_push($errors, "password is required");
    }



    if ($information) {
        $user['information'] = $validation->validateString($information);
    } else {
        array_push($errors, "password is required");
    }


    if ($is_agree) {
        if (
            $is_agree == "checked" and
            count($errors) <= 0
            and count($user) == 7
        ) {
            $database = new Database($database_host, $datbase_username, $datbase_password, $database_name);
            $response = $database->addUser("user", $user);
            if ($response == 1) {
                $_SESSION['user'] = $user;
                $database->updateLoginTime("user",$user);
                header("location:../blogs/blogs.php");
                exit();
            } else {
                header("location:../register/register.php?error=$response");
                exit();
            }
        }
    } else {
        array_push($errors, "plz agree terms and condition");
    }
} else {
}
