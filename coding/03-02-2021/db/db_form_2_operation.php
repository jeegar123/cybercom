<?php

require 'database.php';

$tb_name = "form_2";



function addUser($user, &$is_checked)
{
    global $tb_name, $db;

    $sql_insert = "INSERT INTO $tb_name (first_name,password,gender,address,dob,games,martial_status,is_agree) 
    VALUES(?,?,?,?,?,?,?,?)";
   
    
    if ($stmt = mysqli_prepare($db, $sql_insert)) {
        mysqli_stmt_bind_param(
            $stmt,
            "ssssssii",
            $user['first_name'],
            $user['password'],
            $user['gender'],
            $user['address'],
            $user['dob'],
            $user['games'],
            $user['martial_status'],
            $user['is_agree']
        );
        
        mysqli_stmt_execute($stmt);
    
        $is_checked = true;
    }
    mysqli_close($db);
}
