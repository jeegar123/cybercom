<?php

date_default_timezone_set('Asia/Kolkata');

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
        try {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->databaseName);
            if (!$this->connection)
                throw new Exception('error in connection');
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    private function sqlValue($value)
    {
        return mysqli_escape_string($this->connection, $value);
    }
    public function insertCustomer(Customer $object)
    {
        if ($this->connection) {
            $sql = 'INSERT INTO customer(' . implode(",", $object->getInsertKeys()) . ') VALUES( ?,?,?,?,?,?)';

            if ($stmt = $this->connection->prepare($sql)) {
                @$stmt->bind_param(
                    "ssssis",
                    $object->firstName,
                    $object->lastName,
                    $object->email,
                    $object->password,
                    $object->status,
                    $object->createdDate
                );
                if ($stmt->execute())
                    return 1;
            }
        }
        return $this->connection->errono;
    }

    public function getAllCustomers()
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

    public function getCustomerByID($id)
    {
        if ($this->connection) {
            $sql = 'SELECT * FROM customer where customer_id = ?';

            if ($stmt = $this->connection->prepare($sql)) {
                $stmt->bind_param('i', $id);
                if ($stmt->execute()) {
                    $result = $stmt->get_result()->fetch_assoc();
                    return $result;
                }
            }
        }
        return 0;
    }

    public function updateCustomer(Customer $object)
    {
        $sql = 'UPDATE `customer` SET `first_name`= ? ,`last_name`= ?,`email`= ?,`password`= ?,`status`=?,`updated_date`=?  WHERE customer_id = ?';

        if ($stmt = $this->connection->prepare($sql)) {
            $stmt->bind_param(
                'ssssisi',
                $object->firstName,
                $object->lastName,
                $object->email,
                $object->password,
                $object->status,
                $object->updatedDate,
                $object->customerId
            );

            if ($stmt->execute()) {
                return 1;
            }
        }
        return 0;
    }

    public function deleteCustomerById($id)
    {
        if ($this->connection) {
            $sql = 'DELETE FROM customer where customer_id = ?';

            if ($stmt = $this->connection->prepare($sql)) {
                $stmt->bind_param('i', $id);
                if ($stmt->execute()) {
                    return 1;
                }
            }
        }
        return 0;
    }

    public function insertCategory(Category $object)
    {
        if ($this->connection) {
            $sql = 'INSERT INTO category(name,status,description) VALUES( ?,?,?)';

            if ($stmt = $this->connection->prepare($sql)) {
                @$stmt->bind_param(
                    "sis",
                    $object->name,
                    $object->status,
                    $object->description
                );
                if ($stmt->execute())
                    return 1;
            }
        }
        return $this->connection->errono;
    }

    public function getAllCategory()
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

    public function getCategoryByID($id)
    {
        if ($this->connection) {
            $sql = 'SELECT * FROM category where category_id = ?';

            if ($stmt = $this->connection->prepare($sql)) {
                $stmt->bind_param('i', $id);
                if ($stmt->execute()) {
                    $result = $stmt->get_result()->fetch_assoc();
                    return $result;
                }
            }
        }
        return 0;
    }
    public function updateCategory(Category $object)
    {
        $sql = 'UPDATE `category` SET `name`= ?,`status`= ?,`description`= ? WHERE category_id = ?';

        if ($stmt = $this->connection->prepare($sql)) {
            $stmt->bind_param(
                'sisi',
                $object->name,
                $object->status,
                $object->description,
                $object->categoryId,
            );

            if ($stmt->execute()) {
                return 1;
            }
        }
        return 0;
    }

    public function deleteCategoryById($id)
    {
        if ($this->connection) {
            $sql = 'DELETE FROM category where category_id = ?';

            if ($stmt = $this->connection->prepare($sql)) {
                $stmt->bind_param('i', $id);
                if ($stmt->execute()) {
                    return 1;
                }
            }
        }
        return 0;
    }


    public function insertProduct(Product $object)
    {
        if ($this->connection) {
            $sql = 'INSERT INTO `product`(`sku`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`) VALUES (
                ?,?,?,?,?,?,?,?
            )';

            if ($stmt = $this->connection->prepare($sql)) {
                @$stmt->bind_param(
                    "ssiiisis",
                    $object->sku,
                    $object->name,
                    $object->price,
                    $object->discount,
                    $object->quantity,
                    $object->description,
                    $object->status,
                    $object->createdDate,

                );
                if ($stmt->execute())
                    return 1;
            }
        }
        return $this->connection->errono;
    }

    public function getAllProducts()
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

    public function deleteProductById($id)
    {
        if ($this->connection) {
            $sql = 'DELETE FROM product where product_id = ?';

            if ($stmt = $this->connection->prepare($sql)) {
                $stmt->bind_param('i', $id);
                if ($stmt->execute()) {
                    return 1;
                }
            }
        }
        return 0;
    }


    public function getProductByID($id)
    {
        if ($this->connection) {
            $sql = 'SELECT * FROM product where product_id = ?';

            if ($stmt = $this->connection->prepare($sql)) {
                $stmt->bind_param('i', $id);
                if ($stmt->execute()) {
                    $result = $stmt->get_result()->fetch_assoc();
                    return $result;
                }
            }
        }
        return 0;
    }

    public function updateProduct(Product $object)
    {
        $sql = 'UPDATE `product` SET `sku`= ?,`name`= ?,`price`=? ,`discount`=?,`quantity`=?,`description`=? ,`status`= ?,`updatedDate`= ? WHERE product_id = ?';

        if ($stmt = $this->connection->prepare($sql)) {
            $stmt->bind_param(
                'ssiiisisi',
                $object->sku,
                $object->name,
                $object->price,
                $object->discount,
                $object->quantity,
                $object->description,
                $object->status,
                $object->updatedDate,
                $object->productId,
            );

            if ($stmt->execute()) {
                return 1;
            }
        }
        return 0;
    }
}
