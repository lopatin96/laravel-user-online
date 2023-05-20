<?php

namespace Atin\LaravelUserOnline;

use Illuminate\Support\ServiceProvider;

class UserOnlineProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-user-online');

        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('/migrations')
        ], 'laravel-user-online-migrations');

        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('laravel-user-online.php')
        ], 'laravel-user-online-config');
    }
}