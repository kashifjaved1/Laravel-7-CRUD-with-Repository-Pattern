<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Repositories\CoronaRepositoryInterface;
use \App\Repositories\CoronaRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CoronaRepositoryInterface::class,
            CoronaRepository::class
        );
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
