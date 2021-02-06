<?php
$title = "Home"
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
        <p>Welcome to the home page</p>
    </div>



</body>

</html>