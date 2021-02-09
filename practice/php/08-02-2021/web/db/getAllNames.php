<?php

session_start();

require '../class/Database.php';
require '../class/User.php';
require './constants.php';


use myclass\Database;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $user = $_SESSION['user'];


    $datbase = new Database($host, $sql_username, $sql_password, $db_name);


    $names = $datbase->select_names("names_1", "user_id", $user['id']);
    if ($names) {
        $output = "";
        $output .= "<table class='table table-active col-6'>
                    <tr>
                        <th>Sr no.</th>
                        <th>Name</th>
                    </tr>";
        $i=1;
        foreach ($names as $key => $value) {
            $output .= "<tr><td>$i</td><td>$value[1]</td></tr>";
            $i++;
        }

        $output .= "</table>";
        echo $output;
    }
}
