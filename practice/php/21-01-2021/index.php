
<?php
//  CONSTANT  
// define("test","1");
// error_reporting(E_ALL);

echo "hello php";

// let see all details of php info-configuartion in our sever 

// phpinfo();



//  add html tag in php
echo 'test<br>';
echo 'test 2';

// include('test.php');

$fullName = 'Jeegar Vinodkumar';
$companyName = 'CyberCom Creation';
$year = 2021;
?>

<!-- emebded php in html -->
<h1>
    <?php
    $title = ' First Day of Php ';
    echo $title;
    ?>
</h1>



<h2>Hey <?php echo $fullName ?> ,Welcome to <?php echo $companyName ?></h2>

<a href="./php_statement.php">Statements</a>
<a href="./loops.php">loops</a>

