<?php

session_start();

use blogapp\useclass\Database;
use blogapp\useclass\FormValidation;

require '../class/Database.php';
require '../class/FormValidation.php';
require 'databaseConfig.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $database = new Database($database_host, $datbase_username, $datbase_password, $database_name);

    $data = $database->getAllCategoryData();


echo  "<table class='table'>
<tr>
    <th>CategoryId</th>
    <th>Category Image</th>
    <th>category Name</th>
    <th>Created Date</th>
    <th colspan='2'>Actions</th>
</tr>
";
    if ($data) {
        foreach ($data as $index => $value) {
            echo '<tr>';
            echo "<td>ID$value[0]</td>";
            echo "<td><img src='../uploads/$value[1]' width=50></td>";
            echo "<td>$value[2]</td>";
            echo "<td>$value[3]</td>";
            echo "<td><a href='./edit_category/edit_category.php?id=$value[0]' class='mr-2'>edit</a>";
            echo "<a  class='deleteCategory' data-id='$value[0]'>delete</a></td>";
            echo '</tr>';
        }
    }



    echo '</table>';
}
