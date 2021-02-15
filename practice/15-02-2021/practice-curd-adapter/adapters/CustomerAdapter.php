<?php


namespace adapters;

use models\Customer;
use mysqli;
use service\CustomerService;
require '../service/CustomerService.php';

class CustomerAdapter
{


    private CustomerService $CustomerService;

    public function __construct()
    {
        $connection = new mysqli("localhost", "root", "", "questecom");
        $this->CustomerService = new CustomerService($connection);
    }

    public function insert(Customer $object)
    {
        return $this->CustomerService->insert($object);
    }

    public function getAllCustomers(){
        return $this->CustomerService->getAll();
    }

    public function getCustomerDeatils($id){
        return $this->CustomerService->getById($id);
    }

    public function updateCustomer($Customer){
        return $this->CustomerService->update($Customer);
    }

    public function deleteCustomer($id){
        return $this->CustomerService->delete($id);
    }
}
