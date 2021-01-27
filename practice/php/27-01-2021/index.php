<?php

/* require ,include,require_once,include_once */

// include './header.inc.php';
// include 'test.php';     //if file not found then it will give warning and it will not kill exceution of file
require './header.inc.php';  
// require './test.inc.php';  // same as include but it will kill exceution


//  check if file is already included,if its included then it will not include again 
include_once './header.inc.php'; 
require_once './header.inc.php'; 
?>


<h3>Contents</h3>
<ul>
    <li><a href="myarrays.php">Arrays</a></li>
    <li><a href="mystring.php">strings</a></li>
    <li><a href="mini_program_for_strings.php">mini-prorgam-strings</a></li>
</ul>



<?php include './footer.inc.php'; ?>