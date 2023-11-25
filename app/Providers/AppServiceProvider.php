<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
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
                (object) ['id'=>2, 'name'=>'Feed','route'=>'feed','icon'=>'feed.ico'],
                // (object) ['id'=>4, 'name'=>'Profile','route'=> function() {return route('profile.show',auth()->user());},'icon'=>'home.ico'],

            ];
            $view->with('menulinks',$menulinks);
        });

    }
}
