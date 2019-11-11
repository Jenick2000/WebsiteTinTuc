<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
//use Illuminate\Support\Facades\Schema;
use App\User;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // if(Auth::check()){
        //     View::share('user_login', Auth::user());
        //   }else{
        //     View::share('user_login', 'login yet!');
        //   }
        //Schema::defaultStringLength(191); 
    }
}
