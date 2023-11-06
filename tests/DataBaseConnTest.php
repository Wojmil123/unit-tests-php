<?php
require("../app/libs/DataBaseConn.php");

use PHPUnit\Framework\TestCase;

class DataBaseConnTest extends TestCase
{

    public function testPut(){
        $this->setUp();
        $values = array("'1', 'jmkisielewski@gmail.com', '123456'");
        $table = "users";
        $isConnected = $this->instance->put($table, "", $values);
        $this->assertTrue($isConnected, "Connected");
        $this->tearDown();
    }

    public function testGet(){
        $this->setUp();
        $table = "users";
        $columns = "authCode";
        $options = array("authCode = 123456");
        $result = $this->instance->get($table, $columns, $options);
        $this->assertEquals("123456", $result);
        $this->tearDown();
    }

    /**
     * @desc set up an instance of DataBaseConn class
     * @return void
     */
    public function setUp() : void {
        $this->instance = new DataBaseConn("localhost", "phpmyadmin", "dtr34his9/c", "unit-test");
    }

    /**
     * @desc delete instance of DataBaseConn class
     * @return void
     */
    public function tearDown() : void {
        unset($this->instance);
    }
}
