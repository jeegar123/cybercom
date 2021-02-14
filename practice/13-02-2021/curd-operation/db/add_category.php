<?php

require '../class/Category.php';
require '../class/Database.php';


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = $_POST['name'] ?? null;
    $discription = $_POST['description'] ?? null;
    $id = $_POST['id'] ?? null;


    if (
        $name
        and $discription
    ) {
        $category = new Category($name, false, $discription);
        $database = new Database("localhost", "root", "", "questecom");
        if ($id) {
            $category->categoryId = $id;
            if ($result = $database->updateCategory($category) == 1) {
                header('location:../category/index.php?sucess=1');
                exit();
            } else {
                header('location:../category/index.php?error=' . $result);
                exit();
            }
        } else {

            if ($result = $database->insertCategory($category) == 1) {
                header('location:../category/index.php?sucess=1');
                exit();
            } else {
                header('location:../category/add_customer.php?error=' . $result);
                exit();
            }
        }
    }
}
