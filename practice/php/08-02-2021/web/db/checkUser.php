<?php
session_start();

require '../class/Database.php';
require '../class/User.php';
require './constants.php';

use myclass\Database;
use myclass\FormValidation;
use myclass\User;


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;
    $validation = new FormValidation();


    if ($username and $password) {
        $datbase = new Database($host, $sql_username, $sql_password, $db_name);


        $result = $datbase->selectOneByColumn("users_1", "username", $username, "s");

        if (!$result) {
            header("location:../login/login.php?error=invalid username");
        } else {
            if (User::verifyPassword($password, $result['password'])) {
                $_SESSION['login'] = "$username loginlogin AT " . date('Y-m-d H:m:s');
                header("location:../home/home.php");
            } else {
                header("location:../login/login.php?error=invalid password");
            }
        }
    }
} else {
    // 
}
