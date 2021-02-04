<?php


class User
{
    //  property
    public $message = "This is OOP with PHP";

    // private
    private $id;
    private ?string $userName;
    private ?string $password;

    // protected
    protected $fullname;


    const className = "User";



    //constructor
    public function __construct(?string $userName, ?string $password)
    {
        echo "Contructing object of User<br>";
        $this->userName = $userName;
        $this->password = $password;
    }



    // destructor

    public function __destruct()
    {
        echo "destructing object of User<br>";
    }

    // magic methods
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            return $this->$name = $value;
        }else{
            echo "no Property $name is class";
            
        }
    }


    public function __get($name)
    {
        return $this->$name;
    }



    public function display()
    {
        echo 'Username is ' . $this->userName . '<br>';
        echo 'Password is ' . $this->password . '<br>';
    }





    // methood
    public function sayHi()
    {
        echo "Hey User,";
    }
}
