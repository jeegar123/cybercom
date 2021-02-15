<?php

namespace service;

use models\Database;

require '../model/Database.php';



class CustomerService implements Database
{

    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function insert($object)
    {
        if ($this->connection) {
            $sql = 'INSERT INTO customer(`first_name`, `last_name`, `email`, `password`, `status`, `created_date` ) VALUES( ?,?,?,?,?,?)';

            if ($stmt = $this->connection->prepare($sql)) {
                @$stmt->bind_param(
                    "ssssis",
                    mysqli_escape_string($this->connection, $object->firstName),
                    mysqli_escape_string($this->connection, $object->lastName),
                    mysqli_escape_string($this->connection, $object->email),
                    mysqli_escape_string($this->connection, $object->password),
                    mysqli_escape_string($this->connection, $object->status),
                    mysqli_escape_string($this->connection, $object->createdDate)
                );
                if ($stmt->execute())
                    return 1;
            }
        }
        return $this->connection->errono;
    }

    public function delete($id)
    {
        if ($this->connection) {
            $sql = 'DELETE FROM customer where customer_id = ?';

            if ($stmt = $this->connection->prepare($sql)) {
                $stmt->bind_param('i',  mysqli_escape_string($this->connection, $id));
                if ($stmt->execute()) {
                    return 1;
                }
            }
        }
        return 0;
    }

    public function update($object)
    {
        $sql = 'UPDATE `customer` SET `first_name`= ? ,`last_name`= ?,`email`= ?,`password`= ?,`status`=?,`updated_date`=?  WHERE customer_id = ?';

        if ($stmt = $this->connection->prepare($sql)) {
            $stmt->bind_param(
                'ssssisi',
                mysqli_escape_string($this->connection,$object->firstName),
                mysqli_escape_string($this->connection,$object->lastName),
                mysqli_escape_string($this->connection,$object->email),
                mysqli_escape_string($this->connection,$object->password),
                mysqli_escape_string($this->connection,$object->status),
                mysqli_escape_string($this->connection,$object->updatedDate),
                mysqli_escape_string($this->connection,$object->customerId)
            );

            if ($stmt->execute()) {
                return 1;
            }
        }
        return 0;
    }

    public function getById($id)
    {
        if ($this->connection) {
            $sql = 'SELECT * FROM customer where customer_id = ?';

            if ($stmt = $this->connection->prepare($sql)) {
                @$stmt->bind_param('i',  mysqli_escape_string($this->connection,$id));
                if ($stmt->execute()) {
                    $result = $stmt->get_result()->fetch_assoc();
                    return $result;
                }
            }
        }
        return 0;
    }

    public function getAll()
    {
        if ($this->connection) {
            $sql = 'SELECT * FROM customer';
            $result = $this->connection->query($sql);
            if ($result) {
                $result = $result->fetch_all(MYSQLI_ASSOC);
            }
            return $result;
        }
    }
}
