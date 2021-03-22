<?php

namespace App\Providers;

use App\Services\FakeNewsService;
use App\Services\ParserService;
use App\Services\SocialService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FakeNewsService::class, function () {
            return new FakeNewsService();
        });
        $this->app->bind(ParserService::class, function () {
            return new ParserService();
        });
        $this->app->bind(SocialService::class, function () {
            return new SocialService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
