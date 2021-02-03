<?php
function validateName($string)
{
    $string = filter_var(trim($string), FILTER_SANITIZE_STRING);

    if (filter_var($string, FILTER_VALIDATE_REGEXP, array(
        "options" => array("regexp" => "/^[a-zA-Z\s]*$/")
    ))) {
        return $string;
    } else {
        return false;
    }
}

function validateEmail($email)
{
    $email = filter_var(strtolower(trim($email)), FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $email;
    } else {
        return false;
    }
}

function validatePassword($password)
{
    $password = filter_var(trim($password), FILTER_SANITIZE_STRING);

    if (strlen($password) == 8) {
        return $password;
    } else {
        return false;
    }
}


function validatePhone($phone)
{

    $phone = filter_var(trim($phone), FILTER_SANITIZE_NUMBER_INT);

    if (filter_var($phone, FILTER_VALIDATE_INT)) {
        return $phone;
    } else {
        return false;
    }
}


function validateString($string)
{
    $string = filter_var(trim($string), FILTER_SANITIZE_STRING);

    return $string;
}
