<?php

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
