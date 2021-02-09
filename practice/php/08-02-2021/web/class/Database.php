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

    public function insert_name($table,  $user)
    {
        $sql = "INSERT  INTO  $table(`name`,user_id) VALUES(?,?) ";


        if ($this->connection) {
            if ($stmt = $this->connection->prepare($sql)) {
                @$stmt->bind_param(
                    "si",
                    $this->connection->real_escape_string($user['name']),
                    $this->connection->real_escape_string($user['user_id'])
                );
                if ($stmt->execute()) {
                    return 1;
                }
            }
        }

        return $this->connection->error;
    }



    public function insert1($table, $data,$type)
    {
        /**
         * todo bind multi params
         * 
         */
        $keys = array_keys($data);
        $values = array_values($data);

        $question_marks = [];

        for ($i = 0; $i < count($keys); $i++) {
            array_push($question_marks, "?");
        }

        $sql_insert = "INSERT INTO $table(" . implode(',', $keys) . ") VALUES (" . implode(',', $question_marks) . ")";
        echo $sql_insert;
        if ($stmt = $this->connection->prepare($sql_insert)) {
            // $stmt->bind_param($type,$values);
            // echo $stmt->execute();
        }
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

    public function select_names($table,$colname,$value)
    {

        $sql = "SELECT * FROM $table WHERE $colname = ? ";

        if ($this->connection) {
            if ($stmt = $this->connection->prepare($sql)) {
                @$stmt->bind_param(
                    'i',
                    $this->connection->real_escape_string($value)
                );
                if ($stmt->execute())
                    return $stmt->get_result()->fetch_all();
            }
        }
        return $this->connection->error;
    }






    public function __destruct()
    {
        $this->connection->close();
    }
}
