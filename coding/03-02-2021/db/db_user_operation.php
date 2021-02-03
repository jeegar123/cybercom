<?php

require 'database.php';

$tb_name = "users";



function addUser($user, &$is_added)
{
    global $tb_name, $db;

    $sql_insert = "INSERT INTO $tb_name (email,password)
    VALUES(?,?)";

    
    if ($stmt = mysqli_prepare($db, $sql_insert)) {
        mysqli_stmt_bind_param(
            $stmt,
            "ss",
            $user['email'],
            $user['password']
        );
        
        mysqli_stmt_execute($stmt);

        $is_added = true;
    }
    mysqli_close($db);
}
