<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $age = $_POST['age'] ?? null;

    if ($age) {
        try {
            if ($age <= 0) {
                throw new Exception('Can\'t be Zero or Negative number ');
            }
            echo "Your age is $age";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    } else {
        echo "age is required";
    }
}
?>



<form method="POST">
    <input type="number" name="age" id="age">
    <input type="submit" value="submit">
</form>




<?php
echo "New code<br>";
$num1 = 1;
$num2 = 2;
$result;
try {
    if ($num2 == 0) {
        throw new DivisionByZeroError('Number 2 can\'t be zero');
    }
    $result = $num1 / $num2;
    echo 'Your Result is '.$result;
} catch (DivisionByZeroError $ex) {
    echo 'Error. Line number :'.$ex->getLine().' Message '.$ex->getMessage();
}catch(Exception $ex){
    echo $ex;
}


?>