<?php

namespace models;
class Product
{

    private int $productId;
    private string $sku;
    private string $name;
    private float $price;
    private int $discount;
    private int $quantity;
    private string $description;
    private bool $status;
    private $createdDate;
    private $updatedDate;

    public function __construct(
        string $sku = "not provided",
        string $name = "not available",
        float $price = 0.0,
        int $discount = 0,
        int $quantity = 0,
        string $description = "not available",
        bool $status = false
    ) {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->discount = $discount;
        $this->quantity = $quantity;
        $this->description = $description;
        $this->status = $status;
    }


    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }
}
