<?php

require 'database.php';

$tb_name = "form_3";



function addUser($user, &$is_checked)
{
    global $tb_name, $db;

    $sql_insert = "INSERT INTO $tb_name (first_name,last_name,dob,gender,country,email,phone,password,is_agree) 
    VALUES(?,?,?,?,?,?,?,?,?)";
   
    
    if ($stmt = mysqli_prepare($db, $sql_insert)) {
        mysqli_stmt_bind_param(
            $stmt,
            "ssssssssi",
            $user['first_name'],
            $user['last_name'],
            $user['dob'],
            $user['gender'],
            $user['country'],
            $user['email'],
            $user['phone'],
            $user['password'],
            $user['is_agree']
        );
        
        mysqli_stmt_execute($stmt);
    
        $is_checked = true;
    }
    mysqli_close($db);
}
