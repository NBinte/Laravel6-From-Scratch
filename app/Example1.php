<?php

namespace App;

//this is the class for which we are doing proxy

class Example1
{

    // public function __construct() //there might be lots of registration needed in order to instantiate this class
    // //may need to provide config settings/API keys
    // {

    // }

    protected $apiKey;


    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function handle()
    {

        die('it works!');
    }
}
