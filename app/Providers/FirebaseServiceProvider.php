<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Kreait\Firebase\Factory;

class FirebaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('firebase.database', function () {
            return (new Factory)
                ->withServiceAccount(config('firebase.credentials'))
                ->createDatabase();
        });    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
