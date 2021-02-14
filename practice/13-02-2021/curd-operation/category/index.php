<?php
require '../class/Database.php';

$database = new Database("localhost", "root", "", "questecom");
$result = $database->getAllCategory();




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>

<?php
    include '../includes/header.inc.php';
?>
    <a href="./add_category.php">Add Category</a>
    <div class="conatiner">
        <?php
        if ($result) {
            $output = '
                <table class="table">
                    <tr>
                        <th>Sr no</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th colspan=2>Actions</th>
                    </tr>
            ';
            $i = 1;
            foreach ($result as $row) {
                $output .= "<tr>
                    <td>$i</td>
                    <td>$row[name]</td>
                    <td>$row[description]</td>
                    <td>$row[status]</td>
                    <td>
                    <a href='add_category.php?id=$row[category_id]'>Edit</a>
                    <a href='../db/delete_category.php?id=$row[category_id]'>Delete</a>
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