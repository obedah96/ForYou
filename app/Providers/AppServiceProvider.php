<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Infrastructure\Repositories\Interfaces\UserRepositoryInterface;
use App\Infrastructure\Repositories\Eloquent\UserRepository;
use App\Infrastructure\Repositories\Interfaces\ProductRepositoryInterface;
use App\Infrastructure\Repositories\Eloquent\ProductRepository;
use App\Services\EmailService;
use App\Application\UseCases\User\CreateUser;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CreateUser::class, function ($app) {
            return new CreateUser(
                $app->make(UserRepositoryInterface::class),
                $app->make(EmailService::class)
            );
        });
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
