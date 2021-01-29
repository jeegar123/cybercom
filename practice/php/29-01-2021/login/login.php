<?php


session_start();

// check if user already login then redirect to home.php

if (isset($_SESSION['username'])) {
    header('location:home.php');
}

// if(isset($_SESSION['logout_time'])){
//     echo $_SESSION['logout_time'];                   // not needed
// }

date_default_timezone_set('Asia/kolkata');

// form data
$username = $_POST['username'] ?? null;
$password = $_POST['userPassword'] ?? null;
$rememberme = $_POST['rememberme'] ?? null;


$cookie_username = $_COOKIE['rememberme'] ?? null;




if ($username and $password) {
    $_SESSION['login_time'] =  date("M D Y H:i:s", time());
    $_SESSION['username'] = $username;

    if ($rememberme) {
        // set cookie
        setcookie('rememberme', $username, time() + strtotime('+1 day'));
        // unset cookie
        // setcookie('rememberme', $username, 1);
    }
    header('location:home.php');
}


?>




<form method="POST">
    <input type="email" name="username" id="username" required placeholder="Email" value="<?= $cookie_username?>">
    <input type="password" name="userPassword" id="userPassword" required placeholder="Password">
    <input type="checkbox" name="rememberme">rememeber me
    <button id="btnLogin">Login</button>
</form>