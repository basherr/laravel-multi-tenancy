<?php

namespace App\Providers;

use App\Site;
use Orchestra\Support\Facades\Tenanti;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Tenanti::connection('mybuild', function (Site $entity, array $config) {
            $config['database'] = "mybuild_{$entity->getKey()}"; 
            // refer to config under `database.connections.tenants.*`.
            return $config;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
