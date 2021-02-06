<?php

use myclass\Database;

require 'constants.php';
require '../class/Database.php';


$database = new Database($host, $username, $password, $db_name);
$contacts = $database->select($table_name);

echo '<table class="table mt-3">
<thead>
    <tr class="bg-light">
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Title</th>
        <th scope="col">created</th>
        <th scope="col" colspan="2"></th>
    </tr>
</thead>
<tbody>';
if (isset($contacts) and count($contacts)) {
    $i = 1;
    foreach ($contacts as $contact) {
        echo <<<"EOD"
                <tr>
                    <td>$i</td>
                    <td>$contact[1]</td>
                    <td>$contact[2]</td>
                    <td>$contact[3]</td>
                    <td>$contact[4]</td>
                    <td>$contact[5]</td>
                    <td>
                    <a type="button" class="btn btn-primary" id='editBtn' href='update.php?userid=$contact[0]'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a type="button" class="btn btn-danger deleteBtn" data-id='$contact[0]' ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                </tr>
               EOD;
        $i++;
    }
} else {
    // no contacts
}
echo        ' </tbody>        </table>    </div>';
