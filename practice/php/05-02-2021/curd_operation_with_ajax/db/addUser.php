<?php

require './database_operation.php';


$name = $_GET['name'] ?? null;
$username = $_GET['username'] ?? null;
$password = $_GET['password'] ?? null;


if (
    $name
    and $username
    and $password
) {
    echo addUser($name, $username, $password);
}
