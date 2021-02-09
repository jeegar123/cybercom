<?php


namespace myclass;


class User
{

    private $firstName;
    private $lastName;
    private $userName;
    private $password;
    private $dob;

    private $passwordType = PASSWORD_DEFAULT;


    public function __construct($firstName = null, $lastName = null, $userName = null, $password = null, $dob = null)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->userName = $userName;
        $this->password = password_hash($password, $this->passwordType);
        $this->dob = $dob;
    }


    public function __get($name)
    {
        if (property_exists($this, $name))
            return $this->$name;
        else
            return false;
    }


    public function __set($name, $value)
    {
        if (property_exists($this, $name))
            if($name=="password")
                 $this->$name = password_hash($value,$this->passwordType);
            else 
            $this->$name = $value;
    }

    public static function  verifyPassword($password,$hash){
        return password_verify($password,$hash);
    }
}
