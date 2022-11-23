<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Src\Economy\Domain\Economy\Repositories\EconomyRepository;
use Src\Economy\Infrastructure\Persistence\ORM\EconomyMYSQLRepository;

class EconomyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EconomyRepository::class, EconomyMYSQLRepository::class);
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
