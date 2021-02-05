<?php

// already created database class in this directory
require '../../../04-02-2021/oop/class/Database.php';





$host="localhost";
$username="admin";
$password="admin123";
$db_name= "trainning_db";

$table_name ="ajax_users";



$database = new Database($host,$username,$password,$db_name);


