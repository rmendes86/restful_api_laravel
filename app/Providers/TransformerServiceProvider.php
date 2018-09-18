<?php

namespace App\Providers;

use App\Transformer\World\CityTransformer;
use App\Transformer\World\CountryTransformer;
use Illuminate\Support\ServiceProvider;

class TransformerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('countryTransformer', function () { return new CountryTransformer(); });
        $this->app->singleton('cityTransformer', function () { return new CityTransformer(); });
    }
}
