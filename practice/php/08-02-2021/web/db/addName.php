<?php
session_start();


require '../class/Database.php';
require './constants.php';


use myclass\Database;
use myclass\FormValidation;


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $user = $_SESSION['user'];
    $nameInput = $_POST['name'];

    $datbase = new Database($host, $sql_username, $sql_password, $db_name);
    $validation = new FormValidation();

    if ($nameInput = $validation->validateName($nameInput)) {
        $data = [
            'name' => $nameInput,
            'user_id' => $user['id']
        ];

        echo $datbase->insert_name("names_1", $data);
    } else {
        echo "invalid name";
    }
} else {
}
