<?php


require 'database.php';
require '../../../04-02-2021/oop/class/Validation.php';



function addUser($name, $username, $password)
{
    global $database, $table_name;
    $validation = new FormValidation();

    $name = $validation->validateFullName($name);
    $username = $validation->validateEmail($username);
    $password = $validation->validateAndSecurePassword($password);


    if (
        $name
        and $username
        and $password
    ) {

        $data = array(
            'name' => $name,
            'username' => $username,
            'password' => $password
        );
        return $database->insert($table_name, $data);
    }
}


function getAllUser(){
    global $database, $table_name;
    
    return $database->select($table_name);
}
