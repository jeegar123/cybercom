<?php


require './database_operation.php';



$users = getAllUser();

echo "<table class='table'>";
$i = 1;
echo "<thead>
    <tr>
        <th>SNo.</th>
        <th>Name</th>
        <th>UserName</th>
        <th>Password</th>
        <th colspan=2>Action</th>
    </tr>

</thead><tbody>";
foreach ($users as $user) {

    echo "<tr>";
    echo "<td>$i</td>";
    echo "<td>$user[1]</td>";
    echo "<td>$user[2]</td>";
    echo "<td>$user[3]</td>";
    echo "<td><a href='#$user[0]' class='btn btn-outline-block'>Edit</a><a href='#$user[0]' class='btn btn-danger'>Delete</a></td>";
    echo "</tr>";

    $i++;
}
echo "</tbody></table>";
