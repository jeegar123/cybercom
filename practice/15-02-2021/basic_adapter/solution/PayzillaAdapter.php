<?php

namespace myclass;

use myclass\Payzilla;

require 'Payzilla.php';




class PayzillaAdapter implements Payzilla
{

    private $pay;

    public function __construct($pay)
    {
        $this->pay = $pay;
    }

    public function addPrice(int $price)
    {
       $this->pay->addPrice($price);
    }

    public function addItem($item)
    {
        $this->pay->addItem($item);
    }
}
