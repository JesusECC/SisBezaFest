<?php

namespace SisBezaFest\Providers;

use Illuminate\Support\ServiceProvider;

class ShoppingCartServiceProvider extends ServiceProvider
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
            $cart= \Session::get('cart');
            $view->with("cart",$cart);
        });
    }
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
