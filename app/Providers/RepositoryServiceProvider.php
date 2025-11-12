<?php

namespace App\Providers;

use App\Repository\UserRepositoryInterface;
use App\Repository\UserRepository;
use App\Interfaces\PublisherRepositoryInterface;
use App\Repositories\EloquentPublisherRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            // UserRepositoryInterface::class,
            PublisherRepositoryInterface::class,
            EloquentPublisherRepository::class,
            // UserRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
