<?php


session_start();

// $_SESSION['logout_time'] =  explode('@',$_SESSION['username'])[0] . ' logout at ' . date("M D Y H:i:s", time());

unset($_SESSION['username']);
unset($_SESSION['loginTime']);

header('location:login.php');
