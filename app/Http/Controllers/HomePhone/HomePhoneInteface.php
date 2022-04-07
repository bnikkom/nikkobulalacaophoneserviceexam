<?php

namespace App\Http\Controllers\HomePhone;

interface HomePhoneInteface
{
    function find(String $id);
    function save();
    function update();
    function delete();   
}
