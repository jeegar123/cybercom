<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
    <link rel="stylesheet" href="http://localhost/cybercom/practice/vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>

    <a href="<?= $this->getUrl('form') ?>">Add Product</a>
    <div class="container-fluid">
        <?php
        if ($products) {
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
                        <th>Status</th>
                        <th>createdDate</th>
                        <th>updatedDate</th>
                        <th colspan=2>Actions</th>
                    </tr>
            ';
            $i = 1;
            foreach ($products as $row) {
                $row['price']=number_format($row['price'],0);
                $output .= "<tr>
                    <td>$i</td>
                    <td>$row[sku]</td>
                    <td>$row[name]</td>
                    <td>Rs $row[price]</td>
                    <td>$row[discount]%</td>
                    <td>$row[quantity]</td>
                    <td>$row[description]</td>";
                if ($row['status'] == 1)
                    $output .= "<td><a  href='{$this->getUrl("changeStatus")}&id=$row[product_id]&status={$row['status']}'>Disable</a></td>";
                else
                    $output .= "<td class='bg-dark'><a  href='{$this->getUrl("changeStatus")}&id=$row[product_id]&status={$row['status']}'>Enable</a></td>";

                $output .= "<td>$row[createdDate]</td>
                    <td>$row[updatedDate]</td>
                    <td>
                    <a href='{$this->getUrl("updateForm")}&id=$row[product_id]'>Edit</a>
                    <a href='{$this->getUrl("delete")}&id=$row[product_id]'>Delete</a>
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