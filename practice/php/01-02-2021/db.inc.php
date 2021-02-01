<?php


// db config
$host = "localhost";
$username = "root";
$password = "";
$db = "trainning_db";


$database = @mysqli_connect($host, $username, $password, $db) or
    die('could not connect database' . mysqli_connect_errno());
