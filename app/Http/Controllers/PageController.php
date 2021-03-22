<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Example;

class PageController extends Controller
{
    // public function home(Example $example){ //automatic resolution
    //     ddd($example);
    // }

    public function home(){ //automatic resolution
        ddd(resolve('App\Example'), resolve('App\Example'));
    }
}
