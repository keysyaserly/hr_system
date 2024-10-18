<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Definisi Gate untuk 'isadmin'
        Gate::define('isadmin', function ($user) {
            return $user->role == 'admin';
        });


        // Definisi Gate untuk 'ismanager'
        Gate::define('ismanager', function ($user) {
            return $user->role =='manager';  // Periksa level apakah 'manager'
        });
    }
}
