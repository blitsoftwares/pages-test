<?php

namespace Modules\Pages\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class PageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::namespace('Modules\Pages\Http\Controllers')
        ->middleware(['web'])
        ->group(__DIR__ . '/../Routes/web.php');

        $viewsDir = __DIR__ . '/../Views';
        $langDir = __DIR__ . '/../Lang';

        $this->loadViewsFrom($viewsDir,'Page');
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');
        $this->loadTranslationsFrom($langDir,'Page');

        $this->publishes([
            $viewsDir => resource_path('views/vendor/Page')
        ],'page-views');

        $this->publishes([
            $langDir => resource_path('lang/vendor/Page'),
        ],'page-lang');

        $this->publishes([
            __DIR__ . '/../Config/pages.php' => config_path('pages.php'),
        ],'page-config');

        $this->publishes([
            __DIR__ . '/../public/assets' => public_path('vendor/Page'),
        ],'page-assets');

    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../Config/pages.php','pages');
    }
}