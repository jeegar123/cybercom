<?php


$email = $_GET['email'] ?? null;

$pattern = "/[a-z][a-z|0-9|_]*@cybercom.co.in$/";

if ($email) {
    $isValid = preg_match($pattern, $email);

    if ($isValid) {
        echo "welcome, user";
    } else {
        echo "invalid user";
    }
}

?>




<div>
    <form>
        <input type="email" name="email" placeholder="Email" />
        <input type="submit" />
    </form>
</div>