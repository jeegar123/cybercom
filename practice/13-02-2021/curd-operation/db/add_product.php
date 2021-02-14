<?php


require '../class/Product.php';
require '../class/Database.php';

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

        $database = new Database("localhost", "root", "", "questecom");
        $product = new Product($sku, $name, $price, $discount, $quantity, $description);

        if ($id) {
            $product->productId = $id;
            $product->updatedDate = date('Y-m-d H:m:s');
            if ($result = $database->updateProduct($product) == 1) {
                header('location:../product/index.php?sucess=1');
                exit();
            } else {
                header('location:../product/index.php?error=' . $result);
                header('location:../product/index.php?error=' . $result);
                exit();
            }
        } else {

            $product->createdDate = date('Y-m-d H:m:s');
            if ($result = $database->insertProduct($product) == 1) {
                header('location:../product/index.php?sucess=1');
                exit();
            } else {
                header('location:../product/add_customer.php?error=' . $result);
                exit();
            }
        }
    }
}
