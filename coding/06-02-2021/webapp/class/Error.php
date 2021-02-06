<?php


namespace myclass;

use Exception;

class ServerException extends Exception
{

    public function showMessage()
    {
        echo "Could not connect Server";
    }
}


class  DatabaseException extends Exception
{

    public function showMessage($error)
    {
        echo "Could not connect Database .Message is $error";
    }
}
