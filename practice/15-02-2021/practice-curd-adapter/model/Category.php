<?php

namespace models;

class Category
{

    private int $categoryId;
    private string $name;
    private bool $status;
    private string $description;


    public function __construct(
        string $name = "not provided",
        bool $status = false,
        string $description = "not available"
    ) {
        $this->name = $name;
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
