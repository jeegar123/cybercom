<?php

require '../class/Database.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $id = $_GET['id'] ?? null;

    if ($id) {
        $database = new Database("localhost", "root", "", "questecom");
        if ($database->deleteCategoryById($id) == 1) {
            header('location:../category/index.php?sucess=1');
            exit();
        } else {
            header('location:../category/index.php?error=not deleted');
            exit();
        }
    }
}
