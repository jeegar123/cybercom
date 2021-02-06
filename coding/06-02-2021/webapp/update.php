<?php

use myclass\Database;

require "./class/Database.php";
require "./db/constants.php";

$title= "update contact";


$id = null;
$user = null;
if (isset($_GET['userid'])) {
    $id = $_GET['userid'];
    $database = new Database($host, $username, $password, $db_name);
    $user = $database->select($table_name,$id)[0];
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./vendor/icons/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/common.css">
</head>

<body>

    <?php
    include './includes/header.inc.php';
    ?>

    <div class="container">
        <div class="font-weight-bold h1 display-title"><?= $title ?></div>

        <hr>
        <form action="./db/updateContact.php" method="POST" id="createForm" onsubmit=" return validateForm()">
            <div class="row">

                <div class="col">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="text" name="" id="" disabled placeholder="auto" class="form-control" >
                        <input type="hidden" name="id" id="id"  placeholder="auto" class="form-control" value="<?=$user[0]?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label><span class="alert-danger ml-2 ml-2" id="error-email"></span>
                        <input type="text" name="email" id="email" placeholder="john@example.com" class="form-control"value="<?=$user[2]?>" >
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label><span class="alert-danger ml-2" id="error-title"></span>
                        <input type="text" name="title" id="title" placeholder="Employee" class="form-control" value="<?=$user[4]?>">
                    </div>
                </div>
                <div class="col">

                    <div class="form-group">
                        <label for="name">Name</label><span class="alert-danger ml-2" id="error-name"></span>
                        <input type="text" name="name" id="name" placeholder="John Doe" class="form-control" value="<?=$user[1]?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label><span class="alert-danger ml-2" id="error-phone"></span>
                        <input type="tel" name="phone" id="phone" placeholder="02145896302" class="form-control" value="<?=$user[3]?>">
                    </div>
                    <div class="form-group">
                        <label for="created">Created</label><span class="alert-danger ml-2 ml-2" id="error-created"></span>
                        <input type="text" name="created" id="created" placeholder="" class="form-control"  value="<?=$user[5]?>" >
                    </div>
                </div>

            </div>
            <input class="btn mt-3" id="btn-create-user" type="submit" name="submit" value="Update"/>
        </form>

    </div>


    <script src="./js/create.js"></script>
</body>


</html>