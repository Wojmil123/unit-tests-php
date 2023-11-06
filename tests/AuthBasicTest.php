<?php
require('../app/AuthBasic.php');

use PHPUnit\Framework\TestCase;

/**
 *
 */
class AuthBasicTest extends TestCase
{
    /**
     * @return void
     */
    public function testCreateCode(){
        $this->setUp();
        $out = $this->instance->createCode();
        fwrite(STDERR, print_r($out, true));
        $len = strlen($out);
        $this->assertIsNumeric($out, "Generated: ".$out);
        $this->assertEquals(6, $len, "Length: ".$len);

        $out = $this->instance->createCode(4);
        $len = strlen($out);
        $this->assertIsNumeric($out, "Generated: ".$out);
        $this->assertEquals(4, $len, "Length: ".$len);

        $out = str_pad(1111, 6, '0', STR_PAD_LEFT);
        $len = strlen($out);
        $this->assertIsNumeric($out, "Generated: ".$out);
        $this->assertEquals(6, $len, "Length: ".$len);
        $this->tearDown();
    }

    /**
     * @return void
     */
    public function testCreateAuthToken(){
        $this->setUp();
        $exp = array(
            'emlAuth'=>'jmkisielewski@gmail.com', 'authCode'=>'123456',
            'authDate'=>date("Y-m-d"), 'authHour'=>date("H:i:s"),
            'addrIp'=>'127.0.0.1', 'reqOs'=>'Linux', 'reqBrw'=>'FF'
        );
        $out = $this->instance->createAuthToken('jmkisielewski@gmail.com', 1);
        $out['authCode'] = '123456';
        $this->assertEquals($exp, $out, 'Arrays not equal');
        $this->tearDown();
    }

    /**
     * @return void
     */
    public function setUp() : void {
        $this->instance = new AuthBasic();
    }

    /**
     * @return void
     */
    public function tearDown() : void {
        unset($this->instance);
    }
}
