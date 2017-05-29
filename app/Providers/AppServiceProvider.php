<?php

namespace App\Providers;

use App\Repositories\Contracts\SupplierInterface;
use App\Repositories\SupplierRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SupplierInterface::class, SupplierRepository::class);
    }
}
