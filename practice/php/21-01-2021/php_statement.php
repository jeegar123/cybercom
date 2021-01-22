<h1>Statments in Php</h1>

<?php
$age = 0;
if (isset($_GET['age'])) {
    $age = $_GET['age'];
}

?>




<div>
    <form>
        <input type="number" placeholder="Age" min="1" name="age">
        <input type="submit">
    </form>

    <span>
        Your Age is <?= $age ?>
    </span>

</div>


<?php
// ternary operator

if ($age) {

    if ($age >= 18) {
        echo $age>=18 && $age<=55 ? 'You are Adult' :'Your are Old';
    } else {
        echo $age<18 && $age>=13 ? 'You are Teen' :'You are child';
    }
    echo '<br>';
}

?>

<?php
    
    if($age){
     
        if($age ==12){
            echo 'You are lucky';
        }elseif( $age ==26){
            echo 'You are lucky';
        }elseif ($age ==65){
            echo 'You are lucky';
        }else{
            echo 'Never Stops life';
        }
    }
    echo "<br>"

?>


<?php
    if($age){
        $age +=10;
        echo "Your age after 10 years will be $age";
    }

?>
