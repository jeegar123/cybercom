<?php

use myclass\Database;

require './constants.php';
require '../class/Database.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if ($_POST['submit']) {
        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $phone = $_POST['phone'] ?? null;
        $created = $_POST['created'] ?? null;
        $title = $_POST['title'] ?? null;
        $id = $_POST['id'] ?? null;

    

        if (
            $name
            and $email
            and $phone
            and $id
            and $created
        ) {
            $data = array(
                'id' => $id,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'created' => $created,
                'title' => $title
            );
            $database = new Database($host, $username, $password, $db_name);
            $is_updated = $database->update($table_name, $data);
            echo  $is_updated;
            // exit();
            if ($is_updated == 2) {
                header("location:../contacts.php?i=2");
            } else if ($is_updated == -2) {
                header("location:../contacts.php?i=-2");
            } else if ($is_updated ) {
                header("location:../contacts.php?error=$is_updated");
            }
        }
    }
}
