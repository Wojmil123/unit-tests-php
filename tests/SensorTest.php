<?php

require ("app/libs/Sensor.php");

use PHPUnit\Framework\TestCase;

class SensorTest extends TestCase
{

    public function testIsLocal(){
        $this->assertTrue($this->instance->isLocal(), "Address is not local");
    }

    public function testAddrIp(){
        $this->assertEquals("127.0.0.1", $this->instance->addrIp());
    }

    public function testGetBrowser(){
        $browser = $this->instance->getBrowser();
        $this->assertEquals("Firefox", $browser);
    }

    public function testGetSystem(){
        $os = $this->instance->getSystem();
        $this->assertEquals("Ubuntu", $os);
    }

    public function testGetFingerPrint(){
        $code = $this->instance->getFingerprint();
        $this->assertNotNull($code, "Code does not exist");
    }

    public function setUp() : void {
        $this->instance = new Sensor();
    }

    public function tearDown() : void {
        unset($this->instance);
    }

}
