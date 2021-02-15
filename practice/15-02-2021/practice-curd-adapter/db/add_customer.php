<?php


use adapters\CustomerAdapter;
use models\Customer;

require '../adapters/CustomerAdapter.php';
require '../model/Customer.php';




if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $firstName = $_POST['firstName'] ?? null;
    $lastName = $_POST['lastName'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $id = $_POST['id'] ?? null;


    if (
        $firstName
        and $lastName
        and $email
        and $password
    ) {
        $customer = new Customer($firstName, $lastName, $email, $password);
        $adapter =new CustomerAdapter();
        if ($id) {
            $customer->updatedDate = date('Y-m-d H:m:s');
            $customer->customerId = $id;
            if ($result = $adapter->updateCustomer($customer) == 1) {
                header('location:../customer/customers.php?sucess=1');
                exit();
            } else {
                header('location:../customer/customers.php?error='.$result);
                exit();
            }
        } else {
            $customer->createdDate = date('Y-m-d H:m:s');
            if ($result = $adapter->insert($customer) == 1) {
                header('location:../customer/customers.php?sucess=1');
                exit();
            } else {
                header('location:../customer/add_customer.php?error=' . $result);
                exit;
            }
        }
    }
}
