<?php

require_once './Model/Core/Adapter.php';
require_once './Controller/Core/Admin.php';

class Product extends Admin
{
    private $products = [];

    public function gridAction()
    {
        $adapter = new Adapter();
        $query = "select * from product";
        $this->setProducts($adapter->fetchAll($query));
        $products = $this->getProducts();

        require_once './View/product/grid.php';
    }

    public function saveAction()
    {
        $sku = $_POST['sku'] ?? null;
        $name = $_POST['name'] ?? null;
        $price = $_POST['price'] ?? null;
        $discount = $_POST['discount'] ?? null;
        $quantity = $_POST['quantity'] ?? null;
        $description = $_POST['description'] ?? null;



        if (
            $sku
            and $name
            and $description
        ) {

            $adapter = new Adapter();

            $createdDate = date('Y-m-d H:i:s');
            $query = "INSERT INTO `product`( `sku`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`) VALUES ('{$sku}','{$name}','{$price}','{$discount}','{$quantity}','{$description}','0','$createdDate')";

            if ($adapter->insert($query)) {
                $this->redirect('grid');
            } else {
            }
        }
    }

    public function formAction()
    {
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
        require_once './View/product/form.php';
    }

    public function getProducts()
    {
        if ($this->products)
            return $this->products;
        return false;
    }

    public function setProducts(array $products)
    {
        $this->products = $products;
    }

    public function updateFormAction()
    {
        $id = $_GET['id'];

        $adapter = new Adapter();
        $query = "SELECT * FROM `product` WHERE product_id = {$id}";
        $product = $adapter->fetchOne($query);

        require_once './View/product/form.php';
    }

    public function updateAction()
    {
        $sku = $_POST['sku'] ?? null;
        $name = $_POST['name'] ?? null;
        $price = $_POST['price'] ?? null;
        $discount = $_POST['discount'] ?? null;
        $quantity = $_POST['quantity'] ?? null;
        $description = $_POST['description'] ?? null;
        $product_id = $_POST['id'];

        echo "A";

        if (
            $sku
            and $name
            and $description
            and $product_id
        ) {
            $adapter = new Adapter();
            $updateDate = date('Y-m-d H:i:s');

            $query = "UPDATE `product` SET `sku`='{$sku}',`name`='{$name}',`price`='{$price}',`discount`= '{$discount}',`quantity`= '{$quantity}',`description`='{$description}',`status`='0',`updatedDate`= '{$updateDate}' WHERE product_id = '{$product_id}'";


            if ($adapter->update($query)) {
                $this->redirect('grid');
            }
        }
    }

    public function deleteAction()
    {
        $id = $_GET['id'];
        $adapter = new Adapter();
        $query = "DELETE FROM `product` WHERE product_id = $id";
        $adapter->delete($query);
        $this->redirect('grid');
    }

    public function changeStatusAction()
    {

        $id = $_GET['id'];
        $status = $_GET['status'];


        $adapter = new Adapter();

        if ($status == 1)
            $status = 0;
        else
            $status = 1;

        $updateDate = date('Y-m-d H:i:s');
        $query = "UPDATE `product` SET `status`= '{$status}' , `updatedDate`= '{$updateDate}' WHERE product_id = '{$id}'";

        $adapter->update($query);

        $this->redirect('grid');
    }
}
