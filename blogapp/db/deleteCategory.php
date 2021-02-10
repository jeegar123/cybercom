<?php

session_start();

use blogapp\useclass\Database;
use blogapp\useclass\FormValidation;

require '../class/Database.php';
require '../class/FormValidation.php';
require 'databaseConfig.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'] ?? null;


    if($id){
        
        $database = new Database($database_host, $datbase_username, $datbase_password, $database_name);
        echo $database->deleteById("category",$id);
    }

}
