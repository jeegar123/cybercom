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

    private $connection;

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
            if (@!$this->connection = mysqli_connect($this->host, $this->username, $this->password)) {
                throw new ServerException();
            } else if (@!mysqli_select_db($this->connection, $this->databaseName)) {
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


    public function insert($table_name, array $keyvalueItems)
    {
        /**
         *  insert into database
         * 
         */
        $keyvalueItems = $this->validateData($keyvalueItems);


        if (array_key_first($keyvalueItems) == "0") {
            if (count($keyvalueItems) >= 2) {
                //  handle error
                return -1;
            }
        } else {
            $keys = array_keys($keyvalueItems);
            $values = array_values($keyvalueItems);

            $sql_query = "INSERT INTO $table_name(" . implode(',', $keys) . ") VALUES(" . implode(',', $this->sqlValues($values)) . ")";

            if (mysqli_query($this->connection, $sql_query)) {

                return 1;
            } else {
                return  $this->connection->error;;
            }
        }
    }


    private function validateData(array $data)
    {
        $filter_array = [];
        $errors = ["errors"];
        $validateForm = new FormValidation();

        foreach ($data as $fielddName => $fieldValue) {

            switch ($fielddName) {

                case FormValidation::NAME:
                    $validateForm->validateName($fieldValue);
                    if (!$validateForm)
                        $this->push_error($errors, "invalide name");
                    else
                        $filter_array[$fielddName] = $fieldValue;
                    break;
                case FormValidation::EMAIL:
                    $validateForm->validateEmail($fieldValue);
                    if (!$validateForm)
                        $this->push_error($errors, "invalide email");
                    else
                        $filter_array[$fielddName] = $fieldValue;
                    break;
                case FormValidation::TITLE:
                    $validateForm->validateTitle($fieldValue);
                    if (!$validateForm)
                        $this->push_error($errors, "invalide name");
                    else
                        $filter_array[$fielddName] = $fieldValue;

                    break;
                case FormValidation::PHONE:
                    $validateForm->validatePhoneNumber($fieldValue);
                    if (!$validateForm)
                        $this->push_error($errors, "invalide name");
                    else
                        $filter_array[$fielddName] = $fieldValue;
                    break;
                default:
                    $filter_array[$fielddName] = $fieldValue;
                    break;
            }
        }

        if (count($errors) >= 2)
            return $errors;
        return $filter_array;
    }


    private function push_error(array $error, $msg)
    {
        array_push($error, $msg);
    }

    public function sqlValues(array $values)
    {
        $data = [];
        foreach ($values as $value) {
            array_push($data, '\'' . $value . '\'');
        }
        return $data;
    }

    public function select($table, $id = null)
    {
        $query = null;
        if ($id != null)
            $query = "SELECT * FROM $table where id = $id";
        else
            $query = "SELECT * FROM $table";


        $results = mysqli_query($this->connection, $query);

        if ($results and $results->num_rows >= 1) {
            return mysqli_fetch_all($results);
        }
    }

    public function __destruct()
    {
        if ($this->connection)
            mysqli_close($this->connection);
    }

    public function update($table_name, array $keyvalueItems)
    {
        $user = $this->validateData($keyvalueItems);



        if (array_key_first($user) == "0") {
            if (count($user) >= 2) {
                //  handle error
                return -1;
            }
        } else {

            $sql_query = "UPDATE $table_name SET name = ? ,email = ? ,phone = ? , title = ? ,created =? WHERE id =?";

            if ($smt = mysqli_prepare($this->connection, $sql_query)) {
                mysqli_stmt_bind_param(
                    $smt,
                    "sssssi",
                    $user['name'],
                    $user['email'],
                    $user['phone'],
                    $user['title'],
                    $user['created'],
                    $user['id']
                );

                if (mysqli_stmt_execute($smt)) {
                    return 2;
                } else {
                    return -2;
                }
            }
        }
    }

    public function delete($table_name, int $id)
    {

        $sql_query = "DELETE FROM $table_name WHERE id = ?";

        if ($stmt  = mysqli_prepare($this->connection, $sql_query)) {

            mysqli_stmt_bind_param($stmt, "i", $id);

            if (mysqli_stmt_execute($stmt)) {
                return 3;
            } else {
                return -3;
            }
        }
    }
}
