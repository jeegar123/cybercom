<?php

use adapters\ProductAdapter;
require '../adapters/ProductAdapter.php';

$product = [
    'product_id' => 0,
    'sku' => '',
    'name' => '',
    'price' => 0,
    'discount' => 0,
    'quantity' => 0,
    'description' => '',
    'status' => 0

];
if (isset($_GET['id'])) {
    $adapter = new ProductAdapter();
    $product = $adapter->getProductDeatils($_GET['id']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../../../13-02-2021/curd-operation/vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="conatiner">
        <h1 class="text-center">Add Product</h1>
        <form action="../db/add_product.php" method="post">
        <input type="hidden" name="id" value="<?= $product['product_id']?>">
            <div class="form-group">
                <label for="sku">SKU</label>
                <input type="text" class="form-control" name="sku" id="sku" value="<?= $product['sku']?>" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $product['name']?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" id="price" value="<?= $product['price']?>" required>
            </div>
            <div class="form-group">
                <label for="discount">Discount</label>
                <input type="number" class="form-control" name="discount" id="discount" value="<?= $product['discount']?>" required>
            </div>
            <div class="form-group">
                <label for="sku">Quantity</label>
                <input type="number" class="form-control" name="quantity" id="quantity" value="<?= $product['quantity']?>" required>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="description" cols="30" rows="4" class="form-control" required><?= $product['description']?></textarea>
            </div>
            <input type="submit" value="Add Product" class="btn btn-primary">
        </form>

    </div>
</body>

</html>