<?php

namespace App\Providers;

use App\API\Entity\UserBitrix as Entity;
use Illuminate\Support\ServiceProvider;

class CrmInformationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
         $this->app->singleton('crmInformation', function ($app) {
            $userBitrix = new Entity;
            $userBitrix->setAPI('crm.item.list');
            
            //Capturando informações
            $listaHelp = $userBitrix->createAPIConnection()['result'][0];
            return [
                'HELPS' => $listaHelp
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
