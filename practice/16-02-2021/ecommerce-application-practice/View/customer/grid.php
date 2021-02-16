<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="http://localhost/cybercom/practice/vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <a href="<?= $this->getUrl('form') ?>">Add Customer</a>

    <div class="conatiner">
        <?php
        if ($customers) {
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
            foreach ($customers as $customer) {
                $output .= "<tr>
                    <td>$i</td>
                    <td>{$customer['first_name']} {$customer['last_name']}</td>
                    <td>$customer[email]</td>";
                if ($customer['status'] == 1)
                    $output .= "<td><a  href='{$this->getUrl("changeStatus")}&id=$customer[customer_id]&status={$customer['status']}'>Disable</a></td>";
                else
                    $output .= "<td class='bg-dark'><a  href='{$this->getUrl("changeStatus")}&id=$customer[customer_id]&status={$customer['status']}'>Enable</a></td>";

                $output .= "<td>$customer[created_date]</td>
                    <td>$customer[updated_date]</td>
                    <td>
                    <a href='{$this->getUrl('updateForm')}&id=$customer[customer_id]'>Edit</a>
                    <a href='{$this->getUrl('delete')}&id=$customer[customer_id]'>Delete</a>
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