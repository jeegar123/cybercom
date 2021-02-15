<?php

date_default_timezone_set('Asia/Kolkata');

class Adapter
{
    private $config = [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'databaseName' => 'questecom'
    ];
    private $connection;


    public function isConnected()
    {
        if ($this->connection) {
            return true;
        }

        return false;
    }

    public function getConnection()
    {
        if ($this->isConnected()) {
            return $this->connection;
        }
        return false;
    }

    public function setConnection(mysqli $connection)
    {
        $this->connection = $connection;
    }

    public function connect()
    {
        if (!$this->isConnected()) {
            $this->connection = new mysqli(
                $this->config['host'],
                $this->config['username'],
                $this->config['password'],
                $this->config['databaseName']
            );
        }
    }

    public function insert($query)
    {
        if (!$this->isConnected()) {
            $this->connect();
        }

        $this->connection->query($query);
        return $this->connection->insert_id;
    }

    public function fetchAll($query)
    {
        if (!$this->isConnected()) {
            $this->connect();
        }
        return  $this->connection->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function __destruct()
    {
        if ($this->connection)
            $this->connection->close();
    }

    public function update($query)
    {
        if (!$this->isConnected()) {
            $this->connect();
        }

        return $this->connection->query($query);
    }

    public function fetchOne($query)
    {
        if (!$this->isConnected()) {
            $this->connect();
        }
        return  $this->connection->query($query)->fetch_assoc();
    }
}
