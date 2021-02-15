<?php

use adapters\CustomerAdapter;
require '../adapters/CustomerAdapter.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $id = $_GET['id'] ?? null;

    if ($id) {
        $adapter = new CustomerAdapter();
        if ($adapter->deleteCustomer($id) == 1) {
            header('location:../customer/customers.php?sucess=1');
            exit();
        } else {
            header('location:../customer/customers.php?error=not deleted');
            exit();
        }
    }
}
