<h1>Strings</h1>

<?php

$bioData = $_GET['bio'] ?? null;


if ($bioData) {
    echo $bioData . '<br>';
    $no_of_words = str_word_count($bioData, 0, '.$');
    echo 'Number of words in String' . $no_of_words;
    // print_r($no_of_words) ;
}

?>

<div>

    <form action="<?= $_SERVER['PHP_SELF']; ?>">
        <textarea cols="50" rows="10" placeholder="BIO" name="bio"></textarea>
        <input type="submit">
    </form>

</div>



<div>
    <h2>Generate Unique Letters String</h2>
    <form action="<?= $_SERVER['PHP_SELF']; ?>">
        <input type="number" name="number" placeholder="enter length of string">
        <input type="submit">
    </form>
</div>

<?php

$string = "abcdefghijklmnopqrstuvwxyz";

$string_unique = str_shuffle($string);


$input_range = $_GET['number'] ?? 0;

if ($input_range) {
    $user_string = substr($string_unique, 0, $input_range);
    echo 'Your Unqiue Character String is ' . $user_string;
}

// similarity text

$stringA = "jeegar";
$stringB = "jeegar1.0";

similar_text($stringA, $stringB, $result);

echo 'Similarity betw 2 string is ' . $result;



// add slashes

$string_security = "My Password is 1234567890";

$string_encode = addcslashes($string_security, "A..z0..9");

echo '<br> encode string  : ' . $string_encode;

$string_decode = stripcslashes($string_encode);

// echo '<br> decode string  : '.$string_decode;




$string = "My Data";
// encoding string
echo '<br>' . convert_uuencode($string);
echo '<br>' . convert_uudecode('\'37D@1&%T80`` `');


//  count chars  mode 3 will give unique chars in string and 4 give not used chars in string
print_r(count_chars($string, 3));


// spliting string
echo "<br>";
print_r(explode(" ", $string));


// implode
$data = array(1, 2, 3, 4, 5);

echo "<br>Array is " . implode(" ", $data);


// encode and decode html tags

$string = '<a href="https://www.google.com/">google</a>';

echo '<br>' . htmlentities($string, ENT_QUOTES);
echo '<br>' . htmlentities($string, ENT_QUOTES);
// $str = "A 'quote' is <b>bold</b>";

// Outputs: A 'quote' is &lt;b&gt;bold&lt;/b&gt;
// echo htmlentities($str);                 // not working




// trim remove white space from starting and ending and we can even remove other chars too from starting and ending

$string = '  Hello  Welcome  ';

$string_length = strlen($string);

echo "<br> This is  '$string'  and length of thi string : $string_length";
$string = trim($string);    
$string_length = strlen($string);
echo "<br> This is  '$string'  and length of thi string : $string_length";

$string = "#hee#";

echo trim($string,"#");

$string = '  Hello  Welcome     ';
$string_length = strlen($string);
echo "<br> This is  '$string'  and length of thi string : $string_length";
$string = ltrim($string);               // triming left side
$string_length = strlen($string);
echo "<br> This is  '$string'  and length of thi string : $string_length";


$string = 'Hello  Welcome     ';
$string_length = strlen($string);
echo "<br> This is  '$string'  and length of thi string : $string_length";
$string = rtrim($string);           // triming  right side
$string_length = strlen($string);
echo "<br> This is  '$string'  and length of thi string : $string_length";

?>