<?php

namespace admin;

class User
{

    public function __construct()
    {
        echo "I'm User class Admin module<br>";
        $userB =new \user\v1\test\User();    // to use other class with same name then we have to use \ before namespace
    }
}


function hello(){
    echo "I'm function class Admin module<br>";
}