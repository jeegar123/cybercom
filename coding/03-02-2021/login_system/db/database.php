<?php


$host = "localhost";
$username = "admin";
$password = "admin123";
$db_name = "trainning_db";

$db = @mysqli_connect($host, $username, $password, $db_name) or die('could not connect database ' . mysqli_connect_errno());
