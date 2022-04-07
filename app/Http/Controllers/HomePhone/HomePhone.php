<?php

namespace App\Http\Controllers\HomePhone;

class HomePhone extends HomePhoneBase
{
 
    private static $instance;

    public static function subscriber(){
        return self::getInstance();
    }

    public static function getInstance(){
        if(!isset(self::$instance))
            self::$instance    = new self();                                                             
        return self::$instance;
    }

    public static function populate(){
        self::getInstance()::subscriber()->setPhoneNumber('2505551111')->setUserName('3101')
            ->setPassword('passw0rd')->setDomain('www.domain.com')
            ->setStatus(true)->setProvisioned(true)
            ->setDestination('2505552222')->save();

        self::getInstance()::subscriber()->setPhoneNumber('2505556666')->setUserName('5780')
            ->setPassword('passw0rd')->setDomain('www.domain.com')
            ->setStatus(true)->setProvisioned(true)
            ->setDestination('2505557777')->save();
            
        self::getInstance()::subscriber()->setPhoneNumber('2505554444')->setUserName('7361')
            ->setPassword('passw0rd')->setDomain('www.domain.com')
            ->setStatus(true)->setProvisioned(true)
            ->setDestination('2505555555')->save();
    }
 
}
