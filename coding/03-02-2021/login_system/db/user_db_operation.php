<?php

require 'database.php';

$tb_name = "login";



function addUser($user, &$is_user_added)
{
    global $tb_name, $db;

    $sql_insert = "INSERT INTO $tb_name (user_name,password)
    VALUES(?,?)";


    if ($stmt = mysqli_prepare($db, $sql_insert)) {
        mysqli_stmt_bind_param(
            $stmt,
            "ss",
            $user['username'],
            $user['password']
        );

        mysqli_stmt_execute($stmt);
        $is_user_added = true;
    }
    mysqli_close($db);
}


function checkUser($user)
{
    global $tb_name, $db;

    $sql_select = "SELECT * FROM $tb_name WHERE user_name = '$user[username]'";

    if ($results = mysqli_query($db, $sql_select)) {
        if (mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_row($results);
            if (password_verify($user['password'], $row[2]))
                return true;
        }
    }
    return false;
}
