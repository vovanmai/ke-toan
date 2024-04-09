<?php

namespace App\Providers;

use App\Models\WebsiteSetting;
use App\Services\User\GetMainMenuService;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $this->app->singleton('web_setting', function () {
            return WebsiteSetting::first();
        });

        $this->app->singleton('main_menu', function () {
            return resolve(GetMainMenuService::class)->handle();
        });
    }
}
