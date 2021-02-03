<?php

require 'database.php';

$tb_name = "contact_us";



function addUser($user, &$is_added)
{
    global $tb_name, $db;

    $sql_insert = "INSERT INTO $tb_name (name,email,subject,message)
    VALUES(?,?,?,?)";

    
    if ($stmt = mysqli_prepare($db, $sql_insert)) {
        mysqli_stmt_bind_param(
            $stmt,
            "ssss",
            $user['name'],
            $user['email'],
            $user['subject'],
            $user['message'],
        );
        
        mysqli_stmt_execute($stmt);

        $is_added = true;
    }
    mysqli_close($db);
}
