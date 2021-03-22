<?php

namespace App;

use Illuminate\Support\Facades\Facade;

//this class will be a proxy to the Example1 class

class Example1Facade extends Facade
{

    protected static function getFacadeAccessor()
    {
        //return 'example';

        return Example1::class; //if laravel doesn't find any key bindings, it looks for classes, but if we have 
        //a constructor that receives extra parameter, then this won't work, we need to explicitly bind the key 
    }
}
