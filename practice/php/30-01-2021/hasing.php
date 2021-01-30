<?php
// "password" converted to has
$string__hash_password = "5f4dcc3b5aa765d61d8327deb882cf99";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    if ($email and $password) {
        if(md5($password) === $string__hash_password){
            echo "USer found";
        }else{
            echo "user not found";
        }

        
    }
}


?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form hashing</title>
</head>

<body>

    <form method="post">
        <input type="email" name="email">
        <input type="password" name="password">
        <input type="submit" value="login">

    </form>



</body>

</html>