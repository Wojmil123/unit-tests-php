<?php

class DataBaseConn
{
 private $host = "";
 private $user = "";
 private $password = "";
 private $database = "";


    /**
     * @param String $table name of the table
     * @param $columns
     * @param $values
     * @return void
     */
    public function put($table, $columns, $values){}

    /**
     * @param String $table name of the table
     * @param $columns
     * @param array $options conditions of the query
     * @return void
     */
    public function get($table, $columns, $options){}
}