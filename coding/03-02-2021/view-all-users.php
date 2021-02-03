<?php


require './db/db_operation.php';

$users = viewAllUsers();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $row_count = $_POST['no_of_results'] ?? null;
    if ($row_count != null) {
        $users = viewLimitedUsers($row_count);
    }


    $start_limit = $_POST['start_limit'] ?? null;
    $end_limit = $_POST['start_limit'] ?? null;


    if ($start_limit  and $end_limit) {
        $users = viewInRangeUsers($start_limit, $end_limit);
    }


    $search_name = $_POST['search_name'] ?? null;
    if ($search_name != null) {
        $users = searchUsersByName($search_name);
    }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view users</title>
</head>

<body>
    <form method="POST">
        <label>How many Data want to display</label>
        <input type="number" name="no_of_results">
        <input type="submit" value="search">
    </form>

    <form method="POST">
        <label>Enter initial and final position to view users<label>

                <input type="number" name="start_limit" placeholder="starting">
                <input type="number" name="end_limit" placeholder="ending">
                <input type="submit" value="search">
    </form>

    <form method="POST">
        <input type="search" name="search_name" placeholder="search by name">
        <input type="submit" value="search">
    </form>


    <?php
    if (count($users) == 0) {
        echo "no user in database";
        echo "<a href='./index.php'>Go back</a>";
        exit();
    }

    ?>
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
                echo "<td><a href='./user-form-1.php?id=$user[0]'>edit</a>      <a href='./delete_user.php?id=$user[0]'>delete</a></td>";

                echo "</tr>";

                $i++;
            }

            ?>
        </tbody>

    </table>
    <a href="./index.php">Go back</a>
</body>

</html>