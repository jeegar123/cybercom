<?php

namespace myclass;



class Name
{

    private $id;
    private $name;
    private $userId;

    public function __construct($name = null, $userId = null)
    {
        $this->name = $name;
        $this->userId = $userId;
    }


    public function __get($name)
    {
        if (property_exists($this, $name))
            return $this->$name;
        else
            return false;
    }


    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}
