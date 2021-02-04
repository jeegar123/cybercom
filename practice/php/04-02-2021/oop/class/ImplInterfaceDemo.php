<?php

require 'InterfaceDemo.php';


class ImplInterfaceDemo implements InterfaceDemo{

    public function sayHello()
    {
        echo "hello";
    }

}

