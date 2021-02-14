<?php

require '../class/Customer.php';
require '../class/Database.php';


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
        $database = new Database("localhost", "root", "", "questecom");
        if ($id) {
            $customer->updatedDate = date('Y-m-d H:m:s');
            $customer->customerId = $id;
            if ($result = $database->updateCustomer($customer) == 1) {
                header('location:../customer/index.php?sucess=1');
                exit();
            } else {
                header('location:../customer/index.php?error=' . $result);
                exit();
            }
        } else {
            $customer->createdDate = date('Y-m-d H:m:s');
            if ($result = $database->insertCustomer($customer) == 1) {
                header('location:../customer/index.php?sucess=1');
                exit();
            } else {
                header('location:../customer/add_customer.php?error=' . $result);
                exit;
            }
        }
    }
}
