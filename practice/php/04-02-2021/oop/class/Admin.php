<?php


spl_autoload_register(function ($class_name) {
    include $class_name;
});


class Admin extends User
{

    public function __construct($username, $password, $fullname)
    {
        echo "Contructing object of Admin<br>";
        parent::__construct($username, $password);
        $this->fullname = $fullname;
    }


    public function display()
    {
        parent::display();
        echo "Your Full Name is " . $this->fullname . '<br>';
    }


    public function __destruct()
    {
        echo "destructing object of Admin<br>";
    }
}
