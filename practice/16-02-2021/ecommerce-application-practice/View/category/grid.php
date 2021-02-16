<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="http://localhost/cybercom/practice/vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>


    <a href="<?= $this->getUrl('form') ?>">Add Category</a>
    <div class="conatiner">
        <?php
        if ($categorys) {
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
            foreach ($categorys as $category) {
                $output .= "<tr>
                    <td>$i</td>
                    <td>$category[name]</td>
                    <td>$category[description]</td>";
                if ($category['status'] == 1)
                    $output .= "<td><a  href='{$this->getUrl("changeStatus")}&id=$category[category_id]&status={$category['status']}'>Disable</a></td>";
                else
                    $output .= "<td class='bg-dark'><a  href='{$this->getUrl("changeStatus")}&id=$category[category_id]&status={$category['status']}'>Enable</a></td>";

                $output .= "<td>
                    <a href='{$this->getUrl('updateForm')}&id=$category[category_id]'>Edit</a>
                    <a href='{$this->getUrl('delete')}&id=$category[category_id]'>Delete</a>
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