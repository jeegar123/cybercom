<?php

use adapters\CategoryAdapter;

require '../adapters/CategoryAdapter.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $id = $_GET['id'] ?? null;

    if ($id) {
        $adapter = new CategoryAdapter();
        if ($adapter->deleteCategory($id) == 1) {
            header('location:../category/category.php?sucess=1');
            exit();
        } else {
            header('location:../category/category.php?error=not deleted');
            exit();
        }
    }
}
