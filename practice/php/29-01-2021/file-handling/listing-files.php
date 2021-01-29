<?php
$dir ='images';
$handler = opendir($dir);

while ($file = readdir($handler)) {
    if ($file != '.' && $file != '..')
        echo "<img src='$dir/$file' height='100' width='100'> ";
}
