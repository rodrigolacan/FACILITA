<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Helpdesk\ProjetoAcao;

class ProjetoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

        $this->app->singleton('projetos', function ($app) {
            $results = new ProjetoAcao;
            $array = $results->distinct()->select('PROJETO')->where('ANOORCAMENTO',date('Y'))->pluck('PROJETO')->toArray();
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
