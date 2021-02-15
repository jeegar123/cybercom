<?php

use adapters\ProductAdapter;

require '../adapters/ProductAdapter.php';

$adapter = new ProductAdapter();
$result = $adapter->getAllProducts();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
    <link rel="stylesheet" href="../../../13-02-2021/curd-operation/vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
<?php
    include '../includes/header.inc.php';
    ?>
    <a href="./add_product.php">Add Product</a>
    <div class="container-fluid">
    <?php
            if ($result) {
                $output = '
                <table class="table">
                    <tr>
                        <th>Sr no</th>
                        <th>SKU</th>
                        <th>Name</th>
                        <th>price</th>
                        <th>discount</th>
                        <th>quantity</th>
                        <th>description</th>
                        <th>createdDate</th>
                        <th>updatedDate</th>
                        <th colspan=2>Actions</th>
                    </tr>
            ';
                $i = 1;
                foreach ($result as $row) {
                    $output .= "<tr>
                    <td>$i</td>
                    <td>$row[sku]</td>
                    <td>$row[name]</td>
                    <td>Rs.$row[price]</td>
                    <td>$row[discount]%</td>
                    <td>$row[quantity]</td>
                    <td>$row[description]</td>
                    <td>$row[createdDate]</td>
                    <td>$row[updatedDate]</td>
                    <td>
                    <a href='add_product.php?id=$row[product_id]'>Edit</a>
                    <a href='../db/delete_product.php?id=$row[product_id]'>Delete</a>
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