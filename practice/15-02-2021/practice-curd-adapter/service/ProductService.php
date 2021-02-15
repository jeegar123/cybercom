<?php

namespace service;

use models\Database;
use mysqli;

require '../model/Database.php';

class ProductService implements Database
{

    private $connection;

    public function __construct(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function insert($object)
    {
        if ($this->connection) {
            $sql = 'INSERT INTO `product`(`sku`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`) VALUES (
                ?,?,?,?,?,?,?,?
            )';

            if ($stmt = $this->connection->prepare($sql)) {
                @$stmt->bind_param(
                    "ssiiisis",
                    mysqli_escape_string($this->connection,$object->sku),
                    mysqli_escape_string($this->connection,$object->name),
                    mysqli_escape_string($this->connection,$object->price),
                    mysqli_escape_string($this->connection,$object->discount),
                    mysqli_escape_string($this->connection,$object->quantity),
                    mysqli_escape_string($this->connection,$object->description),
                    mysqli_escape_string($this->connection,$object->status),
                    mysqli_escape_string($this->connection,$object->createdDate),

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
            $sql = 'DELETE FROM product where product_id = ?';

            if ($stmt = $this->connection->prepare($sql)) {
                $stmt->bind_param('i',  mysqli_escape_string($this->connection,$id));
                if ($stmt->execute()) {
                    return 1;
                }
            }
        }
        return 0;
    }

    public function update($object)
    {
        $sql = 'UPDATE `product` SET `sku`= ?,`name`= ?,`price`=? ,`discount`=?,`quantity`=?,`description`=? ,`status`= ?,`updatedDate`= ? WHERE product_id = ?';

        if ($stmt = $this->connection->prepare($sql)) {
            $stmt->bind_param(
                'ssiiisisi',
                mysqli_escape_string($this->connection,$object->sku),
                mysqli_escape_string($this->connection,$object->name),
                mysqli_escape_string($this->connection,$object->price),
                mysqli_escape_string($this->connection,$object->discount),
                mysqli_escape_string($this->connection,$object->quantity),
                mysqli_escape_string($this->connection,$object->description),
                mysqli_escape_string($this->connection,$object->status),
                mysqli_escape_string($this->connection,$object->updatedDate),
                mysqli_escape_string($this->connection,$object->productId),
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
            $sql = 'SELECT * FROM product where product_id = ?';

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
            $sql = 'SELECT * FROM product';
            $result = $this->connection->query($sql);
            if ($result) {
                $result = $result->fetch_all(MYSQLI_ASSOC);
            }
            return $result;
        }
    }
}
