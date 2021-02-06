

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./vendor/icons/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/common.css">
</head>

<body>
    <?php
    include './includes/header.inc.php';
    $i = $_GET['i'] ?? null;
    if ($i == 1) {
        $message = "Contact Added";
        include './includes/sucess.php';
    } else if ($i == -1) {
        $message = "invalid input";
        include './includes/error.php';
    } else if (isset($_GET['error'])) {
        $message = $_GET['error'];
        include './includes/error.php';
    } else if ($i == 2) {
        $message = "Contact Updated";
        include './includes/sucess.php';
    } else if ($i == -2) {
        $message = "invalid input";
        include './includes/error.php';
    }

    ?>

    <div class="container">
        <div class="font-weight-bold h1 display-title">Read Contacts</div>
        <hr>
        <button class="btn " id="btn-create-user">Create Contact</button>
        <div id="display-data">
        </div>
        <script src="./vendor/jquery/jquery.js"></script>
        <script src="./js/contacts.js"></script>
        <script src="./js/delete.js"></script>
</body>

</html>