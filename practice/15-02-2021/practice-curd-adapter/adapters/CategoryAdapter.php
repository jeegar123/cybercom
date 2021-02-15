<?php


namespace adapters;

use models\Category;
use mysqli;
use service\CategoryService;
require '../service/CategoryService.php';

class CategoryAdapter
{


    private CategoryService $CategoryService;

    public function __construct()
    {
        $connection = new mysqli("localhost", "root", "", "questecom");
        $this->CategoryService = new CategoryService($connection);
    }

    public function insert(Category $object)
    {
        return $this->CategoryService->insert($object);
    }

    public function getAllCategorys(){
        return $this->CategoryService->getAll();
    }

    public function getCategoryDeatils($id){
        return $this->CategoryService->getById($id);
    }

    public function updateCategory($Category){
        return $this->CategoryService->update($Category);
    }

    public function deleteCategory($id){
        return $this->CategoryService->delete($id);
    }
}
