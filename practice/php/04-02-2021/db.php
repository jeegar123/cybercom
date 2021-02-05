<?php

require './oop/class/custom_error.php';

$host = "localhost";
$username = "admin";
$password = "admin123";
$db_name = "trainning_db";

try {
    if (!@$db = mysqli_connect($host, $username, $password)) {
        throw new ServerException();
    } else if (!@mysqli_select_db($db, $db_name)) {
        throw new DatabaseException();
    } else {
        echo "Connected To Database";
    }
} catch (ServerException $ex) {
    echo  $ex->showMessage();
} catch (DatabaseException $ex) {
    echo  $ex->showMessage($db->error);
} finally {
}

echo "<pre>";
print_r($db);
echo "</pre>";



$result = mysqli_query($db, "select * from login");

echo "Data in table<br>";
echo "<pre>";
print_r(mysqli_fetch_assoc($result));
echo "</pre>";
