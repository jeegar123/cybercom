<?php


require 'custom_error.php';



class Database
{

    // variables
    private $hostname;  // host name
    private $username;  // database username
    private $password;  // database password
    private $database;   // database name

    private $connection;   //connection

    public function __construct($hostname, $username, $password, $database)
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->connect();
    }


    public function connect()
    {
        try {
            if (!@$this->connection = mysqli_connect($this->hostname, $this->username, $this->password)) {
                throw new ServerException();
            } else if (!@mysqli_select_db($this->connection, $this->database)) {
                throw new DatabaseException();
            } else {
                // echo "database is connected sucesfully<br>";
            }
        } catch (ServerException $serverException) {
            $serverException->showMessage();
        } catch (DatabaseException $databaseException) {
            $databaseException->showMessage($this->connection->errror);
        }
    }

    public function insert(string $table, array $data)
    {
        /**
         * @param $table    table name
         * @param array $data   $data must be have key and values pair in data
         * 
         */
        $keys = array_keys($data);
        $values = $this->sqlValues(array_values($data));
        $query = "INSERT INTO $table(" . implode(",", $keys) . ") VALUES(" . implode(",", $values) . ")";
        // echo $query;
        if (mysqli_query($this->connection, $query)) {
            // echo "data added";
            return true;
        } else {
            // echo "data not added" . $this->connection->error;
            return false;
        }
    }




    public function sqlValues(array $values)
    {
        $data = [];
        foreach ($values as $value) {
            array_push($data, '\'' . filter_var($value, FILTER_SANITIZE_STRING) . '\'');
        }
        return $data;
    }

    public function select($table)
    {
        $query = "SELECT * FROM $table";

        $results = mysqli_query($this->connection, $query);
        
        if ($results and $results->num_rows >= 1) {
            return mysqli_fetch_all($results);
        }
    }



    public function __destruct()
    {
        $this->hostname = null;
        $this->username = null;
        $this->password = null;
        $this->database = null;

        @mysqli_close($this->connection);
        // echo "database is disconnected<br>";
    }

    public function selectByString($table, $coloumnName, $string)
    {
        $query = "SELECT name FROM $table WHERE  $coloumnName  LIKE '%$string%' ";


        $results = mysqli_query($this->connection, $query);

        if ($results and $results->num_rows >= 1) {
            return mysqli_fetch_all($results);
        }
        return false;
    }

    
}
