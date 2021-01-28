<?php
// header( "refresh:5;url=header_demo.php" );  // direct redirect
// echo 'You\'ll be redirected in about 5 secs. If not, click <a href="wherever.php">here</a>.';

/* if (1) {
    header('Location:test_redirect.php');
}
 */
function callback($buffer)
{
    return strtolower($buffer);
}

ob_start("callback");
?>

<h4>HELLO</h4>
<h4>HELLO</h4>
<h4>HELLO</h4>
<h4>HELLO</h4>
<h4>HELLO</h4>
<h4>HELLO</h4>
<h4>HELLO</h4>
<h4>HELLO</h4>
