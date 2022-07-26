<?php

namespace App\Providers;

use App\Http\View\Composers\CategoryComposer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        View::composer('index.index', CategoryComposer::class);
        View::composer('index.show', CategoryComposer::class);
        View::composer('lot.create', CategoryComposer::class);
        View::composer('lot.edit', CategoryComposer::class);
    }
}
