<?php

use myclass\Database;

require './constants.php';
require '../class/Database.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'] ?? null;

    if ($id != null) {
        $database = new Database($host, $username, $password, $db_name);
        $is_added = $database->delete($table_name, $id);

       echo $is_added;
    }
}
