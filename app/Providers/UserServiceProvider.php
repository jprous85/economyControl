<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Src\User\Domain\User\Repositories\UserRepository;
use Src\User\Infrastructure\Persistence\ORM\UserMYSQLRepository;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, UserMYSQLRepository::class);
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
