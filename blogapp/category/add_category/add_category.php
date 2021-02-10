<?php

require '../../class/Database.php';
require '../../db/databaseConfig.php';

use blogapp\useclass\Database;

session_start();



if (!isset($_SESSION['user'])) {
    header("location:../index.php");
}


$database = new Database($database_host, $datbase_username, $datbase_password, $database_name);
$result  = $database->selectAllParentCategory();

$msg = "";
if (isset($_GET['error'])) {
    $msg = $_GET['error'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add category</title>
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <?php
    if ($msg)
        include '../../includes/error.inc.php';
    ?>
    <div class="container">
        <h1>Add New Category</h1>

        <form action="../../db/addCategory.php" method="POST" enctype="multipart/form-data">
            <div class="form-inline">
                <label for="title">Title</label>
                <input type="text" name="title" id="title">
            </div>
            <div class="form-inline">
                <label for="content">Content</label>
                <textarea type="text" name="content" id="content" rows="3" cols="20"></textarea>
            </div>
            <div class="form-inline">
                <label for="url">URL</label>
                <input type="text" name="url" id="url">
            </div>
            <div class="form-inline">
                <label for="title">Meta Title</label>
                <input type="text" name="meta_title" id="meta_title">
            </div>
            <div class="form-inline">
                <label for="title">Parent Category</label>
                <select name="parent_category" id="parent_category">
                    <?php
                    if (count($result) >= 1)
                        foreach ($result as $key => $value)
                            echo "<option value='$value[0]'>$value[1]</option>"
                    ?>
                </select>
            </div>
            <div class="form-inline">
                <input type="file" name="image" id="image" accept="image/*">
            </div>
            <input type="submit" value="Submit">
        </form>


    </div>
</body>

</html>