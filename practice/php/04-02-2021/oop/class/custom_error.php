<?php

class ServerException extends Exception
{

    function showMessage()
    {
        echo 'Error at line number ' . $this->getLine() . '  Sorry could not Server ';
    }
}



class DatabaseException extends Exception
{

    function showMessage($error)
    {

        echo 'Error at line number ' . $this->getLine() . ' Message  ' . $error . ' and code is ' . $this->getCode() . ' Sorry could not connect Database ';
    }
}
