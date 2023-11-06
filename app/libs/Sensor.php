<?php

require("app/libs/which-browser/src/Parser.php");
class Sensor
{
    /**
     * @author Jerzy Kisielewski
     */

    /**
     * @desc checks if user's IP is local
     * @return boolean
     */
    public function isLocal(){
        $local = "127.0.0.1";
        if(strpos($this->addrIp(), $local) === 0){
            return true;
        }
        return false;
    }


    /**
     * @desc checks user's IP
     * @param $getProxy
     * @return String user's IP
     */
    public function addrIp($getProxy = null){
        $address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            return $address;
        }
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * @desc checks user's browser
     * @return string user's browser name
     */
    public function getBrowser(){
        $browser = new WhichBrowser\Parser(getallheaders());
        return $browser->browser->toString();
    }

    /**
     * @desc checks user's operating system
     * @return string user's os name
     */
    public function getSystem(){
        $os = new WhichBrowser\Parser(getallheaders());
        return $os->os->toString();
    }

    /**
     * @desc generate code
     * @return string code
     */
    public function getFingerprint($algo = 'sha512'){
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $remoteAdrr = $_SERVER['REMOTE_ADDR'];
        $hash = uniqid("unit_test");
        $data = $userAgent . $remoteAdrr . $hash . true;
        return hash_hmac($algo, $data, 'token');
    }
}