<?php


require './db/db_operation.php';

$users = viewAllUsers();




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view users</title>
</head>

<body>
    <table border="2">
        <thead>
            <tr>
                <th>Sr no</th>
                <th>Name</th>
                <th>Password</th>
                <th>Address</th>
                <th>Gamess</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Download File</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $i = 1;
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>$user[1]</td>";
                echo "<td>$user[2]</td>";
                echo "<td>$user[3]</td>";
                echo "<td>";
                echo "<ul>";
                foreach (explode(',', $user[4]) as $game) {
                    echo "<li>$game</li>";
                }
                echo "</ul>";
                echo "</td>";
                echo "<td>$user[5]</td>";
                echo "<td>$user[6]</td>";
                echo "<td colspan='2'><a href='$user[7]' download>click here</a></td>";
                echo "<td><a href='$user[0]'>edit</a>      <a href='./delete_user.php?id=$user[0]'>delete</a></td>";

                echo "</tr>";

                $i++;
            }

            ?>
        </tbody>

    </table>
</body>

</html>