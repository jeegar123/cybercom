<?php

require_once './db.inc.php';


function calulate_age($date)
{
    $date_diff = abs(strtotime(date('Y-m-d')) - strtotime($date));
    return  ceil($date_diff / (365 * 60 * 60 * 24));
}

if (isset($_SERVER['REQUEST_METHOD']) == "POST") {

    $first_name = $_POST['firstName'] ?? null;
    $last_name = $_POST['lastName'] ?? null;
    $user_email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $address = $_POST['address'] ?? null;
    $birth_date = $_POST['birthdate'] ?? null;


    if (
        $first_name
        && $last_name
        && $user_email
        && $password
        && $address
        && $birth_date
    ) {

        $age = calulate_age($birth_date);
        $password = md5($password);
        $birth_date = date('Y-m-d', strtotime($birth_date));


        $sql_insert = "INSERT INTO users(`first_name`,`last_name`,`user_email`,`password`,`address`,`age`,`birth_date`) 
        VALUES('$first_name' , '$last_name' ,'$user_email','$password','$address',$age,'$birth_date')";

        

        if (mysqli_query($database, $sql_insert)) {
            echo "User added";
        } else {
            echo "User not added" . mysqli_connect_errno();
        }
    }
}


?>





<form method="POST">
    <input type="text" name="firstName" placeholder="firstname">
    <input type="text" name="lastName" placeholder="lastname">
    <input type="email" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <textarea name="address" cols="30" rows="10" placeholder="address"></textarea>
    <input type="date" name="birthdate" id="" placeholder="birthdate">
    <input type="submit" value="Submit">

</form>