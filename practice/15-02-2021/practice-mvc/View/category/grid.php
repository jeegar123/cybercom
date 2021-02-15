<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="../../13-02-2021/curd-operation/vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>

  
    <a href="<?= $this->getUrl('form')?>">Add Category</a>
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
                    <td>$category[description]</td>
                    <td>$category[status]</td>
                    <td>
                    <a href='{$this->getUrl('updateForm')}&id=$category[category_id]'>Edit</a>
                    <a href='../db/delete_category.php?id=$category[category_id]'>Delete</a>
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