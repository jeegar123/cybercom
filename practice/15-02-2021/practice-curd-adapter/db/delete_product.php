<?php


use adapters\ProductAdapter;


require '../adapters/ProductAdapter.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $id = $_GET['id'] ?? null;

    if ($id) {
        $productAdapter = new ProductAdapter();
        if ($productAdapter->deleteProduct($id) == 1) {
            header('location:../product/products.php?sucess=1');
            exit();
        } else {
            header('location:../product/products.php?error=notdeleted');
            exit();
        }
    }
}
