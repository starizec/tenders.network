<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Country;

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
        view()->composer('inc.select_country', function ($view) {
            $view->with('countries', Country::all());
        });
    }
}
