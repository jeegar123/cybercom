<?php

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
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->databaseName);
    }


    public function insert($table, $data)
    {
        $sql = "INSERT INTO $table VALUES(?,?,?)";

        if ($stmt = $this->connection->prepare($sql)) {
            $stmt->bind_param(
                "iss",
                mysqli_real_escape_string($this->connection, $data[0]),
                mysqli_real_escape_string($this->connection, $data[1]),
                mysqli_real_escape_string($this->connection, $data[2])
            );

            if ($stmt->execute()) {
                return 1;
            } else {
                return 0;
            }
        }
    }
}
