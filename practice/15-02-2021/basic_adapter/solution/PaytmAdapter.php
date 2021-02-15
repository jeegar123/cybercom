<?php

use myclass\Payzilla;
use myclass\Paytm;

class PaytmAdapter implements Payzilla
{

    private $pay;

    public function __construct($pay)
    {
        $this->pay = $pay;
    }

    public function addPrice(int $price)
    {
        $this->pay->addItemPrice($price);
    }

    public function addItem($item)
    {
        $this->pay->addItemName($item);
    }
}
