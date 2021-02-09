<?php

namespace myclass;

use mysqli;

require 'FormValidation.php';
require 'Error.php';



class Database
{

    private $host;
    private $username;
    private $password;
    private $databaseName;
    private  $connection;




    public function __construct($host, $username, $password, $databaseName)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->databaseName = $databaseName;


        $this->connect();
    }

    public function connect()
    {
        // to connect database

        try {
            if (!@$this->connection = new mysqli($this->host, $this->username, $this->password, $this->databaseName)) {
                throw new ServerException();
            } else if (!@$this->connection->select_db($this->databaseName)) {
                throw new DatabaseException();
            } else {
                // echo "connected";
            }
        } catch (ServerException $ex) {
            $ex->showMessage();
        } catch (DatabaseException $ex) {
            $ex->showMessage($this->connection->error);
        }
    }


    public function insert($table,  $user)
    {
        $sql = "INSERT  INTO  $table(first_name,last_name,username,password,dob) VALUES(?,?,?,?,?) ";


        if ($this->connection) {
            if ($stmt = $this->connection->prepare($sql)) {
                @$stmt->bind_param(
                    "sssss",
                    $this->connection->real_escape_string($user->firstName),
                    $this->connection->real_escape_string($user->lastName),
                    $this->connection->real_escape_string($user->userName),
                    $this->connection->real_escape_string($user->password),
                    $this->connection->real_escape_string($user->dob),
                );
                if ($stmt->execute()) {
                    return 1;
                }
            }
        }

        return $this->connection->error;
    }


    public function selectOneByColumn($table, $colname, $value, $type)
    {

        $sql = "SELECT * FROM $table WHERE $colname = ?";

        if ($this->connection) {
            if ($stmt = $this->connection->prepare($sql)) {
                @$stmt->bind_param(
                    $type,
                    $this->connection->real_escape_string($value),
                );
                if ($stmt->execute())
                    return $stmt->get_result()->fetch_assoc();
            }
        }
        return false;
    }





    public function __destruct()
    {
        $this->connection->close();
    }
}
