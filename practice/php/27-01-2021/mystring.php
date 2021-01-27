<h1>String Practice...</h1>
<?php

$email = $_GET['email'] ?? null;

if ($email) {

    $email = strtolower($email);
    echo "Hey welcome, $email";
}

?>
<form action="<?= $_SERVER['PHP_SELF'] ?>">
    <input type="email" name="email" id="email" require placeholder="Email">
    <input type="submit" value="submit">
</form>

<?php
$paragraph = ' Cybercom Creation was commenced by enterprising team of professionals with a strong focus on providing services and solutions for Mobile/eCommerce businesses. Cybercom has successfully deployed more than 150+ large scale solutions for clients all over the world. After 17 years Cybercom has grown its team of dedicated specialists to more than 85 employees working in development centre in Ahmedabad, India and have expanded our global reach through alliance partners in Singapore, USA,UK and Australia. Team Cybercom brings together diverse people with varied skill set to promote collaboration, improve processes and accelerate their core competency to drive exceptional business results.';
?>

<div>
    <p>
        <?= $paragraph ?>
    </p>
</div>

<form action="<?= $_SERVER['PHP_SELF'] ?>">
    <input type="text" name="findword" id="findword" required placeholder="find text in paragraph">
    <input type="submit" value="submit">
</form>


<?php


$findword = $_GET['findword'] ?? null;


if ($findword) {
    $findword_length = strlen($findword);
    $offset = 0;

    while ($word_position = strpos($paragraph, $findword, $offset)) {
        echo "$findword found at position $word_position<br>";
        $offset = $word_position + $findword_length;
    }

    if (!$offset)
        echo "no word found";
}



// substring replace only starting poistion and length of other string

$string  = "Hello user,welcome to trainning.user should follow rules";

$new_string =substr_replace($string,"jeegar",6,4); 

echo '<br>'.$new_string;



// strreplace,it will replace many words even we can put in array
$string = "newword, hello .....newword, myword";

$find_words =array('newword','myword');
$replacement_words =array('***');

$string =str_replace($find_words,$replacement_words,$string);

echo "<br> $string";




?>