<?php

namespace Alexspi\Spares;

use Illuminate\Support\ServiceProvider;

class SparesServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        require __DIR__ . '/Http/routes.php';
//        $this->loadViewsFrom(__DIR__.'/resources/views', 'Spares');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}