<h1>Refresh Page</h1>
<?php

if (file_exists('counter.txt')) {
    $file_data =file_get_contents('counter.txt');
    
    $file = fopen('counter.txt', 'w');
    fwrite($file, ++$file_data);
    echo $file_data;
    fclose($file);
    
} else {
    $file = fopen('counter.txt', 'w');
    fwrite($file, 0);
    echo 0;
    fclose($file);
}


?>