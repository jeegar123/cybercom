<?php

// namespace should be at top
// namespace admin;   //global namespace so we area ddding this file conetnt in namespace


use \user\v1\test as user;

require './admin/User.php';
require './user/User.php';

// function hello(){
//     echo "I'm function<br>";                 // due to admin namespace already have function name
// }


function hello(){
    echo "I'm function<br>";
}




$userA =new admin\User();

$userB =new user\User();

admin\hello();
// user\hello();
user\hello();