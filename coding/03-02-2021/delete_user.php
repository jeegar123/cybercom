<?php


require './db/db_operation.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    if (deleteUser($id)) {
        header("location:view-all-users.php");
    }
}
