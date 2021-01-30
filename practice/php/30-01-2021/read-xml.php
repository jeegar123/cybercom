<?php


$students = simplexml_load_file('data.xml');

echo "<pre>";
print_r($students);
echo "</pre>";

foreach($students as $name){
    echo $name;
}
