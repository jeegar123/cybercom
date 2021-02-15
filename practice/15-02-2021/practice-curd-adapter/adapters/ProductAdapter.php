<?php


namespace adapters;

use models\Product;
use mysqli;
use service\ProductService;
require '../service/ProductService.php';

class ProductAdapter
{


    private ProductService $productService;

    public function __construct()
    {
        $connection = new mysqli("localhost", "root", "", "questecom");
        $this->productService = new ProductService($connection);
    }

    public function insert(Product $object)
    {
        return $this->productService->insert($object);
    }

    public function getAllProducts(){
        return $this->productService->getAll();
    }

    public function getProductDeatils($id){
        return $this->productService->getById($id);
    }

    public function updateProduct($product){
        return $this->productService->update($product);
    }

    public function deleteProduct($id){
        return $this->productService->delete($id);
    }
}
