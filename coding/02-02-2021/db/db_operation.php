<?php


require 'database.php';

$tb_name = "user_details";





function addUser($user, &$is_checked)
{
    global $tb_name, $db;

    // simple statement
    // $sql_insert = "INSERT INTO $tb_name (name,password,address,games,gender,age,file_path) VALUES(
    //     '$user[fullname]',
    //     '$user[password]',
    //     '$user[address]',
    //     '$user[games]',
    //     '$user[gender]',
    //     '$user[age]',
    //     '$user[file_path]'
    //     )";
    // $results = mysqli_query($db, $sql_insert);

    // prepared statement
    $sql_insert = "INSERT INTO $tb_name (name,password,address,games,gender,age,file_path) 
    VALUES(?,?,?,?,?,?,?)";

    if ($stmt = mysqli_prepare($db, $sql_insert)) {
        mysqli_stmt_bind_param(
            $stmt,
            "sssssis",
            $user['fullname'],
            $user['password'],
            $user['address'],
            $user['games'],
            $user['gender'],
            $user['age'],
            $user['file_path']
        );
        mysqli_stmt_execute($stmt);

        $is_checked = true;
    }
    mysqli_close($db);
}


function viewAllUsers()
{
    global $tb_name, $db;
    
    $users = [];

    $sql_select = "select * from $tb_name";

    if ($results = mysqli_query($db, $sql_select)) {
        if (mysqli_num_rows($results) >= 1) {
            $users = mysqli_fetch_all($results);
        }
    }
    return $users;
}


function deleteUser($id){
    global $tb_name, $db;

    $sql_delete ="DELETE FROM $tb_name WHERE id = $id";

    if(mysqli_query($db,$sql_delete)){
        return true;
    }
    return false;

        
}