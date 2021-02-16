<?php


require_once './Model/Core/Adapter.php';
require_once './Controller/Core/Admin.php';


class Customer extends Admin
{

    private $customers = [];

    public function gridAction()
    {
        $adapter = new Adapter();
        $query = "SELECT * FROM customer";
        $this->setCustomers($adapter->fetchAll($query));
        $customers = $this->getCustomers();
        require_once './View/customer/grid.php';
    }

    public function formAction()
    {
        $customer = [
            'first_name' => '',
            'last_name' => '',
            'email' => '',
            'password' => '',
            'customer_id' => 0,
        ];
        require_once './View/customer/form.php';
    }

    public function saveAction()
    {
        $firstName = $_POST['firstName'] ?? null;
        $lastName = $_POST['lastName'] ?? null;

        $email = $_POST['email'] ?? null;
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT) ?? null;

        if (
            $firstName
            and $lastName
            and $email
            and $password
        ) {
            $createdDate = date('Y-m-d H:i:s');
            $adapter = new Adapter();

            $query = "INSERT INTO `customer`(`first_name`, `last_name`, `email`, `password`, `status`, `created_date`) VALUES (
                '{$firstName}',
                '{$lastName}',
                '{$email}',
                '{$password}',
                   '0',
                '{$createdDate}'

            )";



            $adapter->insert($query);
            $this->redirect('grid');
        }
    }

    public function updateFormAction()
    {
        $id = $_GET['id'];
        $adapter = new Adapter();

        if ($id)
            $query = "SELECT * FROM `customer` WHERE customer_id = {$id}";

        $customer = $adapter->fetchOne($query);

        require_once './View/customer/form.php';
    }

    public function updateAction()
    {
        $firstName = $_POST['firstName'] ?? null;
        $lastName = $_POST['lastName'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT) ?? null;
        $id = $_POST['id'] ?? null;

        if (
            $firstName
            and $lastName
            and $email
            and $password
            and $id
        ) {
            $updatedDate = date('Y-m-d H:i:s');
            $adapter = new Adapter();

            $query = "UPDATE `customer` SET `first_name`= '{$firstName}',`last_name`= '{lastName}',`email`= '{$email}',`password`= '{$password}',`status`='0',`updated_date`='{$updatedDate}' WHERE customer_id = '{$id}'";

            $adapter->update($query);
            $this->redirect('grid');
        }
    }

    public function setCustomers(array $customers)
    {
        $this->customers = $customers;
    }

    public function getCustomers()
    {
        return $this->customers;
    }

    public function deleteAction()
    {
        $id = $_GET['id'];
        $adapter = new Adapter();
        $query = "DELETE FROM `customer` WHERE customer_id = $id";
        $adapter->delete($query);
        $this->redirect('grid');
    }

    public function changeStatusAction()
    {

        $id = $_GET['id'];
        $status = $_GET['status'];


        $adapter = new Adapter();
        $updateDate = date('Y-m-d H:i:s');
        if ($status == 1)
            $status = 0;
        else
            $status = 1;


        $query = "UPDATE `customer` SET `status`= '{$status}' , `updated_date`= '{$updateDate}' WHERE customer_id = '{$id}'";

        $adapter->update($query);

        $this->redirect('grid');
    }
}
