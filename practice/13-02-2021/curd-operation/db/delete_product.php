<?php

require '../class/Database.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $id = $_GET['id'] ?? null;

    if ($id) {
        $database = new Database("localhost", "root", "", "questecom");
        if ($database->deleteProductById($id) == 1) {
            header('location:../product/index.php?sucess=1');
            exit();
        } else {
            header('location:../product/index.php?error=notdeleted');
            exit();
        }
    }
}
