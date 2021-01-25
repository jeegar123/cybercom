<?php

// function without args and return type
function sayHi()
{
    echo "Hello<br>";
}

sayHi();

//  function with args and return type
function isPrime($num)
{

    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0)
            return 0;;
    }

    return 1;
}

echo isPrime(5) ? 'number is prime<br>' : 'number is not prime';


function fullName($firstName, $lastName)
{
    return "$firstName $lastName";
}


// default args


function displayDetails(
    $fullName,
    $adddress,
    $city,
    $state,
    $location = "not provided"
) {

    echo <<< DOT
    Name : $fullName <br>
    Address : $adddress<br>
    city : $city<br>
    state : $state<br>
    location :$location<br>

    DOT;
}

displayDetails("xyz xyz", "hno xxy-,warzon", "ahemdabad", "gujarat");
// with arg
displayDetails("xyz xyz", "hno xxy-,warzon", "ahemdabad", "gujarat", "127.0.0.1");


// refrence parameters

function update_value(&$name)
{
    $name = "value change by refrence";
}

$name = "hello";

echo '$name = ' . $name . '<br>';
update_value($name);
echo 'After calling function $name = ' . $name;


//  passing n no. of args
function series_sum(...$nums)
{
    $sum = 0;
    foreach ($nums as $num) {
        $sum += $num;
    }
    return $sum;
}

//  named args


function user($name, $age)
{
    echo "$name $age";
}

// user(name:"test",age:1);             // valid in php 8
// user("name",1);


echo "<br>";
// echo $_SERVER['REQUEST_URI'];
print_r(explode("?",$_SERVER['REQUEST_URI']));
echo "<br>";
print_r(explode("?",$_SERVER['REQUEST_URI'])[1]);



// global varibals



echo "<br><br><br><br><br><br>";

$myvalue =10;


function printMyValue(){
    global $myvalue;
    echo $myvalue;
}


printMyValue();
