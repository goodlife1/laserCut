<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NovaPoshtaProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('novaPoshta','App\Services\NovaPoshta');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
