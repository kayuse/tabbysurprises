<?php

namespace App\Providers;

use App\Http\Controllers\Repositories\OrderRepository;
use App\Http\Controllers\Repositories\OrderRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
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
        //
        $this->app->bind(OrderRepositoryInterface::class,OrderRepository::class);
    }
}
