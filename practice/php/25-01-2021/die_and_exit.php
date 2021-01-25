<?php


define("MY_VALUE", "constant");


if (defined('MY_VALUE')) {
    echo MY_VALUE.' is avaliable';
} else {
    // die("undefined value");
    exit("undefined value");        
}

echo "<br>Hey there,welcome to php trainning ";



