<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Lang;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     * 
     */
   
    
    public function register(): void
    {
        //
       /*  $roles = Role::all()->pluck('id', 'name')->toArray();
        Blade::directive('hasRole', function ($role) use ($roles) {
        return auth()->user()->roleID == $roles[$role];
        }); */
    }
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
