<?php

namespace myclass;

/**
 * payment method classs
 * 
 **/

class PayZill
{

    public function addPrice(int $price)
    {
        echo 'Item Price is ' . $price . '<br>';
    }

    public function addItem($item)
    {
        echo 'Your Item is ' . $item . '<br>';
    }
}
