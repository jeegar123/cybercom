<?php
// start session
session_start();
// set default timezone to india
date_default_timezone_set('Asia/kolkata');
// get data from login form
$username = $_POST['username'] ?? null;
$password = $_POST['userPassword'] ?? null;

//  if user is valid then move to home.php and store login timestamp in session
if ($username and $password) {
    $current_time = time();
    $_SESSION['login'] = "$username  login at  " . date('M d Y H:i:s', $current_time);
    $_SESSION['username'] = $username;
    header('location:home.php');
}

if($_SESSION['logout']??0){
    echo $_SESSION['logout'];
}


?>






<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="email" name="username" id="username" required>
    <input type="password" name="userPassword" id="userPassword" required>
    <button id="btnLogin">Login</button>
</form>