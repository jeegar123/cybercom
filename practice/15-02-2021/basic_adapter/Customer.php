<?php


namespace myclass;


/* 
*customer class
*/

class Customer
{

    // payment object
    private $pay;

    public function __construct($pay)
    {
        $this->pay = $pay;
    }

    public function buyItems($itemName, $itemPrice)
    {
        $this->pay->addItem($itemName);
        $this->pay->addPrice($itemPrice);
    }
}
