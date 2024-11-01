<?php

namespace App\Providers;

use App\API\Entity\Unidades as Entity;
use Illuminate\Support\ServiceProvider;

class UnidadesHelpdeskServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('unidadeHelp', function ($app) {
            $unidades = new Entity;

            //return $entity->createAPIConnection()['result'][0]['NAME'];
            //Capturando informações
            if (is_array($unidades->getUnits()) && array_key_exists('status', $unidades->getUnits())) {
                return $unidades->getUnits();
            }

            $unidadeHelp = $unidades->getUnits()['result'];
            sort($unidadeHelp);
            return [
                //'PERSONAL_PHOTO' => $personalPhoto,
                'UNITS' => $unidadeHelp
            ];
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
