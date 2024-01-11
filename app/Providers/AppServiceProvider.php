<?php

namespace App\Providers;

use view;
use App\Models\Setting;
use App\Services\PayPalService;
use App\Contracts\PaymentGateway;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\PaymentController;
use Illuminate\Contracts\Foundation\Application;

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
        $setting_app = Setting::first();
        view()->share('appSetting', $setting_app);
    }
}
