<?php
require '../class/Database.php';

$database = new Database("localhost", "root", "", "questecom");
$result = $database->getAllCustomers();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
<?php
    include '../includes/header.inc.php';
?>
    <a href="./add_customer.php">Add Customer</a>

    <div class="conatiner">
        <?php
        if ($result) {
            $output = '
                <table class="table">
                    <tr>
                        <th>Sr no</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Update Date</th>
                        <th colspan=2>Actions</th>
                    </tr>
            ';
            $i = 1;
            foreach ($result as $row) {
                $output .= "<tr>
                    <td>$i</td>
                    <td>$row[first_name] $row[last_name]</td>
                    <td>$row[email]</td>
                    <td>$row[status]</td>
                    <td>$row[created_date]</td>
                    <td>$row[updated_date]</td>
                    <td>
                    <a href='add_customer.php?id=$row[customer_id]'>Edit</a>
                    <a href='../db/delete_customer.php?id=$row[customer_id]'>Delete</a>
                    </td>
                
                </tr>";
                $i++;
            }
            $output .= '</table>';
            echo $output;
        } ?>
    </div>

</body>

</html>