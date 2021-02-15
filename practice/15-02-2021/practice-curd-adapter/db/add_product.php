<?php


use adapters\ProductAdapter;
use models\Product;

require '../adapters/ProductAdapter.php';
require '../model/Product.php';

if ($_SERVER['REQUEST_METHOD'] = "POST") {

    $sku = $_POST['sku'] ?? null;
    $name = $_POST['name'] ?? null;
    $price = $_POST['price'] ?? null;
    $discount = $_POST['discount'] ?? null;
    $quantity = $_POST['quantity'] ?? null;
    $description = $_POST['description'] ?? null;
    $id = $_POST['id'] ?? null;



    if (
        $sku
        and $name
        and $price
        and $discount
        and $quantity
        and $description
    ) {


        $product = new Product($sku, $name, $price, $discount, $quantity, $description);
        $productAdapter = new ProductAdapter();
        if ($id) {
            $product->productId = $id;
            $product->updatedDate = date('Y-m-d H:m:s');
            if ($result = $productAdapter->updateProduct($product) == 1) {
                header('location:../product/products.php?sucess=1');
                exit();
            } else {
                header('location:../product/add_product.php?error='. $result);
                exit();
            }
        } else {
            $product->createdDate = date('Y-m-d H:m:s');
            if ($result = $productAdapter->insert($product) == 1) {
                header('location:../product/products.php?sucess=1');
                exit();
            } else {
                header('location:../product/add_product.php?error='. $result);
                exit();
            }
        }
    }
}
