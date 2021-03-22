<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Collaborator;
use App\Example;

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

        $this->app->bind('App\Example', function(){ //will give new instance for each resolve
    
            $collaborator = new Collaborator();
            $foo = 'foobar';
        
        
            return new Example($collaborator, $foo);
        });


        // $this->app->singleton('App\Example', function(){ //will give the same instance for each resolve
    
        //     $collaborator = new Collaborator();
        //     $foo = 'foobar';
        
        
        //     return new Example($collaborator, $foo);
        // });
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
