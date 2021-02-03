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


function deleteUser($id)
{
    global $tb_name, $db;

    $sql_delete = "DELETE FROM $tb_name WHERE id = $id";
    $user = getOneUser($id);
    $file_path = $user[7];
    unlink($file_path);
    if (mysqli_query($db, $sql_delete)) {
        return true;
    }
    return false;
}


function getOneUser($id)
{
    global $tb_name, $db;

    $sql_select_one_user = "SELECT * FROM $tb_name WHERE id  = $id";
    $user = null;
    $results = mysqli_query($db, $sql_select_one_user);

    if ($results) {
        if (mysqli_num_rows($results)) {
            $user = mysqli_fetch_row($results);
        }
    }
    return $user;
}

function updateUser($user, $id, &$is_user_updated)
{
    global $tb_name, $db;

    $sql_update = "UPDATE $tb_name SET name = ? ,password = ? , address = ? , games = ?  ,gender = ? ,
    age = ? ,file_path = ? WHERE id = ? ";

    if ($stmt = mysqli_prepare($db, $sql_update)) {
        mysqli_stmt_bind_param(
            $stmt,
            "sssssisi",
            $user['fullname'],
            $user['password'],
            $user['address'],
            $user['games'],
            $user['gender'],
            $user['age'],
            $user['file_path'],
            $id
        );
        mysqli_stmt_execute($stmt);
        $is_user_updated = true;
        mysqli_close($db);
    }
}


function viewLimitedUsers($row_count)
{
    global $tb_name, $db;

    $users = [];

    $sql_select = "select * from $tb_name LIMIT 0,$row_count";

    if ($results = mysqli_query($db, $sql_select)) {
        if (mysqli_num_rows($results) >= 1) {
            $users = mysqli_fetch_all($results);
        }
    }
    return $users;
}



function viewInRangeUsers($offoset, $row_count)
{
    global $tb_name, $db;

    $users = [];

    $sql_select = "select * from $tb_name LIMIT $offoset , $row_count";

    if ($results = mysqli_query($db, $sql_select)) {
        if (mysqli_num_rows($results) >= 1) {
            $users = mysqli_fetch_all($results);
        }
    }
    return $users;
}


function searchUsersByName($name)
{
    global $tb_name, $db;

    $users = [];

    $sql_select = "select * from $tb_name WHERE name LIKE  '%$name%'";
    

    if ($results = mysqli_query($db, $sql_select)) {
        if (mysqli_num_rows($results) >= 1) {
            $users = mysqli_fetch_all($results);
        }
    }
    return $users;
}
