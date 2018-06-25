<?php

namespace Phucledien\Zalostore;

use Illuminate\Support\ServiceProvider;

class ZaloStoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // register our controller
        $this->app->make('Phucledien\Zalostore\CalculatorController');
        $this->loadViewsFrom(__DIR__.'/views', 'calculator');
    }
}
