<?php
$remote_addr = $_SERVER['REMOTE_ADDR'];

//  to block ip
if ($remote_addr == '::1') {
    // die('Your ip is blocked '.$ip_address);
}

$http_client_ip = $_SERVER['HTTP_CLIENT_IP'] ?? null;
$http_x_forwarded_for = $_SERVER['HHTP_X_FORWARDED_FOR'] ?? null;

if (!empty($http_client_ip)) {
    $ip_address = $http_client_ip;
    echo "http client ip";
} else if (!empty($http_x_forwarded_for)) {
    $ip_address = $http_x_forwarded_for;
    echo "forwared for";
} else {
    $ip_address = $remote_addr;
    echo "remoted called";
}

echo $ip_address;



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

</body>

</html>