<?php


session_start();

use blogapp\useclass\Database;
use blogapp\useclass\FormValidation;

require '../class/Database.php';
require '../class/FormValidation.php';
require 'databaseConfig.php';



if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;
    $url = $_POST['url'] ?? null;
    $meta_title = $_POST['meta_title'] ?? null;
    $parent_category = $_POST['parent_category'] ?? null;
    $image = $_FILES['image'];


    if (
        $title
        and $content
        and $url
        and $meta_title
        and $parent_category
        and $image
    ) {
        $database = new Database($database_host, $datbase_username, $datbase_password, $database_name);
        $upload_path = '../uploads';
        if (move_uploaded_file($image['tmp_name'], $upload_path . '/' . $image['name'])) {
            $data = [
                'parent_category_id' => $parent_category,
                'title' => $title,
                'meta_title' => $meta_title,
                'url' => $url,
                'content' => $content,
                'image' => $image['name']

            ];
            $response = $database->addCatgeory($data);
            if ($response == 1) {
                header("location:../category/category.php");
                exit();
            } else {
                header("location:../category/add_category/add_category.php?error=$response");
            }
        }
    } else {
        // required all feilds
    }
} else {
    // redirect

}
