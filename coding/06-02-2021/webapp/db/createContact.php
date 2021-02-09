<?php

use myclass\Database;

require './constants.php';
require '../class/Database.php';

date_default_timezone_set("Asia/kolkata");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if ($_POST['submit']) {
        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $phone = $_POST['phone'] ?? null;
        $created = $_POST['created'] ?? null;
        $title = $_POST['title'] ?? null;
        // $id = $_POST['id'] ?? null;


        if (
            $name
            and $email
            and $phone
        ) {
            $data = array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'created' => date('Y-m-d H:m:s', time()),
                'title' => $title
            );
            $database = new Database($host,$username,$password,$db_name);
            $is_added = $database->insert($table_name, $data);
            if ($is_added==1) {
                 header("location:../contacts.php?i=1");
            } else if ($is_added == -1) {
                header("location:../contacts.php?i=-1");
            } else {
                 header("location:../contacts.php?error=$is_added");
            }
        }
    }
}else{
    header('location:../error.html');
}
