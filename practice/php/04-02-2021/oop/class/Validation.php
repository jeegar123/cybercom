<?php

class FormValidation
{


    public function __construct()
    {
        // constructor
    }


    public function __destruct()
    {
        // destructor
    }



    public function validateEmail(?string $email)
    {
        /**
         *  @param $email string
         *  @return string or fasle
         * * validate email
         */
        $email = strtolower(trim($email));
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        }
        return false;
    }


    public function validateFullName(?string $name)
    {
        /**
         *  @param $name string
         *  @return string or fasle
         * * validate fullname
         */
        $name = trim($name);
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        if (filter_var($name, FILTER_VALIDATE_REGEXP, array(
            "options" => array("regexp" => "/[a-zA-Z\s]*/")
        ))) {
            return $name;
        }
        return false;
    }



}
