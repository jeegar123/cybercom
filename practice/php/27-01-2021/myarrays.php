<?php


/**
 *      Arrays Practice
 * 
 */


//  basic Array  or indexed array without keys
$players = array("Jeegar", "Captain India", "G-Man", "Shiva");

//  add value
$players[4] = "Avinash";

print_r($players);

//  var_dump($players);

// associative array     (more easy to deal with array)

$players = array(
    "#ul98d9j" => 'Jeegar',
    "#ul98234" => 'Captain India',
    "#ul91d94" => 'G-Man',
    "#ul9349t" => 'Shiva'
);
echo "<br>";
print_r($players);
echo "<br> Player #ul98d9j Tag Name is " . $players['#ul98d9j'];


// short syntax
$players = [
    "#ul98d9j" => 'Jeegar',
    "#ul98234" => 'Captain India',
    "#ul91d94" => 'G-Man',
    "#ul9349t" => 'Shiva'
];
echo "<br>";
print_r($players);
echo "<br> Player #ul98d9j Tag Name is " . $players['#ul91d94'];


/**
 *  array with different data types keys,
 * if data type is different it should unique value other php convert to to one key
 */


$type = [
    1 => "rollno.",
    true => "always true",
    1 => "float value",
    "1" => "string test",
];

echo "<br>";
echo 'Size of array ' . count($type) . "<br>";
var_dump($type);
echo "<br>";

/* 
    Multi dimension Array
*/

$trainnies = array(
    'trannieA',
    'trannieB',
    'trannieC',
    'trannieD'
);


// multi dimension array
$trainnies_results = array(
    'js' => array(
        $trainnies[0] => 12,
        $trainnies[1] => 17,
        $trainnies[2] => 10,
        $trainnies[3] => 9,
    ),
    'php' => array(
        $trainnies[0] => 18,
        $trainnies[1] => 15,
        $trainnies[2] => 10,
        $trainnies[3] => 10,
    )
);

var_dump($trainnies_results);
echo "<br>";


// access trannieA marks of Js and Php

echo "<br>";
echo $trainnies[0] . "<br>";
echo 'Marks of Js is ' . $trainnies_results['js'][$trainnies[0]] . '<br>';
echo 'Marks of Php is ' . $trainnies_results['php'][$trainnies[0]] . '<br>';
echo "<br>";

// array operation 

// update element
$trainnies[3] = 'Trannie D';


// delete element   
unset($trainnies[3]);
/*  
Note:: After deleteing element index will not change if we add new element 
it will create new index
eg.
$trainnies = array(
    0 => 'trannieA',
    1 => 'trannieB',
    2 => 'trannieC',
    3 => 'trannieD'
);

if last trannie has key 3 and delete that last element ,after adding new element 
the new index will 4 not 3 so we have to reindex 
to follow sequence we have to use array_values function 
*/

// insert
$trainnies[] = 'Trannie D';


print_r(array_values($trainnies));

echo "<br>";

// foreach loop


foreach ($trainnies_results as $course => $marks) {

    echo "<b>$course Marks</b><br>";

    foreach ($marks as $name => $score) {
        echo "$name $score <br>";
    }
}


// array_change_key_case   .it will change keys to lower

$users = array(
    "Name" => 'test',
    "email" => 'test@gmail.com'
);

print_r(array_change_key_case($users));


// chunks array with some length

print_r(array_chunk($users, 1));


// array_column return particular column that have same key

print_r(array_column($trainnies_results, $trainnies[1]));


// array combine  to combine keys and values


$keys = array('name', 'rollno');
$values = array('jeegar', 12);

print_r(array_combine($keys,$values));  

// array_count_values   count values inside array


$array = array(1, "hello", 1, "world", "hello");

print_r(array_count_values($array));

// array_diff_assoc() comparison given by two arrays with respect to keys

$arr1= array(
    "a" => "green" ,
    "c" => "red" ,
    "s" => "blue" ,
    "violet"
);


$arr2= array(
    "a" => "blue" ,
    "s" => "blue" ,
    "e" => "ornage",
    "purple"
);



print_r(array_diff_assoc($arr1,$arr2));

