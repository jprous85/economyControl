<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Src\Account\Domain\Account\Repositories\AccountRepository;
use Src\Account\Infrastructure\Persistence\ORM\AccountMYSQLRepository;

class AccountServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AccountRepository::class, AccountMYSQLRepository::class);
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
