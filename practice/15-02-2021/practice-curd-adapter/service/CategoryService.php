<?php

namespace service;

use models\Database;

require '../model/Database.php';



class CategoryService implements Database
{

    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function insert($object)
    {
        if ($this->connection) {
            $sql = 'INSERT INTO category(name,status,description) VALUES( ?,?,?)';

            if ($stmt = $this->connection->prepare($sql)) {
                @$stmt->bind_param(
                    "sis",
                    mysqli_escape_string($this->connection, $object->name),
                    mysqli_escape_string($this->connection, $object->status),
                    mysqli_escape_string($this->connection, $object->description)
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
            $sql = 'DELETE FROM category where category_id = ?';

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
        $sql = 'UPDATE `category` SET `name`= ?,`status`= ?,`description`= ? WHERE category_id = ?';

        if ($stmt = $this->connection->prepare($sql)) {
            $stmt->bind_param(
                'sisi',
                mysqli_escape_string($this->connection, $object->name),
                mysqli_escape_string($this->connection, $object->status),
                mysqli_escape_string($this->connection, $object->description),
                mysqli_escape_string($this->connection, $object->categoryId),
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
            $sql = 'SELECT * FROM category where category_id = ?';

            if ($stmt = $this->connection->prepare($sql)) {
               @ $stmt->bind_param('i',  mysqli_escape_string($this->connection, $id));
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
            $sql = 'SELECT * FROM category';
            $result = $this->connection->query($sql);
            if ($result) {
                $result = $result->fetch_all(MYSQLI_ASSOC);
            }
            return $result;
        }
    }
}
