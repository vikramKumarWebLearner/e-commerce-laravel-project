<?php

namespace App\Providers;

use App\Contracts\PaymentGateway;
use App\Http\Controllers\PaymentController;
use App\Services\PayPalService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(PaymentController::class)
            ->needs(PaymentGateway::class)
            ->give(function (Application $app) {
                return $app->make(PayPalService::class);
            });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
    }
}
