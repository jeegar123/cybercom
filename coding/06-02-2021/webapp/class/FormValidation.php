<?php

namespace myclass;

class FormValidation
{
    public const EMAIL="email";
    public const NAME="name";
    public const PHONE="phone";
    public const TITLE="title";

    public function validateEmail(?string $email)
    {

        $email = strtolower(trim($email));
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        }
        return false;
    }


    public function validateName(?string $name)
    {

        $name = trim($name);
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        if (filter_var($name, FILTER_VALIDATE_REGEXP, array(
            "options" => array("regexp" => "/[a-zA-Z\s]*/")
        ))) {
            return $name;
        }
        return false;
    }

    public function validateTitle(?string $name)
    {

        $name = trim($name);
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        return $name;
    }


    public function validatePhoneNumber(?int $phone)
    {
        $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);

        if (filter_var($phone, FILTER_VALIDATE_INT)) {
            return $phone;
        }
        return false;
    }
}
