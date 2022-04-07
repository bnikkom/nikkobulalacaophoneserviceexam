<?php

namespace App\Http\Controllers;

use App\Http\Controllers\HomePhone\HomePhone;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {        
        HomePhone::populate();                                
        return view('view',['list'=> HomePhone::subscriber()->list()]);                
    }

    public function get($param)
    {        
        HomePhone::populate();  
        return HomePhone::subscriber()->find($param)->get();
    }

    public function put($param ,Request $request){              
        HomePhone::populate();                               
        HomePhone::subscriber()
        ->setPhoneNumber($param)
        ->setUserName($request->input('username'))
        ->setPassword($request->input('password'))
        ->setDomain($request->input('domain')) 
        ->setStatus($request->input('status')==1) 
        ->setProvisioned($request->input('provisioned')=='true') 
        ->setDestination($request->input('destination')) 
        ->put();
        return HomePhone::subscriber()->list();
    }

    public function delete($param){           
        HomePhone::populate();                                           
        HomePhone::subscriber()->find($param)->delete();
        return HomePhone::subscriber()->list();
    }

}
