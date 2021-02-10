<?php

namespace blogapp\useclass;


class FormValidation
{


    public function validateEmail(?string $email)
    {
        $email = strip_tags(strtolower(trim($email)));
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        }
        return false;
    }


    public function validateName(?string $name)
    {

        $name = strtolower(strip_tags(trim($name)));
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        if (filter_var($name, FILTER_VALIDATE_REGEXP, array(
            "options" => array("regexp" => "/^[a-zA-Z]*$/")
        ))) {
            return $name;
        }
        return false;
    }

    public function validatePassword($password)
    {
        $password = strip_tags(trim($password));
        return $password;
    }

    public function validateString($string)
    {
        $password = strip_tags(trim($string));
        return $password;
    }

    public function validateMobileNumber($phone){
        $phone =filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        if(filter_var($phone,FILTER_VALIDATE_INT))
            return $phone;
        return false;

    }


}
