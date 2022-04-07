<?php

namespace App\Http\Controllers\HomePhone;

use App\Http\Controllers\HomePhone\Subscriber\Subscriber;

class HomePhoneBase implements HomePhoneInteface
{
    use Subscriber;
    
    private $collection = [];
  
    function save(){                
        array_push($this->collection, $this->getData());                
    }

    function find(String $phonenumber){        
        foreach($this->collection as $data){        
          if($data['phoneNumber'] == $phonenumber){
            $this->setData($data);
            break;
          } else $this->setData([]);
        }        
        return $this;
    }

    function delete(){
        foreach($this->collection as $key=>$data)      
            if($data['phoneNumber'] == $this->getData('phoneNumber')) 
                unset($this->collection[$key]);        
        
    }   

    function update(){
        foreach($this->collection as $key=>$data)        
            if($data['phoneNumber'] == $this->getData('phoneNumber')) 
                $this->collection[$key] = $this->getData();         
    }

    function put(){   
        $updated = false;
        foreach($this->collection as $data){        
            if($data['phoneNumber'] == $this->getData('phoneNumber')){
              $updated = true;  
              $this->update();            
            }
        } 
        if(!$updated){
            $this->save(); 
        }
    }    

    function list(){
        return $this->collection;
    }

    function get(){
        return $this->getData();
    }
}
