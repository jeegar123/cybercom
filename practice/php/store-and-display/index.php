<?php


/**
 *  Accept data from form
 * 
 */

// user data
$name = $_GET['userName'] ?? null;
$email = $_GET['userEmail'] ?? null;
$birthdate = $_GET['userBirthDate'] ?? null;
$city = $_GET['userCity'] ?? null;
$address = $_GET['userAddress'] ?? null;

$users = array($_COOKIE['users']) ?? array();

if (
    $name
    && $email
    && $birthdate
    && $city
) {
    //  store object in array
    array_push($users, [
        'name' => $name,
        'email' => $email,
        'birthdate' => $birthdate,
        'city' => $city,
        'address' => $address
    ]);

    // set users array in cookie
    setcookie('users', json_encode($users), time() + (86000 * 30), "/");
}

if(null){
    echo "im null";
}


var_dump($users);



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>

<body>

    <div>
        <form>
            <input type="text" name="userName" placeholder="Name">
            <input type="email" name="userEmail" placeholder="Email">
            <input type="date" name="userBirthDate" placeholder="BirthDate">
            <input type="city" name="userCity" placeholder="CityName">
            <textarea name="userAddress"></textarea>
            <input type="submit">
        </form>
    </div>


</body>

</html>