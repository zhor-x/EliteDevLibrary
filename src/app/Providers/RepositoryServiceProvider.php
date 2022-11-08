<?php

namespace App\Providers;

use App\Interfaces\BookInterface;
use App\Interfaces\OrderInterface;
use App\Repositories\Api\BookRepository;
use App\Repositories\Api\OrderRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BookInterface::class, BookRepository::class);
        $this->app->bind(OrderInterface::class, OrderRepository::class);
    }
}
