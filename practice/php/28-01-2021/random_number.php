<?php


$random = rand();

$string = "abcdefghijklmnopqrstuvwxyz";
$length = strlen($string) - 1;



$rand_string = "";
for ($i = 0; $i < $length; $i++) {
    $rand_string .= $string[rand($i, $length)];
}

echo $rand_string;
