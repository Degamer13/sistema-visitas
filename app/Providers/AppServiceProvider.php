<?php

namespace App\Providers;

use App\Interface\IPDF;
use App\Service\PDFService;
use Illuminate\Support\ServiceProvider;
//Para la paginacion
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IPDF::class, PDFService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Paginator::useBootstrap();
    }
}
