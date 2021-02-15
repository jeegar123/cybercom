<?php

use adapters\CategoryAdapter;
use models\Category;
require '../adapters/CategoryAdapter.php';
require '../model/Category.php';



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = $_POST['name'] ?? null;
    $discription = $_POST['description'] ?? null;
    $id = $_POST['id'] ?? null;


    if (
        $name
        and $discription
    ) {
        $category = new Category($name, false, $discription);
        $adapter = new CategoryAdapter();

        if ($id) {
            $category->categoryId = $id;
            if ($result = $adapter->updateCategory($category) == 1) {
                header('location:../category/category.php?sucess=1');
                exit();
            } else {
                header('location:../category/category.php?error=' . $result);
                exit();
            }
        } else {

            if ($result = $adapter->insert($category) == 1) {
                header('location:../category/category.php?sucess=1');
                exit();
            } else {
                header('location:../category/add_customer.php?error=' . $result);
                exit();
            }
        }
    }
}
