<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\API\Entity\Departaments;

class DepartamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('departaments', function ($app) {
            $results = new Departaments;
            $array = $results->getDepartaments();
            return $array;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
