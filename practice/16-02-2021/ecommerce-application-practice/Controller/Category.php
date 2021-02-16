<?php


require_once './Model/Core/Adapter.php';
require_once './Controller/Core/Admin.php';



class Category extends Admin
{


    private $categorys = [];

    public function gridAction()
    {
        $adapter = new Adapter();
        $query = "select * from category";
        $this->setCategorys($adapter->fetchAll($query));
        $categorys = $this->getCategorys();
        require_once './View/category/grid.php';
    }

    public function setCategorys(array $categorys)
    {
        $this->categorys = $categorys;
    }

    public function getCategorys()
    {
        return $this->categorys;
    }

    public function formAction()
    {
        $category = [
            'category_id' => 0,
            'name' => '',
            'status' => false,
            'description' => ''

        ];
        require_once './View/category/form.php';
    }

    public function saveAction()
    {
        $name = $_POST['name'] ?? null;
        $discription = $_POST['description'] ?? null;

        if ($name and $discription) {
            $adapter = new Adapter();

            $query = "INSERT INTO `category`( `name`, `status`, `description`) VALUES ('{$name}','0','{$discription}')";

            $adapter->insert($query);

            $this->redirect('grid');
        }
    }

    public function updateFormAction()
    {
        $id = $_GET['id'];
        $adapter = new Adapter();
        $query = "SELECT * FROM `category` WHERE category_id = $id";
        $category = $adapter->fetchOne($query);
        require_once './View/category/form.php';
    }

    public function updateAction()
    {
        $name = $_POST['name'] ?? null;
        $discription = $_POST['description'] ?? null;
        $category_id = $_POST['id'] ?? null;

        if ($name and $discription and $category_id) {
            $adapter = new Adapter();

            $query = "UPDATE `category` SET `name`= '{$name}',`description`= '{$discription}' WHERE category_id = '{$category_id}'";

            $adapter->update($query);

            $this->redirect('grid');
        }
    }

    public function deleteAction()
    {
        $id= $_GET['id'];
        
        $adapter =new Adapter();
        $query = "DELETE FROM `category` WHERE category_id = $id";
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


        $query = "UPDATE `category` SET `status`= '{$status}' WHERE category_id = '{$id}'";

        $adapter->update($query);

        $this->redirect('grid');
    }
}
