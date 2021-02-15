<?php

use myclass\Customer;
use myclass\Paytm;
use myclass\PayZill;
use myclass\PayzillaAdapter;


require './Customer.php';
require './PayZill.php';
require './Paytm.php';
require './solution/PayzillaAdapter.php';
require './solution/PaytmAdapter.php';



$pay =new PayZill();
$customer =new Customer($pay);
$customer->buyItems('candy',100);


// $pay = new Paytm();
// $customer =new Customer($pay);      
// $customer->buyItems('candy',100); // it wont run beczusee customer only support payzilla payemnt class only

echo '<br>';


$paytm=new Paytm();
$pay = new PaytmAdapter($paytm);
$customer =new Customer($pay);
$customer->buyItems('tea',10);

echo '<br>';

$paytm=new PayZill();
$pay = new PayzillaAdapter($paytm);
$customer =new Customer($pay);
$customer->buyItems('tea',13);

