<?php

class DataBaseConn
{
 private $host = "";
 private $user = "";
 private $password = "";
 private $database = "";

    /**
     * @param string $host host name (eg. localhost)
     * @param string $user user name
     * @param string $password user password
     * @param string $database database name
     */
    public function __construct(string $host, string $user, string $password, string $database)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }


    /**
     * @param String $table name of the table
     * @param any $columns name of columns; not used
     * @param array $values values, that will be added to $table
     * @return boolean info whether the connection has been established
     */
    public function put($table, $columns, $values){
        $connection = new mysqli($this->host, $this->user, $this->password, $this->database);
        if(!$connection){
            echo "Connection failed: " . $connection->connect_error;
            $connection->close();
            return false;
        }
        else {
            foreach ($values as $value){
                $query = "INSERT INTO $table  VALUES ($value);";

                if($connection->query($query) === TRUE){
                    echo "New record created successfully";
                }
                else {
                    echo "Error: " . $query . $connection->error;
                    return false;
                }
            }
            $connection->close();
            return true;
        }
    }

    /**
     * @desc get and display content of the table with user's conditions
     * @param String $table name of the table
     * @param String $columns name of columns
     * @param array $options conditions of the query
     * @return String
     */
    public function get($table, $columns, $options){
        $connection = new mysqli($this->host, $this->user, $this->password, $this->database);
        $option = array_pop($options);
        $query = "SELECT $columns FROM $table WHERE $option";
        $result = $connection->query($query);
        $out = "";
        while($row = $result->fetch_assoc()){
            $out .= $row["authCode"];
        }
        echo $out;
        return $out;
    }
}