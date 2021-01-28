<?php


echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
$browser = get_browser(null, true);

echo "<pre>";
print_r($browser);
echo "</pre>";

echo $browser['browser'];
?>