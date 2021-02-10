<?php

namespace blogapp\useclass;

use mysqli;

require 'Error.php';



class Database
{

    private $host;
    private $username;
    private $password;
    private $databaseName;
    private  $connection;

    private $passwordType = PASSWORD_DEFAULT;




    public function __construct($host, $username, $password, $databaseName)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->databaseName = $databaseName;

        date_default_timezone_set('Asia/kolkata');
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


    public function checkUser($table, $userData)
    {
        if ($this->connection) {
            $query = "SELECT * FROM $table where email = ?";

            if ($stmt = $this->connection->prepare($query)) {
                $stmt->bind_param(
                    "s",
                    $this->connection->real_escape_string($userData['email']),
                );
                if ($stmt->execute()) {
                    $user = $stmt->get_result()->fetch_assoc();

                    if ($this->verifyPasswordHash($userData['password_hash'], $user['password_hash'])) {
                        return $user;
                    } else {
                        return  -1;
                    }
                } else {

                    return 0;
                }
            }
        }
    }

    public function addUser($table,  $user)
    {
        $sql = "INSERT  INTO  $table(prefix,first_name,last_name,mobile,email,password_hash,information,created_at) VALUES(?,?,?,?,?,?,?,?) ";

        $user['password_hash'] = $this->passwordHash($user['password_hash']);
        if ($this->connection) {
            if ($stmt = $this->connection->prepare($sql)) {
                @$stmt->bind_param(
                    "ssssssss",
                    $this->connection->real_escape_string($user['prefix']),
                    $this->connection->real_escape_string($user['first_name']),
                    $this->connection->real_escape_string($user['last_name']),
                    $this->connection->real_escape_string($user['mobile']),
                    $this->connection->real_escape_string($user['email']),
                    $this->connection->real_escape_string($user['password_hash']),
                    $this->connection->real_escape_string($user['information']),
                    $this->connection->real_escape_string(date('Y-m-d H:m:s', time())),
                );
                if ($stmt->execute()) {
                    return 1;
                }
            }
        }

        return $this->connection->error;
    }


    public function updateLoginTime($table, $user)
    {
        $sql = "INSERT INTO $table(last_login_at) VALUES(?) WHERE email = ?";
        if ($this->connection) {
            if ($stmt = $this->connection->prepare($sql)) {
                @$stmt->bind_param(
                    "ss",
                    $this->connection->real_escape_string($user['email']),
                    $this->connection->real_escape_string(date('Y-m-d H:m:s', time())),
                );
                if ($stmt->execute()) {
                    return 1;
                }
            }
        }

        return $this->connection->error;
    }


    private function passwordHash($password)
    {
        return password_hash($password, $this->passwordType);
    }

    private function verifyPasswordHash($password, $hash)
    {
        return password_verify($password, $hash);
    }


    public function __destruct()
    {
        $this->connection->close();
    }

    public function selectAllParentCategory()
    {
        $sql = "select * from parent_category";

        if ($this->connection) {
            $results = $this->connection->query($sql);

            return $results->fetch_all();
        }
        return false;
    }


    public function addCatgeory($data)
    {

        $sql = "INSERT  INTO  category( parent_category_id,title,meta_title,url,content,image,created_at) VALUES(?,?,?,?,?,?,?) ";

        if ($this->connection) {
            if ($stmt = $this->connection->prepare($sql)) {
                @$stmt->bind_param(
                    "issssss",
                    $this->connection->real_escape_string($data['parent_category_id']),
                    $this->connection->real_escape_string($data['title']),
                    $this->connection->real_escape_string($data['meta_title']),
                    $this->connection->real_escape_string($data['url']),
                    $this->connection->real_escape_string($data['content']),
                    $this->connection->real_escape_string($data['image']),
                    $this->connection->real_escape_string(date('Y-m-d H:m:s', time())),
                );
                if ($stmt->execute()) {
                    return 1;
                }
            }
        }

        return $this->connection->error;
    }

    public function getAllCategoryData()
    {
        $sql = "select category.id ,category.image,parent_category.category_name,category.created_at from category inner join parent_category on parent_category.parent_category_id=category.parent_category_id";


        if ($this->connection) {
            $result = $this->connection->query($sql);

            return $result->fetch_all();
        }
    }

    public function deleteById($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = ?";

        if ($this->connection) {
            if ($stmt = $this->connection->prepare($sql)) {
                @$stmt->bind_param(
                    "i",
                    $this->connection->real_escape_string($id),
                );
                if ($stmt->execute()) {
                    return 1;
                }
            }
        }

        return $this->connection->error;
    }

    public function selectById($table, $id)
    {

        $sql = "SELECT * FROM $table where id = ?";
        if ($this->connection) {
            if ($stmt = $this->connection->prepare($sql)) {
                @$stmt->bind_param(
                    "i",
                    $this->connection->real_escape_string($id),
                );
                if ($stmt->execute()) {
    
                    return $stmt->get_result()->fetch_assoc();
                }
            }
        }

        return $this->connection->error;
    }


    public function updateCatgeory($data)
    {

        $sql = "UPDATE `category` SET `parent_category_id`=?,`title`=?,`meta_title`=?,`url`=?,`content`=?,`image`=?,`updated_at`=?  WHERE id = ?";

        if ($this->connection) {
            if ($stmt = $this->connection->prepare($sql)) {
                @$stmt->bind_param(
                    "issssssi",
                    $this->connection->real_escape_string($data['parent_category_id']),
                    $this->connection->real_escape_string($data['title']),
                    $this->connection->real_escape_string($data['meta_title']),
                    $this->connection->real_escape_string($data['url']),
                    $this->connection->real_escape_string($data['content']),
                    $this->connection->real_escape_string($data['image']),
                    $this->connection->real_escape_string(date('Y-m-d H:m:s', time())),
                    $this->connection->real_escape_string($data['id']),
                );
                if ($stmt->execute()) {
                    return 1;
                }
            }
        }

        return $this->connection->error;
    }
}
