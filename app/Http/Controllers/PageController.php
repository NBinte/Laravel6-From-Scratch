<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Example;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;

class PageController extends Controller
{
    // public function home(Example $example){ //automatic resolution
    //     ddd($example);
    // }

    // public function home(){ //automatic resolution
    //     ddd(resolve('App\Example'), resolve('App\Example'));
    // }

    public function home(){ 
    
        //return view('welcome1');

        return View::make('welcome1'); //facades provide a static interface to underlying components in the framework
    
        //return request('name');

        //return FacadesRequest::input('name'); //using facades //static interface that proxies to an underlying class
        //it's only purpose is to proxy the calls to the underlying class

        //return File::get(public_path('index.php')); //for this approach, we don't need to construct any 
        //objects on the fly, don't need to inject it through a constructor

        //return $file->get(public_path('index.php'));

        Cache::remember('foo', 60, fn() => 'foobar'); //resolving to the underlying class and then callng a 
        //public method on it

        return Cache::get('foo');

        //still defining the dependencies in the constructor instead of using facades helps to see what that 
        //class needs in order to operate

        //in model level, facades are not recommended to use

        //for building packages, we might like to inject it instead of using facades
    }
}
