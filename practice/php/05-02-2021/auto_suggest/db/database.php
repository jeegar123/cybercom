<?php
// already created database class in this directory
require '../../../04-02-2021/oop/class/Database.php';





$host="localhost";
$username="admin";
$password="admin123";
$db_name= "trainning_db";
$table_name ="names";
$coloumn_name ="name";


$database = new Database($host,$username,$password,$db_name);


if(isset($_GET['name'])){
    $search_name = $_GET['name'];
    
    echo json_encode($database->selectByString($table_name,$coloumn_name,$search_name));
     
}



