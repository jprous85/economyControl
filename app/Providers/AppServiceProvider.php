<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Shared\Domain\Repositories\SendEmailRepository;
use Src\Shared\Infrastructure\SendEmail\SendEmailService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SendEmailRepository::class, SendEmailService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
