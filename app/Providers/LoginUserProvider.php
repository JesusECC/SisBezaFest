<?php

namespace SisBezaFest\Providers;

use Illuminate\Support\ServiceProvider;

class LoginUserProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer("*",function($view){
            $email= Auth::user()->email;
            $view->with("email",$email);
        });
    }
    /*
     Auth::user()->email

    */

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
