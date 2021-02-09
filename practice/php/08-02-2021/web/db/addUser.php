<?php

session_start();

require '../class/Database.php';
require '../class/User.php';
require './constants.php';


use myclass\Database;
use myclass\FormValidation;
use myclass\User;





if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $datbase = new Database($host, $sql_username, $sql_password, $db_name);

    $validation = new FormValidation();



    $firstname = $_POST['firstname'] ?? null;
    $lastname = $_POST['lastname'] ?? null;
    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;
    // $confirmPassword = $_POST['confirmpassword'] ?? null;
    $dob = $_POST['dob'] ?? null;

    $errors = [];
    $user = new User();


    if (!$firstname = $validation->validateName($firstname)) {
        $errors['error-firstname'] = "invalid firstname";
    } else {
        $user->firstName = $firstname;
    }

    if (!$lastname = $validation->validateName($lastname)) {
        $errors['error-lastname'] = "invalid lastname";
    } else {
        $user->lastName = $lastname;
    }


    if (!$username = $validation->validateEmail($username)) {
        $errors['error-username'] = "invalid username";
    } else {
        $user->userName = $username;
    }

    if (!$password = $validation->validatePassword($password)) {
        $errors['error-password'] = "invalid password";
    } else {
        $user->password = $password;
    }

    if ($dob != null) {
        $user->dob = $dob;
    } else {
        $errors['error-dob'] = "dob is required";
    }


    if (count($errors) >= 1) {
        print_r($errors);
        $_SESSION['errors'] = $errors;
        $_SESSION['user'] = $user;
        header("location:../register/register.php");
    } else {
        $response = $datbase->insert(" users_1", $user);
        if ($response == 1) {
            header("location:../login/login.php?sucess=user added");
        } else {
            header("location:../register/register.php?error=".$response);            
        }
    }
} else {
    echo "could not find";
}
