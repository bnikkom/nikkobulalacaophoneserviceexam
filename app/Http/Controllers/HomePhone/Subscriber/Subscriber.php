<?php

namespace App\Http\Controllers\HomePhone\Subscriber;

trait Subscriber 
{
    private $data = [];
    
    
    public function setPhoneNumber(String $phonenumber){        
        $this->data['phoneNumber'] = $phonenumber;        
        return $this;
    }   

    public function setUserName(String $username){
        $this->data['username'] = $username;
        return $this;
    }   

    public function setPassword(String $password){
        $this->data['password'] = $password;
        return $this;
    }   

    public function setDomain(String $domain){
        $this->data['domain'] = $domain;
        return $this;
    }  
    
    public function setStatus(Bool $status){
        $this->data['status'] = $status;
        return $this;
    }  

    public function setProvisioned(Bool $provisioned){
        $this->data['features']['callForwardNoReply']['provisioned'] = $provisioned;
        return $this;
    }  

    public function setDestination(String $destination){
        $this->data['features']['callForwardNoReply']['destination'] = $destination;
        return $this;
    }   

    private function getData(String $param = null){
        return (isset($param)) ? $this->data[$param] : $this->data;
    }

    private function setData(Array $data){
        $this->data = $data;
    }
}
