<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $menulinks = [
                (object) ['id'=>1, 'name'=>'Home', 'route'=>'home', 'icon'=>'home.ico'],
                (object) ['id'=>2, 'name'=>'Terms','route'=>'home','icon'=>'terms.ico'],
                (object) ['id'=>3, 'name'=>'Feeds','route'=>'home','icon'=>'home.ico'],
                (object) ['id'=>4, 'name'=>'Profile','route'=>'profile.edit','icon'=>'home.ico'],

            ];
            $view->with('menulinks',$menulinks);
        });

    }
}
