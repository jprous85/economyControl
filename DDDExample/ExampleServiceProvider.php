<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use __BasePath__\__ModuleName__\Domain\__ModuleName__\Repositories\__ModuleName__Repository;
use __BasePath__\__ModuleName__\Infrastructure\Persistence\ORM\__ModuleName__MYSQLRepository;

class __ModuleName__ServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(__ModuleName__Repository::class, __ModuleName__MYSQLRepository::class);
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
