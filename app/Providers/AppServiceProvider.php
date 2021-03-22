<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Collaborator;
use App\Example;
use App\Example1;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // app()->bind('App\Example', function()

        // $this->app->bind('App\Example', function(){ //will give new instance for each resolve

        //     $collaborator = new Collaborator();
        //     $foo = 'foobar';


        //     return new Example($collaborator, $foo);
        // });


        // $this->app->singleton('App\Example', function(){ //will give the same instance for each resolve

        //     $collaborator = new Collaborator();
        //     $foo = 'foobar';


        //     return new Example($collaborator, $foo);
        // });


        // $this->app->bind('example', function(){
        //     return new Example1();

        //     //return new Example1('api-');
        //     //return new Example1(config()); //here, we declare the instantiation entirely once, whatever is
        //     //needed for the instantiation of this class
        // });


        $this->app->bind(Example1::class, function () {

            return new Example1('api-key-here');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
