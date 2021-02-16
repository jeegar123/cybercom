<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add Category</title>
    <link rel="stylesheet" href="http://localhost/cybercom/practice/vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center"> Add Category</h1>
        <form action="<?php

                        $url = $this->getUrl('save');
                        if ($category['category_id']) {
                            $url = $this->getUrl('update');
                        }
                        echo $url;

                        ?>" method="post">
            <input type="hidden" name="id" value="<?= $category['category_id'] ?>">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name" id="name" required value="<?= $category['name'] ?>">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" required class="form-control"> <?= $category['description'] ?></textarea>
            </div>
            <input type="submit" value="Add Category" class="btn btn-primary">
        </form>
    </div>
</body>

</html>