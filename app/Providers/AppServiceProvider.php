<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CvParserService;
use App\Services\CohereCvService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CvParserService::class);
        $this->app->singleton(CohereCvService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
