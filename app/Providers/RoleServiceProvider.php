<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Src\Role\Domain\Role\Repositories\RoleRepository;
use Src\Role\Infrastructure\Persistence\ORM\RoleMYSQLRepository;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RoleRepository::class, RoleMYSQLRepository::class);
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
