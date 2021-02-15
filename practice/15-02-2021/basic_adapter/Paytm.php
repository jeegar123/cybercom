<?php

namespace myclass;

/**
 * payment method classs
 * 
 **/

class Paytm
{

    public function addItemPrice(int $price)
    {
        echo 'Item Price is ' . $price . '<br>';
    }

    public function addItemName($item)
    {
        echo 'Your Item is ' . $item . '<br>';
    }

    
}
