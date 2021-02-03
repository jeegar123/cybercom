<?php


session_start();

if(!isset($_SESSION['login_username'])){
    header("location:index.php");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>

<body>
    <!-- home -->

    <h1>Welcome <?=""?></h1>

    <form action="logout.php">
        <input type="submit" value="logout" >
    </form>
</body>

</html>