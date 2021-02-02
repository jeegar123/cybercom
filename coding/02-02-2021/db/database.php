<?php


$host = "localhost";
$username = "admin";
$password = "admin123";
$db_name = "trainning_db";

$db = mysqli_connect($host, $username, $password,$db_name) or die('could not connect database ' . mysqli_connect_errno());


// function createDB()
// {
//     global $db, $db_name;
//     $sql_create_db = "CREATE DATABASE $db_name";
//     if (mysqli_query($db, $sql_create_db)) {
//         createTable();
//     }
// }


// function createTable()
// {
//     global $db;
    // $sql_create_table = "CREATE TABLE `user_details` (
    //     `id` int(11) NOT NULL,
    //     `name` varchar(40) NOT NULL,
    //     `password` text NOT NULL,
    //     `address` text NOT NULL,
    //     `games` text NOT NULL,
    //     `gender` varchar(6) NOT NULL,
    //     `age` tinyint(4) NOT NULL,
    //     `file_path` text NOT NULL
    //   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
//     if ($db=mysqli_query($db, $sql_create_table)) {
//              
//     }
// }
// @createDB();
// @createTable();
